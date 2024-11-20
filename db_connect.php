<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buzzhub";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Connect to the database
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>