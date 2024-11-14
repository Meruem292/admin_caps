    <?php include "../template/template.php"; ?>


    <?php

    include '../database/db_conn.php';
    include('db_conn_assign.php');

    // Fetch instructors
    $sql = "SELECT * FROM instructors"; // Replace 'instructors' with your actual table name
    $result = $conn->query($sql);

    ?>
    <?php
    // Include the database connection


    // Function to fetch departments
    function getDepartments($conn)
    {
        $sql = "SELECT department_id, department_name FROM department";
        $result = $conn->query($sql);
        return $result;
    }

    // Function to fetch sections
    function getSections($conn)
    {
        $sql = "SELECT section_id, name FROM sections";
        $result = $conn->query($sql);
        return $result;
    }

    // Function to fetch subjects
    function getSubjects($conn)
    {
        $sql = "SELECT subj_id, subj_code, subj_desc FROM subjects";
        $result = $conn->query($sql);
        return $result;
    }

    // Function to fetch instructors
    function getInstructors($conn)
    {
        $sql = "SELECT emp_id, name FROM instructors";
        $result = $conn->query($sql);
        return $result;
    }

    // Function to fetch year levels
    function getYearLevels($conn)
    {
        $sql = "SELECT year_level_id, year_level_name FROM year_level";
        $result = $conn->query($sql);
        return $result;
    }

    $conn = connectToDatabase();

    // Fetch data
    $departments = getDepartments($conn);
    $sections = getSections($conn);
    $subjects = getSubjects($conn);
    $instructors = getInstructors($conn);
    $year_levels = getYearLevels($conn);
    ?>
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

    <style>
        /* Adjusting table header colors */
        #applicantsTable thead th {
            background-color: #34495e;
            color: #ecf0f1;
            padding: 12px;
        }

        /* Alternating row colors */
        #applicantsTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #applicantsTable tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hover effect for table rows */
        #applicantsTable tbody tr:hover {
            background-color: #d1d8e0;
        }

        /* Button Styles */
        .btn-success {
            background-color: #27ae60 !important;
            border-color: #27ae60 !important;
            color: #fff !important;
        }

        .btn-warning {
            background-color: #2980b9 !important;
            border-color: #2980b9 !important;
            color: #fff !important;
        }

        .btn-danger {
            background-color: #e74c3c !important;
            border-color: #e74c3c !important;
            color: #fff !important;
        }

        /* Restore breadcrumb styling */
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            /* background-color: #f9f9f9; */
            display: flex;
            align-items: center;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        ul.breadcrumb li a {
            color: #007bff;
            text-decoration: none;
            padding: 0 5px;
        }

        ul.breadcrumb li a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        ul.breadcrumb li i {
            margin: 0 10px;
            color: #6c757d;
        }

        ul.breadcrumb li:last-child a {
            color: #6c757d;
            pointer-events: none;
        }

        ul.breadcrumb li:last-child a.active {
            font-weight: bold;
        }
    </style>




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

                                <br><br>

                                <div class="" style="margin-top: -2%;">
                                    <div class="left" style="display: flex; align-items: center;">
                                        <h1>List of Instructors </h1>
                                        <!-- New Button that triggers Modal -->
                                        <button id="newButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subjectModal" style="margin-right: auto;">New</button>
                                    </div>
                                </div>

                                <!-- DataTable Structure -->
                                <div class="table-responsive" style="overflow-x: hidden;">
                                    <table id="applicantsTable" class="display table table-striped table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Major</th>
                                                <th>Contact No.</th>
                                                <th>E-Mail</th>
                                                <th>Date of Birth</th>
                                                <th>Civil Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                    <td>" . htmlspecialchars($row['emp_id']) . "</td>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['major']) . "</td>
                                <td>" . htmlspecialchars($row['contact']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['birthday']) . "</td>
                                <td>" . htmlspecialchars($row['civil_stats']) . "</td>
                                

                                <td>
                                        <a href='profile.php?id=" . $row['emp_id'] . "'>
            <button class='btn btn-warning'>
                <i class='fa-solid fa-eye'></i> 
            </button>
        </a>
                                        <button class='btn btn-warning' data-id='" . $row['emp_id'] . "' data-bs-toggle='modal' data-bs-target='#editInstructor'>
                                                <i class='fa-solid fa-pencil'></i> 
                                            </button>
                                    <button class='btn btn-danger delete-btn' data-id='" . $row['emp_id'] . "' style='background-color: #e74c3c !important; border-color: #e74c3c !important;'>
                                        <i class='fa-solid fa-trash'></i> 
                                    </button>
                                </td>
                                </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No records found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>



                                <div class="m-5">
                                    <h2>Assign Instructor to Section, Department, and Subject</h2>
                                    <form action="assign_instructor.php" method="POST">
                                        <div class="row">
                                            <div class="col-4">
                                                <!-- Select Instructor -->
                                                <label for="instructor">Instructor:</label>
                                                <select class="form-control" name="instructor_id" id="instructor" required>
                                                    <option value="">Select Instructor</option>
                                                    <!-- Dynamically load instructors from the database -->
                                                    <?php while ($row = $instructors->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['emp_id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                                <!-- Select Year Level -->
                                                <label for="year_level">Year Level:</label>
                                                <select class="form-control" name="year_level_id" id="year_level" required>
                                                    <option value="">Select Year Level</option>
                                                    <!-- Dynamically load year levels from the database -->
                                                    <?php while ($row = $year_levels->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['year_level_id']; ?>"><?php echo $row['year_level_name']; ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                                <!-- Select Subject -->
                                                <label for="subject">Subject:</label>
                                                <select class="form-control" name="subject_id" id="subject" required>
                                                    <option value="">Select Subject</option>
                                                    <!-- Dynamically load subjects from the database -->
                                                    <?php while ($row = $subjects->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['subj_id']; ?>"><?php echo $row['subj_code'] . " - " . $row['subj_desc']; ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                            </div>

                                            <div class="col-4">
                                                <label for="department">Department:</label>
                                                <select class="form-control" name="department_id" id="department" required>
                                                    <option value="">Select Department</option>
                                                    <!-- Dynamically load sections from the database -->
                                                    <?php while ($row = $departments->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                                <!-- Select Section -->
                                                <label for="section">Section:</label>
                                                <select class="form-control" name="section_id" id="section" required>
                                                    <option value="">Select Section</option>
                                                    <!-- Dynamically load sections from the database -->
                                                    <?php while ($row = $sections->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['section_id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                                <!-- Select Start Date and Time -->
                                                <label for="start_datetime">Start Date and Time:</label>
                                                <input class="form-control" type="datetime-local" name="start_datetime" id="start_datetime" required><br><br>



                                            </div>
                                            <div class="col-4">
                                                <!-- Select Academic Year -->
                                                <label for="academic_year">Academic Year:</label>
                                                <input class="form-control" placeholder="ex.2023-2024" type="text" name="academic_year" id="academic_year" required><br><br>

                                                <!-- Select Semester -->
                                                <label for="semester">Semester:</label>
                                                <input class="form-control" type="text" name="semester" id="semester" required><br><br>

                                                <!-- Select End Date and Time -->
                                                <label for="end_datetime">End Date and Time:</label>
                                                <input class="form-control" type="datetime-local" name="end_datetime" id="end_datetime" required><br><br>
                                            </div>
                                        </div>








                                        <!-- Submit button -->
                                        <input class="btn btn-primary" type="submit" value="Assign Instructor">
                                    </form>

                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="subjectModalLabel">Add New Instructor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addInstructorForm" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="add">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="major" class="form-label">Major</label>
                                                <textarea class="form-control" id="major" name="major" rows="3" placeholder="Enter Major"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact No.</label>
                                                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-Mail</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="birthday" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="birthday" name="birthday">
                                            </div>
                                            <div class="mb-3">
                                                <label for="civil_stats" class="form-label">Civil Status</label>
                                                <input type="text" class="form-control" id="civil_stats" name="civil_stats" placeholder="Enter civil status">
                                            </div>

                                            <!-- File Uploads -->
                                            <div class="mb-3">
                                                <label for="portfolio" class="form-label">Upload Portfolio</label>
                                                <input type="file" class="form-control" id="portfolio" name="portfolio" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cv" class="form-label">Upload CV</label>
                                                <input type="file" class="form-control" id="cv" name="cv" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="transcripts" class="form-label">Upload Transcripts</label>
                                                <input type="file" class="form-control" id="transcripts" name="transcripts" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="validId" class="form-label">Upload Valid ID</label>
                                                <input type="file" class="form-control" id="valid_id" name="valid_id" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="coverLetter" class="form-label">Upload Cover Letter</label>
                                                <input type="file" class="form-control" id="cover_letter" name="cover_letter" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="modal fade" id="editInstructor" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Instructor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editInstForm" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="edit">
                                            <input type="hidden" name="id" id="editInstId">
                                            <div class="mb-3">
                                                <label for="editName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="editName" name="name" placeholder="Enter Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editMajor" class="form-label">Major</label>
                                                <textarea class="form-control" id="editMajor" name="major" rows="3" placeholder="Enter Major" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editContact" class="form-label">Contact No.</label>
                                                <input type="number" class="form-control" id="editContact" name="contact" placeholder="Enter Contact Number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editEmail" class="form-label">E-Mail</label>
                                                <input type="email" class="form-control" id="editEmail" name="email" placeholder="Enter Mail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editBirthday" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="editBirthday" name="birthday" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editCivil_stats" class="form-label">Civil Status</label>
                                                <input type="text" class="form-control" id="editCivil_stats" name="civil_stats" placeholder="Enter Civil Status" required>
                                            </div>
                                            <!-- File Uploads -->
                                            <div class="mb-3">
                                                <label for="editPortfolio" class="form-label">Upload Portfolio</label>
                                                <input type="file" class="form-control" id="editPortfolio" name="portfolio" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editCv" class="form-label">Upload CV</label>
                                                <input type="file" class="form-control" id="editCv" name="cv" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editTranscripts" class="form-label">Upload Transcripts</label>
                                                <input type="file" class="form-control" id="editTranscripts" name="transcripts" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editValid_id" class="form-label">Upload Valid ID</label>
                                                <input type="file" class="form-control" id="editValid_id" name="valid_id" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editCover_letter" class="form-label">Upload Cover Letter</label>
                                                <input type="file" class="form-control" id="editCover_letter" name="cover_letter" accept=".docx,.pdf,.png,.jpg,.jpeg">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="editInstForm" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        .




                        <script>
                            var jq = jQuery.noConflict();
                            jq(document).ready(function() {
                                jq('#applicantsTable').DataTable();
                            });
                        </script>




                        <script>
                            // add function

                            var jq = jQuery.noConflict();
                            jq(document).ready(function() {
                                jq('#applicantsTable').DataTable();

                                // Handle form submission for adding new instructor
                                jq('#addInstructorForm').on('submit', function(e) {
                                    e.preventDefault(); // Prevent th   e default form submission
                                    var formData = new FormData(this); // Create FormData object
                                    jq('#saveButton').prop('disabled', true); // Disable the save button

                                    jq.ajax({
                                        url: 'instructor_action.php', // Ensure this URL is correct
                                        type: 'POST',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.status === 'success') {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Instructor Added',
                                                    text: response.message,
                                                    confirmButtonText: 'OK'
                                                }).then(() => {
                                                    location.reload(); // Refresh the page after closing the SweetAlert
                                                });
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: response.message
                                                });
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'An error occurred while adding the instructor.'
                                            });
                                        },
                                        complete: function() {
                                            jq('#saveButton').prop('disabled', false); // Re-enable the save button
                                        }
                                    });
                                });
                            });

















                            // Handle edit button click
                            jq(document).on('click', '.btn-warning', function() {
                                var id = jq(this).data('id');
                                // Fetch user data and populate the edit form
                                jq.ajax({
                                    url: 'instructor_action.php',
                                    type: 'POST',
                                    data: {
                                        id: id,
                                        action: 'fetch'
                                    }, // Add a fetch action
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            // Populate the fields with the user data
                                            jq('#editInstId').val(response.data.id);
                                            jq('#editName').val(response.data.name);
                                            jq('#editMajor').val(response.data.major);
                                            jq('#editContact').val(response.data.contact);
                                            jq('#editEmail').val(response.data.email);
                                            jq('#editBirthday').val(response.data.birthday);
                                            jq('#editCivil_stats').val(response.data.civil_stats);
                                            jq('#editPortfolio').val(response.data.portfolio);
                                            jq('#editCv').val(response.data.cv);
                                            jq('#editTranscripts').val(response.data.transcripts);
                                            jq('#editValid_id').val(response.data.valid_id);
                                            jq('#editCover_letter').val(response.data.cover_letter);
                                        } else {
                                            Swal.fire('Error', response.message, 'error');
                                        }
                                    }
                                });
                            });

                            // Handle form submission for editing user
                            jq('#editInstForm').on('submit', function(e) {
                                e.preventDefault();
                                var formData = jq(this).serialize() + "&action=edit";
                                jq.ajax({
                                    url: 'instructor_action.php',
                                    type: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            Swal.fire('Success', response.message, 'success').then(() => {
                                                location.reload(); // Refresh the page
                                            });
                                        } else {
                                            Swal.fire('Error', response.message, 'error');
                                        }
                                    }
                                });
                            });
                        </script>



                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script src="../assets/js/jquery-3.6.0.min.js"></script>

                        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <script src="../assets/js/feather.min.js"></script>

                        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                        <script src="../assets/js/script.js"></script>