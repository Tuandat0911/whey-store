<?php
    session_start();
?>

<?php
    $_SESSION['cart'] = [];
    header("Location: ../orders/orders_customer.php");
?>
