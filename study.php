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
    $email = $_POST['email1'];
    $mobile_no = $_POST['amount1'];
    $material_type = $_POST['currency'];

    $sql = "INSERT INTO study (full_name, email, mobile_no, material_type) 
            VALUES ('$full_name', '$email', '$mobile_no', '$material_type')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success_study.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>