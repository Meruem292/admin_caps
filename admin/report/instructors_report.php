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

    <!-- DataTables CSS and JS -->
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
                                <!-- Filter Section -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="instructorFilter">Instructor:</label>
                                            <select class="form-control" id="instructorFilter">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="sectionFilter">Section:</label>
                                            <select class="form-control" id="sectionFilter">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="yearLevelFilter">Year Level:</label>
                                            <select class="form-control" id="yearLevelFilter">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="subjectFilter">Subject:</label>
                                            <select class="form-control" id="subjectFilter">
                                                <option value="">All</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <h3 id="filterSummary">Filter to Generate Report For Instructors</h3>

                                <!-- Instructors Table -->
                                <!-- DataTable -->
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Instructor</th>
                                            <th>Subject</th>
                                            <th>Section</th>
                                            <th>Year Level</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated by JavaScript -->
                                    </tbody>
                                </table>

                                <button class="btn btn-primary mt-3 mb-5" id="printBtn">Print Filtered Results</button>
                            </div>
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
            // Fetch initial filter data
            $.ajax({
                url: 'fetch_data.php',
                method: 'GET',
                data: {
                    action: 'filters'
                },
                dataType: 'json',
                success: function(response) {
                    populateFilters(response);
                    initializeDataTable(); 
                }
            });


            function populateFilters(response) {
                response.instructors.forEach(function(instructor) {
                    $('#instructorFilter').append(new Option(instructor.name, instructor.emp_id));
                });

                response.sections.forEach(function(section) {
                    $('#sectionFilter').append(new Option(section.name, section.section_id));
                });

                response.yearLevels.forEach(function(yearLevel) {
                    $('#yearLevelFilter').append(new Option(yearLevel.year_level_name, yearLevel.year_level_id));
                });

                response.subjects.forEach(function(subject) {
                    $('#subjectFilter').append(new Option(subject.subj_code + " - " + subject.subj_desc, subject.subj_id));
                });
            }


            function initializeDataTable() {
          
                $.ajax({
                    url: 'fetch_data.php',
                    method: 'GET',
                    data: {
                        action: 'table',
                        instructor_id: $('#instructorFilter').val(),
                        section_id: $('#sectionFilter').val(),
                        year_level_id: $('#yearLevelFilter').val(),
                        subject_id: $('#subjectFilter').val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Initialize or re-initialize DataTable
                        $('#example').DataTable({
                            data: response,
                            destroy: true,
                            columns: [{
                                    title: 'Instructor',
                                    data: 'instructor'
                                },
                                {
                                    title: 'Subject',
                                    data: 'subj_code'
                                },
                                {
                                    title: 'Section',
                                    data: 'section'
                                },
                                {
                                    title: 'Year Level',
                                    data: 'year_level_name'
                                },
                                {
                                    title: 'Start Date',
                                    data: 'start_datetime'
                                },
                                {
                                    title: 'End Date',
                                    data: 'end_datetime'
                                }
                            ]
                        });
                    }
                });
            }

   
            $('#printBtn').on('click', function() {
                var table = $('#example').DataTable();

           
                var filteredData = table.rows({
                    search: 'applied'
                }).data();

                
                var printContent = '<html><head><title>Print Table</title>' +
                    '<style>table {width: 100%; border-collapse: collapse;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style>' +
                    '</head><body>';

               
                var filterText = '<h2>Filtered Report:</h2><p>';
                filterText += ($('#instructorFilter').val()) ? 'Instructor: ' + $('#instructorFilter option:selected').text() + '<br>' : '';
                filterText += ($('#sectionFilter').val()) ? 'Section: ' + $('#sectionFilter option:selected').text() + '<br>' : '';
                filterText += ($('#yearLevelFilter').val()) ? 'Year Level: ' + $('#yearLevelFilter option:selected').text() + '<br>' : '';
                filterText += ($('#subjectFilter').val()) ? 'Subject: ' + $('#subjectFilter option:selected').text() + '<br>' : '';
                filterText += '</p>';

                
                printContent += filterText + '<table><thead><tr>' +
                    '<th>Instructor</th><th>Subject</th><th>Section</th><th>Year Level</th><th>Start Date</th><th>End Date</th></tr></thead><tbody>';

               
                filteredData.each(function(rowData) {
                    printContent += '<tr>';
                    printContent += '<td>' + rowData.instructor + '</td>';
                    printContent += '<td>' + rowData.subj_code + '</td>';
                    printContent += '<td>' + rowData.section + '</td>';
                    printContent += '<td>' + rowData.year_level_name + '</td>';
                    printContent += '<td>' + rowData.start_datetime + '</td>';
                    printContent += '<td>' + rowData.end_datetime + '</td>';
                    printContent += '</tr>';
                });

                printContent += '</tbody></table></body></html>';

                
                var printWindow = window.open('', '_blank', 'width=800,height=600');
                printWindow.document.write(printContent);
                printWindow.document.close();
                printWindow.print();
            });

         
            $('#instructorFilter, #sectionFilter, #yearLevelFilter, #subjectFilter').on('change', function() {
                initializeDataTable();
            });
        });
    </script>

</body>

</html>