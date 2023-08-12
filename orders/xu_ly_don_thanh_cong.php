<?php
    $id = $_GET['id'];
require_once('../config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $sql = "";
    $sql .= " SELECT products.id, order_details.sl, products.quantity ";
    $sql .= " FROM order_details JOIN products ";
    $sql .= " ON order_details.product_id = products.id ";
    $sql .= " JOIN orders ";
    $sql .= " ON order_details.order_id = orders.id ";
    $sql .= " WHERE order_id = $id ";
    $result = $con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()) {
            $quantity = $row['quantity'] - $row['sl'];
            $update = "UPDATE products SET quantity = $quantity WHERE id = ".$row['id'];
            $con->query($update);
        }
    }
header("Location: ../admin.php?page=orders/orders.php");
?>







