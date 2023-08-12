<?php
    session_start();
?>
<?php
    $_SESSION['username'] = "";
    $_SESSION['admin'] = "";
    header("Location: home.php");
?>
