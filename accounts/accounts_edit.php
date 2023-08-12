<?php
ob_start();
$id = $_GET['id'];
require_once('config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
$obj = null;
$sql = "SELECT * FROM accounts WHERE id = $id";
$result = $con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $obj = $row;
    }
}
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">

<div class="container mt-3">
    <form action="" method="post">
        <label for="name">User Name</label>
        <input type="text" id="name" name="name" class="form-control" required value="<?php echo $obj['username'] ?>">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" required value="<?php echo $obj['email'] ?>">

        <label for="pass">Password</label>
        <input type="text" id="pass" name="password" class="form-control" required value="<?php echo $obj['password'] ?>">
        <br>
        <button class="btn btn-outline-info float-end" type="submit">Save</button>
    </form>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $update = "UPDATE accounts SET username = '$name', email = '$email', password = '$password' WHERE id = $id";
    $con->query($update);
    header("Location: admin.php?page=accounts/accounts.php");
    ob_end_flush();
}
?>

