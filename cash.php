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
    $last_name = $_POST['name2'];
    $email = $_POST['email1'];
    $mobile_no = $_POST['amount1'];
    $account_no = $_POST['ac1'];
    $currency = $_POST['currency'];
    $google_pay_upi = $_POST['googlepay'];

    $sql = "INSERT INTO cash (full_name, last_name, email, mobile_no, account_no, currency, google_pay_upi) 
            VALUES ('$full_name', '$last_name', '$email', '$mobile_no', '$account_no', '$currency', '$google_pay_upi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success_cash.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>