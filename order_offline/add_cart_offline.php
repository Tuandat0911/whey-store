<?php
    session_start();
?>

<?php
    $id = $_GET['id'];
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $con->query($sql);
    $obj = null;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()) {
            $obj = $row;
        }
    }

    $cart['id'] = $obj['id'];
    $cart['image'] = $obj['image'];
    $cart['product_name'] = $obj['product_name'];
    $cart['price'] = $obj['price'];
    $_SESSION['carts'][$id] = $cart;
    header('Location: ../admin.php?page=order_offline/cart_offline.php');
?>
