<?php
    session_start();
    $id = "";
    if(isset ($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
?>
<?php
if($id != ""){
    $ids = $_GET['ids'];
    $name = $_GET['fullName'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    $quantity = $_GET['quantity'];

    date_default_timezone_set("Asia/Bangkok");
    $date_buy = date("y-m-d H:i:s");


    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    //insert bảng orders
    $sql = "";
    $sql .= " INSERT INTO orders (customer_name, phone, address, date_buy, status, account_id) ";
    $sql .= " VALUES ";
    $sql .= " ('$name', '$phone', '$address', '$date_buy', 'PENDING', '$id') ";
    $con->query($sql);

    // lấy order_id
    $inserted = $con->insert_id;

    // tách chuỗi thành mảng xóa bỏ dấu
    $arrID = explode(",", $ids);
    $arrQuantity = explode(",", $quantity);

    // insert bảng order_detail
    $insert = "";
    $insert .= " INSERT INTO order_details (order_id, product_id, sl, price, total) VALUES ";
    for($i = 0; $i < count($arrID); ++$i){
        $obj = "";
        $price = "SELECT price FROM products WHERE id = $arrID[$i]";
        $result = $con->query($price);
        if($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $obj = $row['price'];
            }
        }
        $total = $arrQuantity[$i] * $obj;
        if($i != count($arrID) - 1) {
            $insert .= " ('$inserted', '$arrID[$i]', '$arrQuantity[$i]', '$obj', '$total'), ";
        }else {
            $insert .= " ('$inserted', '$arrID[$i]', '$arrQuantity[$i]', '$obj', '$total') ";
        }
    }

    $con->query($insert);
    header("Location: ../cart/cart_reset.php");
}


