tmeplate


<?php
session_name("admin_session");
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: index.php?error=You must log in first");
    exit();
}




$admin_name = $_SESSION['name'];
$role = $_SESSION['role'];

$authorizedRoles = [
    'newApplicants' => ['admin', 'registrar'],
    'subjects' => ['admin', 'instructor'],
    'manageSchedule' => ['admin', 'registrar', 'instructor'],
    'reports' => ['admin', 'registrar'],
    'users' => ['admin']
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>POTSCI</title>
    <link rel="shortcut icon" href="/Admin_Caps/admin/assets/img/logoPearl.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <a href="/Admin_Caps/admin/main.php" class="logo">
                <img src="/Admin_Caps/admin/assets/img/logo2.png" alt="Logo">
            </a>
            <a href="/Admin_Caps/main.php" class="logo logo-small">
                <img src="/Admin_Caps/admin/assets/img/small-logo1.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list win-maximize" id="fullscreenToggle">
                    <img src="/Admin_Caps/admin/assets/img/icons/header-icon-04.svg" alt="">
                </a>
            </li>
            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img src="/Admin_Caps/admin/assets/img/profiles/<?php echo htmlspecialchars($_SESSION['profile_image'] ?? 'user.png'); ?>" alt="User Image" class="avatar-img rounded-circle">
                        <div class="user-text">
                            <h6><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h6>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($_SESSION['role']); ?></p>
                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="/Admin_Caps/admin/assets/img/profiles/<?php echo htmlspecialchars($_SESSION['profile_image'] ?? 'user.png'); ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h6>
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($_SESSION['role']); ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="/Admin_Caps/admin/admin_profile/admin_profile.php?id=<?php echo $_SESSION['admin_id']; ?>">My Profile</a>
                    <a class="dropdown-item" href="/Admin_Caps/admin/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li><a href="/Admin_Caps/admin/main.php"><i class="feather-grid"></i> Home</a></li>
                    <?php if ($role === 'Administrator') : ?>
                        <li><a href="/Admin_Caps/admin/applicants/applicants.php"><i class="fas fa-graduation-cap"></i> New Applicants</a></li>
                        <li><a href="/Admin_Caps/admin/subjects/subjects.php"><i class="fas fa-book"></i> Subjects</a></li>
                    <?php endif; ?>
                    <li><a href="/Admin_Caps/admin/events/events.php"><i class="fas fa-newspaper"></i> Post</a></li>
                    <li><a href="/Admin_Caps/admin/calendar/index.php"><i class="fas fa-calendar"></i> Seminary Calendar</a></li>
                    <li><a href="/Admin_Caps/admin/courses/courses.php"><i class="fas fa-graduation-cap"></i> List of Courses</a></li>
                    <li><a href="/Admin_Caps/admin/utilization/utilization.php"><i class="fas fa-calendar"></i> Schedule</a></li>
                    <li><a href="/Admin_Caps/admin/utilization/utilization.php"><i class="fas fa-chalkboard-teacher"></i> Manage Schedule</a></li>
                    <li><a href="/Admin_Caps/admin/diploma/diploma.php"><i class="fas fa-file"></i> ID Generation</a></li>
                    <li><a href="/Admin_Caps/admin/certificate/index.php"><i class="fa fa-certificate"></i> Certificates Generation</a></li>
                    <li><a href="/Admin_Caps/admin/students/students.php"><i class="fas fa-graduation-cap"></i> Enrolled Students</a></li>
                    <li><a href="/Admin_Caps/admin/instructor/instructor.php"><i class="fa fa-users"></i> List of Instructor</a></li>
                    <li><a href="/Admin_Caps/admin/semester/semester.php"><i class="fa fa-cogs"></i> Set Semester</a></li>
                    <li><a href="/Admin_Caps/admin/users/users.php"><i class="fa fa-users"></i> Users</a></li>
                    <li class="submenu">
                        <a href="#" style="text-decoration: none;" onclick="setActiveMenuItem(this)"><i class="fas fa-newspaper"></i> <span>Reports</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/Admin_Caps/admin/report/instructors_report.php" style="text-decoration: none;" onclick="setActiveMenuItem(this)">Instructors Report</a></li>
                            <li><a href="/Admin_Caps/admin/report/generate_report_student.php" style="text-decoration: none;" onclick="setActiveMenuItem(this)">Student Report</a></li>
                            
                            <li><a href="/Admin_Caps/admin/report/systemLog.php" style="text-decoration: none;" onclick="setActiveMenuItem(this)">System Log</a></li>
                        </ul>
                    </li>
                    <li><a href="/Admin_Caps/admin/backup/backup.php"><i class="fas fa-database"></i> Backup And Restore</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("load", () => {
            if (localStorage.getItem("isFullScreen") === "true") {
                // Attempt to enter fullscreen right away
                toggleFullScreen();
            }
        });

        // Toggle fullscreen on button click
        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    console.log("Fullscreen error: " + err);
                });
                localStorage.setItem("isFullScreen", "true"); // Store in local storage
            } else {
                document.exitFullscreen().catch(err => {
                    console.log("Exit fullscreen error: " + err);
                });
                localStorage.setItem("isFullScreen", "false"); // Store in local storage
            }
        }
    </script>



    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>