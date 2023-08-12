<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="login_admin.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="" method="post">
                <h2 style="color: white">Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail"></ion-icon>
                    <input type="email" required id="email" name="email">
                    <label for="email">Email</label>
                </div>

                <div class="inputbox">
                    <ion-icon name="lock"></ion-icon>
                    <input type="password" required id="pass" name="password">
                    <label for="pass">Password</label>
                </div>

                <button type="submit">Log in</button>

            </form>
        </div>
    </div>
</section>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] === 'POST'){
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = " SELECT * FROM admin WHERE email = '$email' AND password = '$password' ";
    $result = $con ->query($sql);
    $obj = null;
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $obj = $row;
        }
    }

    if($obj == null){
        header("Location: login_admin.php");
    }
    else {
        $_SESSION['admin'] = $obj['username'];
        $_SESSION['admin_id'] = $obj['id'];
        header("Location: ../admin.php");
    }
}

?>