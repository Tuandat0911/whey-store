<?php
    $id = $_GET['id'];
    require_once('config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $obj = null;
    $sql = "SELECT * FROM categories WHERE id = $id";
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
        <label for="name">Category Name</label>
        <input type="text" id="name" name="name" class="form-control" required value="<?php echo $obj['category_name'] ?>">
        <br>
        <button class="btn btn-outline-info float-end" type="submit">Save</button>
    </form>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $update = "UPDATE categories SET category_name = '$name' WHERE id = $id";
    $con->query($update);
    header("Location: admin.php");
}
?>

