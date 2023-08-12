<?php
ob_start();
require_once('../config.php');
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
$id = $_GET['id'];
$delete = "DELETE FROM admin WHERE id = $id";
$con->query($delete);
header("Location: ../admin.php?page=admin/admin_table.php");
exit();
ob_end_clean();