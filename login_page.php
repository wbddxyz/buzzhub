<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'templates/navbar.php' ?>

<div class="container">

<div class="form-container">
    <h2>User Login</h2>
    <form action="login.php" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="submit-btn">Login</button>
    </form>

</div>
</div>

</body>
</html>
