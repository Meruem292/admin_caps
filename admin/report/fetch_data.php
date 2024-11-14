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

function getInstructors($conn) {
    $sql = "SELECT emp_id, name FROM instructors";
    $result = $conn->query($sql);
    $instructors = [];
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
    return $instructors;
}

function getSections($conn) {
    $sql = "SELECT section_id, name FROM sections";
    $result = $conn->query($sql);
    $sections = [];
    while ($row = $result->fetch_assoc()) {
        $sections[] = $row;
    }
    return $sections;
}

function getYearLevels($conn) {
    $sql = "SELECT year_level_id, year_level_name FROM year_level";
    $result = $conn->query($sql);
    $yearLevels = [];
    while ($row = $result->fetch_assoc()) {
        $yearLevels[] = $row;
    }
    return $yearLevels;
}

function getSubjects($conn) {
    $sql = "SELECT subj_id, subj_code, subj_desc FROM subjects";
    $result = $conn->query($sql);
    $subjects = [];
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
    return $subjects;
}

function getHandledSubjects($conn, $filters = []) {
    $sql = "SELECT hs.instructor_id, i.name AS instructor, s.name AS section, y.year_level_name, sub.subj_code, sub.subj_desc, hs.start_datetime, hs.end_datetime 
            FROM handled_subject_section hs
            JOIN instructors i ON hs.instructor_id = i.emp_id
            JOIN sections s ON hs.section_id = s.section_id
            JOIN year_level y ON hs.year_level_id = y.year_level_id
            JOIN subjects sub ON hs.subject_id = sub.subj_id
            WHERE 1=1";
    
    if (!empty($filters['instructor_id'])) {
        $sql .= " AND hs.instructor_id = " . $filters['instructor_id'];
    }
    if (!empty($filters['section_id'])) {
        $sql .= " AND hs.section_id = " . $filters['section_id'];
    }
    if (!empty($filters['year_level_id'])) {
        $sql .= " AND hs.year_level_id = " . $filters['year_level_id'];
    }
    if (!empty($filters['subject_id'])) {
        $sql .= " AND hs.subject_id = " . $filters['subject_id'];
    }

    $result = $conn->query($sql);
    $handledSubjects = [];
    while ($row = $result->fetch_assoc()) {
        $handledSubjects[] = $row;
    }
    return $handledSubjects;
}

$conn = connectToDatabase();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'filters') {
    $instructors = getInstructors($conn);
    $sections = getSections($conn);
    $yearLevels = getYearLevels($conn);
    $subjects = getSubjects($conn);

    echo json_encode([
        'instructors' => $instructors,
        'sections' => $sections,
        'yearLevels' => $yearLevels,
        'subjects' => $subjects
    ]);
} elseif ($action == 'table') {
    $filters = [
        'instructor_id' => isset($_GET['instructor_id']) ? $_GET['instructor_id'] : '',
        'section_id' => isset($_GET['section_id']) ? $_GET['section_id'] : '',
        'year_level_id' => isset($_GET['year_level_id']) ? $_GET['year_level_id'] : '',
        'subject_id' => isset($_GET['subject_id']) ? $_GET['subject_id'] : ''
    ];

    $handledSubjects = getHandledSubjects($conn, $filters);

    echo json_encode($handledSubjects);
} else {
    echo json_encode(['error' => 'Invalid action']);
}

$conn->close();
?>
