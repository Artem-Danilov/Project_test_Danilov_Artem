<?php

require_once '../config/datebase.php';

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

mysqli_query($connect, "INSERT INTO `feedback` (`name`, `address`, `phone`, `email`) VALUES ('$name', '$address', '$phone', '$email')");

header('Location: ../feedback.php');

?>
