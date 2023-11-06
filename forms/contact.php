<?php
require '../connect.php';

$result = 1;
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
  $result = 0;
} else {
    $insert = "INSERT INTO contactus (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $insert = $conn->query($insert);
}

echo $result;
?>