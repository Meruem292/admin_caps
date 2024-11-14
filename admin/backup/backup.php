<?php
session_start();

include 'db_conn.php';

function backupDatabase($pdo)
{
    $_SESSION['status'] = 'success';
    try {
     
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        $sqlDump = "";

        foreach ($tables as $table) {
          
            $createTableQuery = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
            $sqlDump .= "DROP TABLE IF EXISTS `$table`;\n";
            $sqlDump .= $createTableQuery['Create Table'] . ";\n\n";

        
            $rows = $pdo->query("SELECT * FROM `$table`");
            while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
                $rowData = array_map([$pdo, 'quote'], $row);
                $sqlDump .= "INSERT INTO `$table` (" . implode(", ", array_keys($row)) . ") VALUES (" . implode(", ", $rowData) . ");\n";
            }
            $sqlDump .= "\n";
        }

        // Get the current date and time in the specified format
        $date = date("m-d-y");  // Format: MM-DD-YY
        $time = date("H-i");    // Format: HH-MM (replace colon with hyphen)

        // Create the backup file name
        $backupFileName = "{$date}_{$time}_backup.sql";

        // Set the backup directory path
        $backupDir = __DIR__ . "/backups";

        // Create the backups directory if it does not exist
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        // Save SQL dump to the backup file
        $backupFile = "$backupDir/$backupFileName";
        file_put_contents($backupFile, $sqlDump);

        return $backupFile;
    } catch (Exception $e) {
        echo "Backup Error: " . $e->getMessage();
        return false;
    }
}

function restoreDatabase($pdo, $backupFile)
{
    try {
        // Read SQL from the backup file
        $sql = file_get_contents($backupFile);
        if ($sql === false) {
            throw new Exception("Error reading the backup file.");
        }

        // Split SQL file into individual statements
        $queries = array_filter(array_map('trim', explode(";\n", $sql)), 'strlen');

        // Start the transaction and confirm it is active
        if (!$pdo->inTransaction()) {
            $pdo->beginTransaction();
        }

        // Disable foreign key checks to avoid constraint issues during restoration
        $pdo->exec("SET FOREIGN_KEY_CHECKS=0;");

        // Execute each query in the backup file
        foreach ($queries as $query) {
            if (!empty($query) && strpos($query, "--") !== 0) {
                $pdo->exec($query);
            }
        }

        // Re-enable foreign key checks
        $pdo->exec("SET FOREIGN_KEY_CHECKS=1;");

        // Commit the transaction
        $pdo->commit();
        echo "Database restored successfully.";
    } catch (Exception $e) {
        // Roll back the transaction if an error occurs and transaction is active
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
    }
}

// Handle backup and restore requests
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['backup'])) {
            $backupFile = backupDatabase($pdo);
            if ($backupFile) {
                $message = "Backup completed. <a href='backups/" . basename($backupFile) . "' target='_blank'>" . basename($backupFile) . "</a>";
                $_SESSION['status'] = 'success';
            } else {
                $message = "Backup failed.";
                $_SESSION['status'] = 'error';
            }
        } elseif (isset($_POST['restore']) && !empty($_POST['selectedFile'])) {
            restoreDatabase($pdo, __DIR__ . '/backups/' . $_POST['selectedFile']);
            $message = "Database restored successfully from " . $_POST['selectedFile'];
            $_SESSION['status'] = 'success';
        }
    } catch (Exception $e) {
        $message = "Request Error: " . $e->getMessage();
        $_SESSION['status'] = 'error';
    }
    $_SESSION['message'] = $message; // Store the message in the session
}

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'template.php'; ?>

<link rel="shortcut icon" href="../assets/img/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/feather/feather.css">
<link rel="stylesheet" href="../assets/plugins/icons/flags/flags.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/applicants.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="../assets/plugins/fullcalendar/fullcalendar.min.css">

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="content-body">
                        <div class="container-fluid">
                            <div class="row">
                                <ul class="breadcrumb">
                                    <li>
                                        <a href="/Admin_Caps/index.php" style="color: gray;">Home</a>
                                    </li>
                                    <li><i class='bx bx-chevron-right'>></i></li>
                                    <li>
                                        <a class="active" href="/Admin_Caps/subjects/subjects.php">Instructors</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="container mt-5">
                                <h2>Backup and Restore</h2>
                                <form method="POST">
                                    <button class="btn btn-success mb-2" type="submit" name="backup">Backup Database</button>
                                </form>
                                <button class="btn btn-info mb-2" onclick="openRestoreModal()">Restore Database</button>
                                <?php if ($message): ?>
                                    <div class="alert alert-info mt-3"><?php echo $message; ?></div>
                                <?php endif; ?>

                                <!-- Modal for Restore -->
                                <div class="modal fade" id="restoreModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Select Backup File</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <select class="form-control" name="selectedFile" required>
                                                        <?php
                                                        $backupDir = __DIR__ . '/backups/';
                                                        if (is_dir($backupDir)) {
                                                            foreach (array_diff(scandir($backupDir), ['.', '..']) as $file) {
                                                                echo "<option value=\"$file\">$file</option>";
                                                            }
                                                        } else {
                                                            echo "<option>No backup files available</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="restore">Restore</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['message'])): ?>
            <script>
                // Display SweetAlert based on session message
                Swal.fire({
                    icon: '<?php echo ($_SESSION['status'] == 'success') ? 'success' : 'error'; ?>',
                    title: '<?php echo $_SESSION['status'] == 'success' ? 'Success' : 'Error'; ?>',
                    html: '<?php echo $_SESSION['message']; ?>',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    <?php unset($_SESSION['message'], $_SESSION['status']); ?> // Clear session message after alert
                });
            </script>
        <?php endif; ?>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function openRestoreModal() {
                $('#restoreModal').modal('show');
            }
        </script>