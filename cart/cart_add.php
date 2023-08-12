<?php
    session_start();
?>

<?php
require_once('../config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $id = $_GET['id'];
    $quantity = $_POST['quantity'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $con->query($sql);
    $obj = null;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $obj = $row;
        }
    }

    $cart['id'] = $obj['id'];
    $cart['productName'] = $obj['product_name'];
    $cart['price'] = $obj['price'];
    $cart['image'] = $obj['image'];
    $cart['quantity'] = $quantity;

    $_SESSION['cart'][$id] = $cart;

    header("Location: list_cart.php");
?>

