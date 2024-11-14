<?php include "../template/template.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>Instructor Filter</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="content-body">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="courseFilter">Course: </label>
                                            <select class="form-control" id="courseFilter">
                                                <option value="">Select Course</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="yearLevelFilter">Year Level: </label>
                                            <select class="form-control" id="yearLevelFilter">
                                                <option value="">Select Year Level</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="instructorFilter">Instructor: </label>
                                            <select class="form-control" id="instructorFilter">
                                                <option value="">Select Instructor</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="subjectFilter">Subject: </label>
                                            <select class="form-control" id="subjectFilter">
                                                <option value="">Select Subject</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <label for="semesterFilter">Semester: </label>
                                            <select class="form-control" id="semesterFilter">
                                                <option value="">Select Semester</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="mt-2" id="dynamicHeader">Filter to Generate Report For Students</h2>

                                <table id="studentTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>Given Name</th>
                                            <th>Middle Name</th>
                                            <th>Course</th>
                                            <th>Year Level</th>
                                            <th>Instructor</th>
                                            <th>Subject</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <button class="btn btn-primary mt-2" id="printButton">Print Table</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $.getJSON('db_conn.php', function(data) {
                    var studentTable = $('#studentTable').DataTable({
                        data: data.students,
                        columns: [{
                                data: 'student_last_name'
                            },
                            {
                                data: 'student_given_name'
                            },
                            {
                                data: 'student_middle_name'
                            },
                            {
                                data: 'student_course'
                            },
                            {
                                data: 'student_year_level'
                            },
                            {
                                data: 'instructor_name'
                            },
                            {
                                data: 'subject_code'
                            },
                            {
                                data: 'subject_semester'
                            }
                        ]
                    });

                    var courses = [...new Set(data.students.map(item => item.student_course))];
                    courses.forEach(course => {
                        $('#courseFilter').append(new Option(course, course));
                    });

                    var yearLevels = [...new Set(data.students.map(item => item.student_year_level))];
                    yearLevels.forEach(yearLevel => {
                        $('#yearLevelFilter').append(new Option(yearLevel, yearLevel));
                    });

                    var instructors = [...new Set(data.instructors.map(item => item.instructor_name))];
                    instructors.forEach(instructor => {
                        $('#instructorFilter').append(new Option(instructor, instructor));
                    });

                    var subjects = [...new Set(data.subjects.map(item => item.subject_name))];
                    subjects.forEach(subject => {
                        $('#subjectFilter').append(new Option(subject, subject));
                    });

                    var semesters = [...new Set(data.students.map(item => item.subject_semester))];
                    semesters.forEach(semester => {
                        $('#semesterFilter').append(new Option(semester, semester));
                    });

                    $('#courseFilter').on('change', function() {
                        var courseFilter = this.value;
                        studentTable.column(3).search(courseFilter).draw();
                        updateDynamicHeader();
                    });

                    $('#yearLevelFilter').on('change', function() {
                        var yearLevelFilter = this.value;
                        studentTable.column(4).search(yearLevelFilter).draw();
                        updateDynamicHeader();
                    });

                    $('#instructorFilter').on('change', function() {
                        var instructorFilter = this.value;
                        studentTable.column(5).search(instructorFilter).draw();
                        updateDynamicHeader();
                    });

                    $('#subjectFilter').on('change', function() {
                        var subjectFilter = this.value;
                        studentTable.column(6).search(subjectFilter).draw();
                        updateDynamicHeader();
                    });

                    $('#semesterFilter').on('change', function() {
                        var semesterFilter = this.value;
                        studentTable.column(7).search(semesterFilter).draw();
                        updateDynamicHeader();
                    });

                    function generateDynamicHeader() {
                        var filterText = 'Filtered Students: ';
                        var courseFilter = $('#courseFilter').val();
                        var yearLevelFilter = $('#yearLevelFilter').val();
                        var instructorFilter = $('#instructorFilter').val();
                        var subjectFilter = $('#subjectFilter').val();
                        var semesterFilter = $('#semesterFilter').val();

                        if (courseFilter) filterText += 'Course: ' + courseFilter + ', ';
                        if (yearLevelFilter) filterText += 'Year Level: ' + yearLevelFilter + ', ';
                        if (instructorFilter) filterText += 'Instructor: ' + instructorFilter + ', ';
                        if (subjectFilter) filterText += 'Subject: ' + subjectFilter + ', ';
                        if (semesterFilter) filterText += 'Semester: ' + semesterFilter + ', ';

                        filterText = filterText.slice(0, -2);
                        return filterText;
                    }

                    function updateDynamicHeader() {
                        var filterHeader = generateDynamicHeader();
                        $('#dynamicHeader').text(filterHeader || 'Filter Students to Generate Report');
                    }
                   
                    $('#printButton').on('click', function() {
                        var printContent = document.getElementById('studentTable').outerHTML;
                        var printWindow = window.open('', '', 'height=500, width=800');
                        printWindow.document.write('<html><head><title>Print Table</title>');
                        printWindow.document.write('<style>');
                        printWindow.document.write('#studentTable { border-collapse: collapse; width: 100%; }');
                        printWindow.document.write('#studentTable th, #studentTable td { border: 1px solid black; padding: 8px; text-align: left; }');
                        printWindow.document.write('</style></head><body>');
                        printWindow.document.write('<h2>' + generateDynamicHeader() + '</h2>');
                        printWindow.document.write(printContent);
                        printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.print();
                    });

                });
            });
        </script>
</body>

</html>