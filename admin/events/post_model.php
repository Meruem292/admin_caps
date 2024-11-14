<?php
include 'db_conn.php';

try {
    // Handle Create Event
    if (isset($_POST['create_event'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $author = $_POST['author'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        // Handle picture upload
        $picture = $_FILES['picture'];
        $picture_name = time() . '_' . $picture['name'];
        $target_directory = 'uploads/' . $picture_name;

        if (move_uploaded_file($picture['tmp_name'], $target_directory)) {
            // Insert event data into database
            $sql = "INSERT INTO events (title, description, author, start, end, picture) VALUES (:title, :description, :author, :start, :end, :picture)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':author' => $author,
                ':start' => $start,
                ':end' => $end,
                ':picture' => $picture_name
            ]);

            header("Location: events.php?status=success&action=created");
        } else {
            header("Location: events.php?status=error&action=created");
        }
        exit();
    }

    // Handle Update Event
    if (isset($_POST['update_event'])) {
        $id = $_POST['event_id'];
        $title = $_POST['update_title'];
        $description = $_POST['update_description'];
        $author = $_POST['update_author'];
        $start = $_POST['update_start'];
        $end = $_POST['update_end'];
        
        // Handle picture update if a new file is uploaded
        $update_picture = $_FILES['update_picture'];
        $update_picture_name = '';
        
        if (!empty($update_picture['name'])) {
            $update_picture_name = time() . '_' . $update_picture['name'];
            $target_directory = 'uploads/' . $update_picture_name;
            move_uploaded_file($update_picture['tmp_name'], $target_directory);
        }

        // Update query with picture if provided
        $sql = "UPDATE events SET title = :title, description = :description, author = :author, start = :start, end = :end";
        if ($update_picture_name) {
            $sql .= ", picture = :picture";
        }
        $sql .= " WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $params = [
            ':title' => $title,
            ':description' => $description,
            ':author' => $author,
            ':start' => $start,
            ':end' => $end,
            ':id' => $id
        ];
        if ($update_picture_name) {
            $params[':picture'] = $update_picture_name;
        }
        
        $stmt->execute($params);
        header("Location: events.php?status=success&action=updated");
        exit();
    }

    // Handle Delete Event
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // First, delete the picture file if it exists
        $stmt = $pdo->prepare("SELECT picture FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($event && file_exists('uploads/' . $event['picture'])) {
            unlink('uploads/' . $event['picture']);
        }

        // Delete event from database
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);

        // Redirect with success message after deletion
        header("Location: events.php?status=success&action=deleted");
        exit();
    }

} catch (Exception $e) {
    // Log the error and redirect with an error status
    error_log("Error in post_model.php: " . $e->getMessage());
    header("Location: events.php?status=error");
    exit();
}
?>
