<?php
session_start();

$id = $_GET['id'];
require_once('../config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $update = "UPDATE orders SET status = 'RECEIVED' WHERE id = $id";
    $admin = "";
    $con->query($update);
    header("Location: xu_ly_don_thanh_cong.php?id=$id");

