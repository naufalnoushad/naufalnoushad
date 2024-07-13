<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // No password
$dbname = "donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated, redirect to home page
        header("Location: my.html");
        exit;
    } else {
        // Invalid credentials, handle error (e.g., display error message)
        echo "Invalid username or password.";
    }
}

// Registration form handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Insert new user into the database
    $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: my.html");
        exit;
    } else {
        // Error occurred, handle appropriately (e.g., display error message)
        echo "Error: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>