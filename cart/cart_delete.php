<?php
    session_start();
?>
<?php
    $id = $_GET['id'];
    $_SESSION['cart'][$id] = [];
    header("Location: list_cart.php");
?>
