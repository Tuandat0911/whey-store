<link rel="stylesheet" href="../css/bootstrap.min.css">

<div class="container mt-3">
    <form action="" method="post">
        <label for="name">Category Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <br>
        <button class="btn btn-outline-info float-end" type="submit">Nhập dữ liệu</button>
    </form>
</div>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        require_once('config.php');
        $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
        $insert = "INSERT INTO categories (category_name) VALUES ('$name')";
        $con->query($insert);
        header("Location: admin.php");
    }
?>
