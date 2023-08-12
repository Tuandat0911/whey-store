<?php
session_start();
$id = $_GET['id'];
$_SESSION['carts'][$id] = [];
header("Location: ../admin.php?page=order_offline/cart_offline.php");
?>