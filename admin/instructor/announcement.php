<?php
require_once './events/db_conn.php';
global $pdo;
?>

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        width: 18rem;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-subtitle {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .card-text {
        font-size: 0.95rem;
        color: #333;
    }

    .card button {
        margin-top: 10px;
    }
</style>

<div class="card-container">
    <?php
    // Modify the query to fetch only the most recent 5 announcements
    $stmt = $pdo->prepare("SELECT title, body, picture, date_posted FROM announcements ORDER BY id DESC LIMIT 5");
    $stmt->execute();
    $announcements = $stmt->fetchAll();

    if ($announcements) {
        foreach ($announcements as $announcement) {
            $imagePath = 'events/' . $announcement['picture'];
            $title = htmlspecialchars($announcement['title']);
            $body = htmlspecialchars($announcement['body']);
            $datePosted = htmlspecialchars($announcement['date_posted']);
            $formattedDate = date('F j, Y', strtotime($datePosted));
    ?>
            <div class="card">
                <img src="<?php echo $imagePath; ?>" alt="Announcement Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <h6 class="card-subtitle mb-2"><?php echo $formattedDate; ?></h6>
                    <p class="card-text"><?php echo substr($body, 0, 150) . '...'; ?></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="<?php echo $title; ?>" data-bs-content="<?php echo $body . " (" . $formattedDate . ")."; ?>">
                        View Details
                    </button>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No announcements available.</p>";
    }
    ?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    });
</script>
