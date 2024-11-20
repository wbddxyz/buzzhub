<?php 

include 'db_connect.php';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $location = $_POST['location'];

    
    
    // Handle the profile picture upload
    $profilePicturePath = null;
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] == 0) {
        $targetDir = "uploads/";
        $profilePicturePath = $targetDir . basename($_FILES["profile-picture"]["name"]);
        
        // Ensure the uploads directory exists
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move uploaded file to target directory
        if (!move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $profilePicturePath)) {
            die("Failed to upload profile picture.");
        }
    }

    // Insert user profile data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, bio, profile_picture_path) VALUES (:username, :bio, :profile_picture_path)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':profile_picture_path', $profilePicturePath);

        $stmt->execute();
        echo "Profile created successfully!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}