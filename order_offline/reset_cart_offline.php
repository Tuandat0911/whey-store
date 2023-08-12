<?php
    session_start();
?>
<?php
    $_SESSION['carts'] = [];
    header('Location: ../admin.php?page=order_offline/cart_offline.php');
?>
