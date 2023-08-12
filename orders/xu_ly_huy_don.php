<?php
    $id = $_GET['id'];
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $sql = "UPDATE orders SET status = 'ĐÃ HỦY' WHERE id = $id";
    $con->query($sql);
    header("Location: orders_customer.php");
