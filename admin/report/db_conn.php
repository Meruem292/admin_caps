<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_caps";

function connectToDatabase()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getStudents($filters = [])
{
    $conn = connectToDatabase();
    $sql = "
        SELECT 
            s.stud_id, 
            s.last_name AS student_last_name, 
            s.given_name AS student_given_name, 
            s.middle_name AS student_middle_name, 
            c.course_name AS student_course, 
            sec.name AS section_name, 
            yl.year_level_name AS student_year_level,
            i.name AS instructor_name,
            sub.subj_code AS subject_code,
            hs.semester AS subject_semester
        FROM students s
        JOIN course c ON s.course_id = c.course_id
        JOIN sections sec ON s.section_id = sec.section_id
        JOIN year_level yl ON s.year_level_id = yl.year_level_id
        LEFT JOIN handled_subject_section hs ON sec.section_id = hs.section_id
        LEFT JOIN instructors i ON hs.instructor_id = i.emp_id
        LEFT JOIN subjects sub ON hs.subject_id = sub.subj_id
        WHERE 1";

    foreach ($filters as $key => $value) {
        if ($value) {
            $sql .= " AND {$key} = '" . $conn->real_escape_string($value) . "'";
        }
    }

    $result = $conn->query($sql);
    $students = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    $conn->close();
    return $students;
}

function getInstructors($filters = [])
{
    $conn = connectToDatabase();
    $sql = "
       SELECT 
    i.emp_id,
    i.name AS instructor_name, 
    i.major AS instructor_major, 
    i.contact AS instructor_contact, 
    i.email AS instructor_email,
    sub.subj_code AS subject_code, 
    hs.semester AS subject_semester, 
    hs.academic_year AS subject_academic_year,
    sec.name AS section_name,
    yl.year_level_name AS year_level_name
FROM instructors i
LEFT JOIN handled_subject_section hs ON hs.instructor_id = i.emp_id
LEFT JOIN subjects sub ON hs.subject_id = sub.subj_id
LEFT JOIN sections sec ON hs.section_id = sec.section_id
LEFT JOIN year_level yl ON hs.year_level_id = yl.year_level_id
WHERE 1;";

    foreach ($filters as $key => $value) {
        if ($value) {
            $sql .= " AND {$key} = '" . $conn->real_escape_string($value) . "'";
        }
    }

    $result = $conn->query($sql);
    $instructors = [];
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
    $conn->close();
    return $instructors;
}

function getCourses()
{
    $conn = connectToDatabase();
    $sql = "SELECT course_id, course_name FROM course";
    $result = $conn->query($sql);
    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    $conn->close();
    return $courses;
}

function getDepartments()
{
    $conn = connectToDatabase();
    $sql = "SELECT department_id, department_name FROM department";
    $result = $conn->query($sql);
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
    $conn->close();
    return $departments;
}

function getSections()
{
    $conn = connectToDatabase();
    $sql = "SELECT section_id, name AS section_name FROM sections";
    $result = $conn->query($sql);
    $sections = [];
    while ($row = $result->fetch_assoc()) {
        $sections[] = $row;
    }
    $conn->close();
    return $sections;
}

function getSubjects()
{
    $conn = connectToDatabase();
    $sql = "SELECT subj_id AS subject_id, subj_code AS subject_name FROM subjects";
    $result = $conn->query($sql);
    $subjects = [];
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
    $conn->close();
    return $subjects;
}

$data = [
    'students' => getStudents([]),
    'courses' => getCourses(),
    'instructors' => getInstructors([]),
    'departments' => getDepartments(),
    'sections' => getSections(),
    'subjects' => getSubjects()
];

header('Content-Type: application/json');
echo json_encode($data);
?>
