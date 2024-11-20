


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buzzhub";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>




 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile - Squaker</title>
    <link rel="stylesheet" href="styles.css">


</head>
<body>

<div class="flex-container">
<?php include 'templates/navbar.php' ?>


<div class="container">





    <div class="form-container">
        <h1>Create Your Profile</h1>
        <form action="submit_profile.php" method="POST" enctype="multipart/form-data">
            <!-- Profile Picture -->
            <div class="input-group">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile-picture" accept="image/*" required>
            </div>

            <!-- Username -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <!-- Bio -->
            <div class="input-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" placeholder="Tell us about yourself" required></textarea>
            </div>

            <!-- Location -->
            <div class="input-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Where are you located?">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Create Profile</button>
        </form>
    </div>
</div>
</div>

</body>
</html>
