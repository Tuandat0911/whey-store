<?php
$ids = $_GET['ids'];
$fullName = $_GET['fullName'];
$address = $_GET['address'];
$quantity = $_GET['quantity'];
$phone = $_GET['phone'];
session_start();
$admin_id = "";
if(isset ($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}

date_default_timezone_set("Asia/Bangkok");
$date_buy = date("y-m-d H:i:s");

require_once('../config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);

if($admin_id != "") {
    //insert bảng orders
    $sql = "";
    $sql .= " INSERT INTO orders (customer_name, phone, address, date_buy, status, admin_id) ";
    $sql .= " VALUES ";
    $sql .= " ('$fullName', '$phone', '$address', '$date_buy', 'RECEIVED', $admin_id) ";
    $con->query($sql);


// lấy order_id
    $inserted = $con->insert_id;


// tách chuỗi thành mảng xóa bỏ dấu
    $arrID = explode(",", $ids);
    $arrQuantity = explode(",", $quantity);

// insert bảng order_detail
    $insert = "";
    $insert .= " INSERT INTO order_details (order_id, product_id, sl, price, total) VALUES ";
    for($j = 0; $j < count($arrID); ++$j) {
        $obj = "";
        $obj = "SELECT price FROM products WHERE id = $arrID[$j]";
        $price = $con->query($obj);
        $gia = 0;
        if($price->num_rows>0){
            while($row=$price->fetch_assoc()) {
                $gia = $row['price'];
            }
        }
        $total = 0;
        $total = $arrQuantity[$j] * $gia;
        if($j != count($arrID) - 1) {
            $insert .= " ('$inserted', '$arrID[$j]', '$arrQuantity[$j]', '$gia', '$total'), ";
        }else {
            $insert .= " ('$inserted', '$arrID[$j]', '$arrQuantity[$j]', '$gia', '$total') ";
        }
    }

    $con->query($insert);
    header("Location: reset_cart_offline.php");
}


