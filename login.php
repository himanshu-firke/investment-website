<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if user exists in database
    $sql = "SELECT * FROM logres WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, redirect to dashboard or home page
        header("Location:Homepage/dashboard.php");
        exit();
    } else {
        // User not found, redirect back to login page with error message
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}

// Close connection
$conn->close();
?>
