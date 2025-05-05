<?php
// Start a PHP session
session_start();

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

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Hash the password
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $phone_number = $_POST["phone-number"];
    $full_name = $first_name . " " . $last_name;

    // Insert user into database
    $sql = "INSERT INTO logres (full_name, email, password, gender, username, phone_number)
            VALUES ('$full_name', '$email', '$password', '$gender', '$username', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        // Store username in a session variable
        $_SESSION['username'] = $username;

        // Redirect to index.html
        header("Location: Homepage/dashboard.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
