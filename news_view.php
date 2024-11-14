<?php
include "header.php";

// Database connection
require_once 'db_conn.php';

// Check if 'id' is set in URL query parameter
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Query to fetch event details by ID
    $sql = "SELECT * FROM events WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $event_id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if event exists
    if ($stmt->rowCount() > 0) {
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // If no event found
        echo "<p>Event not found</p>";
        exit;
    }
} else {
    // If 'id' is not set in the URL
    echo "<p>No event selected</p>";
    exit;
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./assets/css/style.css">

<html>

<head>
    <title><?php echo htmlspecialchars($event['title']); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            width: 80%;
            margin: 0 auto;
        }

        .main-content {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin-right: 20px;
        }

        .main-content h1 {
            font-size: 28px;
            color: #333;
        }

        .main-content .author {
            font-size: 14px;
            color: #fff;
            background-color: #d32f2f;
            padding: 5px 10px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .main-content .date {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .main-content img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            max-height: 360px;
            height: auto;
            margin-bottom: 20px;
        }

        .sidebar {
            max-width: 300px;
            flex-shrink: 0;
        }

        .sidebar .popular-news {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .popular-news h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .sidebar .popular-news .news-item {
            display: flex;
            margin-bottom: 20px;
        }

        .sidebar .popular-news .news-item .news-content {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .sidebar .popular-news .news-item img {
            max-width: 80px;
            height: auto;
            margin-right: 10px;
        }

        .sidebar .popular-news .news-item .news-info {
            max-width: 200px;
        }

        .sidebar .popular-news .news-item .news-info h3 {
            font-size: 14px;
            color: #333;
            margin: 0;
        }

        .sidebar .popular-news .news-item .news-info .date {
            font-size: 12px;
            color: #666;
        }

        .sidebar .popular-news .news-item .news-info .tag {
            font-size: 12px;
            color: #fff;
            background-color: #d32f2f;
            padding: 2px 5px;
            display: inline-block;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
            }

            .sidebar {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="main-content">
            <div class="author">
                <?php echo htmlspecialchars($event['author']); ?>
            </div>
            <div class="date">
                Posted <?php echo date("F d, Y", strtotime($event['start'])); ?>
            </div>
            <h1>
                <?php echo htmlspecialchars($event['title']); ?>
            </h1>
            <div class="social-buttons">
                <!-- Social media buttons if needed -->
            </div>
            <img alt="<?php echo htmlspecialchars($event['title']); ?>" src="./admin/events/uploads/<?php echo htmlspecialchars($event['picture']); ?>" />
            <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
        </div>

        <div class="sidebar">
            <div class="popular-news">
                <h2>Popular News</h2>
                <?php
                // Fetch popular news or events
                $popular_sql = "SELECT * FROM events ORDER BY start DESC LIMIT 5";
                $popular_stmt = $pdo->query($popular_sql);
                while ($row = $popular_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="news-item">
                        <a href="news_view.php?id=<?php echo $row['id'] ?>" class="text-decoration-none">
                            <div class="news-content">
                                <img alt="<?php echo htmlspecialchars($row['title']) ?>" src="./admin/events/uploads/<?php echo htmlspecialchars($row['picture']) ?>" class="news-image" />
                                <div class="news-info">
                                    <h3><?php echo htmlspecialchars($row['title']) ?></h3>
                                    <div class="tag">NEWS</div>
                                    <div class="date"><?php echo date("F d, Y", strtotime($row['start'])) ?></div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php include  "./announcement.php" ?>
</body>

</html>

<?php include 'footer.php'; ?>
