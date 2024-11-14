<?php
require_once 'db_conn.php';
include 'header.php'; 

global $pdo;
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./assets/css/style.css">

<style>
    .card {
        height: 100%; /* Ensures all cards have the same height */
    }
</style>

<section id="events-section" class="section-padding bg-light">
    <div class="container">
        
        <div class="row">
            <?php
            // Fetch the events from the database
            $stmt = $pdo->prepare("SELECT id, title, description, picture, start, end FROM events ORDER BY start DESC LIMIT 6"); // Fetching the latest 3 events
            $stmt->execute();
            $events = $stmt->fetchAll();

            if ($events) {
                foreach ($events as $event) {
                    $imagePath = './admin/events/uploads/' . $event['picture']; // Adjust image path
                    $title = htmlspecialchars($event['picture']);
                    $description = htmlspecialchars($event['description']);
                    $start = htmlspecialchars($event['start']);
                    $end = htmlspecialchars($event['end']);
                    $formattedStartDate = date('F j, Y', strtotime($start));
                    $formattedEndDate = date('F j, Y', strtotime($end));
                    $eventUrl = 'news_view.php?id=' . urlencode($event['id']); // Assuming you have a page to view event details
                    ?>
                    
                    <!-- Event Card -->
                    <div class="col-md-4 mb-4 d-flex">
                        <a href="<?php echo $eventUrl; ?>" class="text-decoration-none text-dark flex-fill">
                            <div class="card border-0 shadow-sm rounded flex-fill">
                                <div class="position-relative">
                                    <img src="<?php echo $imagePath; ?>" class="card-img-top rounded-top" alt="Event Image">
                                    <span class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 rounded-bottom"><?php echo $formattedStartDate; ?></span>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold"><?php echo $title; ?></h5>
                                    <p class="card-text"><?php echo substr($description, 0, 150) . '...'; ?></p>
                                    <span class="text-primary fw-semibold mt-auto">Read More</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No events found.</p>";
            }
            ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
