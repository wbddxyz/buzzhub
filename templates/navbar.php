<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<header>
        <h1>Buzzhub</h1>
        <nav class="frosted-glass">
            <ul>
                <li><?php
            // Check if the user is logged in, show logout button if yes
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="logout.php" class="logout-btn">Logout</a></li>';
            }
            ?>
            </i>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Explore</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="profilepage.php">Profile</a></li>
                <li><a href="login_page.php">Login<i class="fa fa-sign-in" aria-hidden="true"></a></i>
                <li><a href="signup.html">Signup</a>
            </ul>
        </nav>
    </header>