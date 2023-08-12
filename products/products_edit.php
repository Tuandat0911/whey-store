<?php
    $id = $_GET['id'];
    require_once('config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $sql = "SELECT * FROM products WHERE id = $id";
    $obj = null;
    $result=$con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $obj=$row;
        }
    }
?>

<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.min.css">

<div class="container mt-3">
    <h2>Sửa sản phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm</label>
        <input type="text" id="name" name="name" class="form form-control" required value="<?php echo $obj['product_name'] ?>">

        <label for="producers">Nhà sản xuất</label>
        <input type="text" id="producers" name="producers" class="form form-control" required value="<?php echo $obj['producers'] ?>">

        <label for="price">Giá tiền</label>
        <input type="text" id="price" name="price" class="form form-control" required value="<?php echo $obj['price'] ?>">

        <label for="quantity">Số lượng</label>
        <input type="text" id="quantity" name="quantity" class="form form-control" required value="<?php echo $obj['quantity'] ?>">

        <label for="description">Mô tả</label>
        <input type="text" id="description" name="description" class="form form-control" required value="<?php echo $obj['description'] ?>">
        <br>
        <label for="image">Ảnh sản phẩm</label><br>
        <input type="file" name="image" id="image">
        <br><br>

        <label for="category_id">Category ID</label>
        <select name="category_id" id="category_id" class="form form-select">
            <?php
            $con = new mysqli("localhost", "root", "", "project_1_wheystore");
            $category = "SELECT * FROM categories";
            $result = $con->query($category);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo"<option value='".$row['id']."'>".$row['category_name']."</option>";
                }
            }
            ?>
        </select>
        <br>
        <button class="btn btn-outline-dark float-end" type="submit">Save</button>
    </form>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $file = $_FILES['image'];
    date_default_timezone_set("Asia/Bangkok");
    if($file["size"] > 1 * 1000000){
        echo "Max size image is 1M";
    }
    else if($file["type"] != "image/jpeg" && $file["type"] != "image/png"){
        echo"image is required jpeg type";
    }

    else {
        $fileName = $file["name"];
        $fileNameInfo = pathinfo($fileName);
        $fileNameEnd = $fileNameInfo["filename"] . "_" . date("Y_m_d_H_i_s") . "." . $fileNameInfo["extension"];
        $fileUpload = "products_image/" . $fileNameEnd;

        if (move_uploaded_file($file['tmp_name'], $fileUpload)) {
            echo "Uploaded Successfully<br>";
        } else {
            echo "Upload Failed<br>";
        }
    }

    $name = $_POST['name'];
    $producers = $_POST['producers'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];



    $update = "";
    $update .= " UPDATE products SET ";
    $update .= " product_name='$name', producers='$producers', price='$price', quantity='$quantity', description='$description', image='$fileNameEnd', category_id='$category_id' WHERE id = $id";
    $con->query($update);
    header("Location: admin.php?page=products/products.php");
}
?>

