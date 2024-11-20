<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

<link rel="stylesheet" href="styles.css">

</head>
<body>

<div class="container">
<?php include 'templates/navbar.php' ?>

<div class="content">

<div></div>

<div class="form-container">
    <h2>Create Account</h2>
    <form action="signup.php" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="submit-btn">Sign Up</button>
    </form>
</div>

<div> </div>

</div>

</div>

</body>
</html>