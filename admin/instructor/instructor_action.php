<?php
include '../database/db_conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = $_POST['name'];
    $major = $_POST['major'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $civil_stats = $_POST['civil_stats'];

    $stmt = $conn->prepare("INSERT INTO instructors (name, major, contact, email, birthday, civil_stats, portfolio, cv, transcripts, valid_id, cover_letter) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database preparation failed: ' . $conn->error]);
        exit;
    }

    $portfolio = $cv = $transcripts = $valid_id = $cover_letter = null;
    $uploadDir = 'uploads/'; 

    $files = [
        'portfolio' => $_FILES['portfolio'],
        'cv' => $_FILES['cv'],
        'transcripts' => $_FILES['transcripts'],
        'valid_id' => $_FILES['valid_id'],
        'cover_letter' => $_FILES['cover_letter']
    ];

    foreach ($files as $key => $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($file['name']);
            $targetFilePath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                ${$key} = $fileName;
            } else {
                echo json_encode(['status' => 'error', 'message' => "Error uploading $key."]);
                exit;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => "No file uploaded for $key or an error occurred."]);
            exit;
        }
    }

    $stmt->bind_param("sssssssssss", $name, $major, $contact, $email, $birthday, $civil_stats, $portfolio, $cv, $transcripts, $valid_id, $cover_letter);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Instructor added successfully with files uploaded.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding instructor: ' . $stmt->error]);
    }

    $stmt->close();

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}

if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $id = $_POST['id'];
    $query = "SELECT * FROM instructors WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($result);

    echo json_encode(array('status' => 'success', 'data' => $user_data));
    exit;
}

if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $civil_stats = $_POST['civil_stats'];

    $stmt = $conn->prepare("UPDATE instructors SET name=?, major=?, contact=?, email=?, birthday=?, civil_stats=? WHERE id=?");

    $stmt->bind_param("ssssssi", $name, $major, $contact, $email, $birthday, $civil_stats, $id);

    if ($stmt->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'User updated successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error updating user: ' . $stmt->error));
    }

    $stmt->close();
    exit;
}
?>
