<h3 style="text-align: center; line-height: 2.5">SẢN PHẨM SẮP HẾT HÀNG</h3>
<?php
require_once('config.php');
$con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
$sql = "SELECT * FROM products WHERE quantity BETWEEN 0 AND 50;";
$result = $con->query($sql);
?>

<div class="container mt-3">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Hình Ảnh</th>
            <th>Tên Sản Phẩm</th>
            <th>Tồn Kho</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                echo"<tr>";
                echo"<td>";
                echo"<img src='products/products_image/".$row['image']."' style='width:100px'> ";
                echo"</td>";
                echo"<td>".$row['product_name']."</td>";
                echo"<td>".$row['quantity']."</td>";
                echo"</tr>";
            }
        }

        ?>
        </tbody>
    </table>
</div>






