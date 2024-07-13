<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['name1'];
    $place = $_POST['pl'];
    $age = $_POST['age1'];
    $hair_type = $_POST['hair_type'];

    $sql = "INSERT INTO hair (full_name, place, age, hair_type) 
            VALUES ('$full_name', '$place', '$age', '$hair_type')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success_hair.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>