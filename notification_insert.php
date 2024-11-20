<?php
// Function to insert a new notification
function insertNotification($conn, $userId, $tweetId, $notificationText) {
    $stmt = $conn->prepare("INSERT INTO notifications (user_id, tweet_id, notification_text) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iis", $userId, $tweetId, $notificationText);

    // Execute the query
    if ($stmt->execute()) {
        echo "Notification inserted successfully!";
    } else {
        echo "Error inserting notification: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
