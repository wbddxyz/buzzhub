<?php
session_start();
include 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to submit a tweet.";
    exit();
}

// Check if the tweet is set and not empty
if (isset($_POST['tweet']) && !empty($_POST['tweet'])) {
    // Get tweet content and user_id
    $tweet_content = $_POST['tweet'];
    $user_id = $_SESSION['user_id'];

    // Debugging: Print tweet content
    echo "Tweet Content: " . htmlspecialchars($tweet_content) . "<br>";

   

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO tweets (user_id, content) VALUES (:user_id, :content)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':content', $tweet_content);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the homepage
        header("Location: index.php");
        exit();
    } else {
        echo "There was an error submitting your tweet. Please try again.";
    }
} else {
    echo "Tweet cannot be empty. Please write something.";
}
?>
