$(document).ready(function () {
    // Fetch initial filter data
    $.ajax({
        url: 'fetch_data.php',
        method: 'GET',
        data: { action: 'filters' },
        dataType: 'json',
        success: function (response) {
            populateFilters(response);
            initializeDataTable(); // Initial load with all data
        }
    });

    // Function to populate filter dropdowns
    function populateFilters(response) {
        response.instructors.forEach(function (instructor) {
            $('#instructorFilter').append(new Option(instructor.name, instructor.emp_id));
        });

        response.sections.forEach(function (section) {
            $('#sectionFilter').append(new Option(section.name, section.section_id));
        });

        response.yearLevels.forEach(function (yearLevel) {
            $('#yearLevelFilter').append(new Option(yearLevel.year_level_name, yearLevel.year_level_id));
        });

        response.subjects.forEach(function (subject) {
            $('#subjectFilter').append(new Option(subject.subj_code + " - " + subject.subj_desc, subject.subj_id));
        });
    }

    // Function to initialize or reload the DataTable based on filters
    function initializeDataTable() {
        // Fetch filtered table data
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
            success: function (response) {
                // Initialize or re-initialize DataTable
                $('#example').DataTable({
                    data: response,
                    destroy: true,
                    columns: [
                        { title: 'Instructor', data: 'instructor' },
                        { title: 'Subject', data: 'subj_code' },
                        { title: 'Section', data: 'section' },
                        { title: 'Year Level', data: 'year_level_name' },
                        { title: 'Start Date', data: 'start_datetime' },
                        { title: 'End Date', data: 'end_datetime' }
                    ]
                });
            }
        });
    }

    // Print button functionality
    $('#printBtn').on('click', function() {
        var table = $('#example').DataTable();

        // Get only filtered data from DataTable
        var filteredData = table.rows({ search: 'applied' }).data();

        // Prepare print content
        var printContent = '<html><head><title>Print Table</title>' +
            '<style>table {width: 100%; border-collapse: collapse;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style>' +
            '</head><body>';
        
        // Add filter summary for context
        var filterText = '<h2>Filtered Report:</h2><p>';
        filterText += ($('#instructorFilter').val()) ? 'Instructor: ' + $('#instructorFilter option:selected').text() + '<br>' : '';
        filterText += ($('#sectionFilter').val()) ? 'Section: ' + $('#sectionFilter option:selected').text() + '<br>' : '';
        filterText += ($('#yearLevelFilter').val()) ? 'Year Level: ' + $('#yearLevelFilter option:selected').text() + '<br>' : '';
        filterText += ($('#subjectFilter').val()) ? 'Subject: ' + $('#subjectFilter option:selected').text() + '<br>' : '';
        filterText += '</p>';

        // Add the table header
        printContent += filterText + '<table><thead><tr>' +
            '<th>Instructor</th><th>Subject</th><th>Section</th><th>Year Level</th><th>Start Date</th><th>End Date</th></tr></thead><tbody>';

        // Add filtered rows to the print content
        filteredData.each(function (rowData) {
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

        // Open new window for printing
        var printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write(printContent);
        printWindow.document.close();
        printWindow.print();
    });

    // Event listeners for filters to reload table on change
    $('#instructorFilter, #sectionFilter, #yearLevelFilter, #subjectFilter').on('change', function () {
        initializeDataTable();
    });
});
