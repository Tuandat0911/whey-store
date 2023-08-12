<?php
require_once('config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);

    $email_login = $_POST['email_login'];
    $password_login = $_POST['password_login'];
    $login = "SELECT * FROM accounts WHERE email = '$email_login' AND password = '$password_login'";
    $result = $con->query($login);
    $obj = null;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $obj = $row;
        }
    }
    if($obj == null){
        header("Location: login.php?msg=error");
    }
    else{
        session_start();
        $_SESSION['username'] = $obj['username'];
        $_SESSION['id'] = $obj['id'];
        header("Location: home.php");
    }
