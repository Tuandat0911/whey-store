<?php
    $id=$_GET['id'];
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $delete = "DELETE * FROM products WHERE id = $id";
    $con->query($delete);
    header("Location: admin.php?page=products/products.php");
