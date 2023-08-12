<?php
ob_start();
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<div class="container mt-3">
    <form action="" method="post">
        <label for="user">User Name</label>
        <input type="text" id="user" name="username" class="form-control" required>
        <br>
        <label for="full">Full Name</label>
        <input type="text" id="full" name="fullname" class="form-control" required>
        <br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" required>
        <br>
        <label for="pass">Password</label>
        <input type="text" id="pass" name="password" class="form-control" required>
        <br>
        <button class="btn btn-outline-dark float-end" type="submit">Nhập dữ liệu</button>
    </form>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once('config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $insert = "INSERT INTO admin (email, password, username, fullname) VALUES ('$email', '$password', '$username', '$fullname')";
    $con->query($insert);
    header("Location: admin.php?page=admin/admin_table.php");
    exit();
    ob_end_clean();
}
?>
