<?php
include('db_conn_assign.php');
$conn = connectToDatabase();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $instructor_id = $_POST['instructor_id'];
    $section_id = $_POST['section_id'];
    $subject_id = $_POST['subject_id'];
    $department_id = $_POST['department_id'];
    $year_level_id = $_POST['year_level_id'];
    $semester = $_POST['semester'];
    $academic_year = $_POST['academic_year'];
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];


    // $sql1 = "UPDATE `instructors` SET `department_id`='$department_id' WHERE `emp_id` = $instructor_id";

    $sql = "INSERT INTO handled_subject_section (instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisssss", $instructor_id, $subject_id, $section_id, $year_level_id, $semester, $academic_year, $start_datetime, $end_datetime);
    
    if ($stmt->execute()) {
        header("Location: instructor.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
