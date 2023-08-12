<?php

$id = $_GET['id'];
require_once('../config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $update = "UPDATE orders SET status = 'SHIPPING' WHERE id = $id";
    $con->query($update);
    header("Location: ../admin.php?page=orders/orders.php");

