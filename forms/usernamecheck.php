<?php
require '../connect.php';

session_start();

$_SESSION['username'] = $_POST['username'];

$username = $_SESSION['username'];
$select = "SELECT username FROM umkmm WHERE username = '$username'";
$select = $conn->query($select);
if($select->rowCount() > 0)
{
    $result = 2;
}
else{
    $result = 1; 
}

echo $result;