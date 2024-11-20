<?php
session_start();
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-like App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <?php include 'templates/navbar.php'; ?>
    
    <div class="content container">
        <aside class="sidebar frosted-glass">
            <h2>Trending</h2>
            <ul>
                <li>#JavaScript</li>
                <li>#WebDevelopment</li>
                <li>#CSS</li>
            </ul>
        </aside>

        <main class="feed">
            <div class="tweet-box">
                <form action="submit_buzz.php" method="POST">
                    <textarea name="tweet" placeholder="What's happening?" required></textarea>
                    <button type="submit">Buzz</button>
                </form>
            </div>

            <?php
            // Fetch tweets from the database
            $stmt = $pdo->query("SELECT username, content, created_at FROM tweets ORDER BY created_at DESC");
            while ($tweet = $stmt->fetch()) {
                echo '<div class="tweet">';
                echo '<div class="tweet-header">';
                echo '<img src="https://i.pravatar.cc/150?img=3" alt="User Icon" class="user-icon">';  
                echo '<strong>' . htmlspecialchars($tweet['username']) . '</strong>';
                echo '<span>' . htmlspecialchars($tweet['created_at']) . '</span>';
                echo '</div>';
                echo '<p>' . htmlspecialchars($tweet['content']) . '</p>';
                echo '</div>';
            }
            ?>
        </main>

        <!-- Profile Section -->
        <aside class="profile-section">
            <?php
            $userStmt = $pdo->prepare("SELECT username, bio FROM users WHERE id = :id");
            $userStmt->execute(['id' => $_SESSION['user_id']]); // Assuming user_id is stored in session
            $user = $userStmt->fetch();

            if ($user) {
                echo '<img src="img/myDP.jpg" alt="Profile Picture" class="profile-pic" />';
                echo '<h2>@' . htmlspecialchars($user['username']) . '</h2>';
                echo '<p>' . htmlspecialchars($user['bio']) . '</p>';
            }
            ?>
        </aside>

     


    </div>

    <footer>
        <p>&copy; 2024 Buzzhub. Photo by <a href="https://unsplash.com/@creedi?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Creedi Zhong</a> on <a href="https://unsplash.com/photos/home-theater-cPDYIQ6l65A?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></p>
    </footer>
</body>
</html>
