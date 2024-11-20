<?php
session_start();

include 'db_connect.php';

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
     

        // Check if the password matches
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username']; // Store username
            $_SESSION['user_id'] = $user['id']; // Store user_id
            echo "Login successful! Welcome, " . htmlspecialchars($user['username']) . ".";
            header("Location: index.php");
            exit();
        } else {
            echo "Password does not match.<br>";
        }
    } else {
        echo "Username not found.<br>";
    }
}
?>

