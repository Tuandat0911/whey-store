<?php
require_once('config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $email_signup = $_POST['email_signup'];
    $password_signup = $_POST['password_signup'];
    $username = $_POST['username'];
    $insert = "INSERT INTO accounts (username, email, password) VALUES ('$username', '$email_signup', '$password_signup')";
    $con->query($insert);
    header("Location:login.php");



