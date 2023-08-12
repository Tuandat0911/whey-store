<?php
    $id = $_GET['id'];
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $delete = "DELETE FROM accounts WHERE id = $id";
    if($con->query($delete) === True) {
        header("Location: admin.php?page=accounts/accounts.php");
    } else {
        echo 'Error: '. $con->error;
    }

