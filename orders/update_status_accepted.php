<?php
session_start();
$admin_id = "";
if(isset ($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}
if($admin_id != ""){
    $id = $_GET['id'];
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $update = "UPDATE orders SET status = 'ACCEPTED', admin_id = '$admin_id' WHERE id = $id";
    $con->query($update);
    header("Location: ../admin.php?page=orders/orders.php");
}
