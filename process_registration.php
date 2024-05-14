<?php
// Database connection
$servername = "localhost";
$username = "guest";
$password = "Afrika@00";
$dbname = "tryouts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$position = $_POST['position'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert data into database
$sql = "INSERT INTO players (first_name, last_name, position, email, phone) VALUES ('$first_name', '$last_name', '$position', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    // Redirect to PayPal payment page
    header("Location: paypal_payment.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
