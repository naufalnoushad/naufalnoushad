<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name1"];
    $email = $_POST["email1"];
    $age = $_POST["age1"];
    $place = $_POST["p1"];
    $donationPeriod = $_POST["donationPeriod"];
    $bloodGroup = $_POST["currency"];

    // Prepare and execute SQL statement
    $sql = "INSERT INTO blood (name, email, age, place, donation_period, blood_group)
            VALUES ('$name', '$email', '$age', '$place', '$donationPeriod', '$bloodGroup')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("Location: success_blood.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>