<?php
    $id = $_GET['id'];
    require_once('config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $obj = null;
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $obj = $row;
        }
    }
    if($obj == null){
        $delete = "DELETE FROM categories WHERE id = $id";
        $con->query($delete);
        header("Location: admin.php");
    }
    else{
        echo"<h2>Không xóa được vì category đã liên kết với ".$obj['product_name']."</h2>";
    }