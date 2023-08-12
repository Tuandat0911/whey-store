<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>


<div class="container">
    <h2>Bảng products</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-success">
        <tr>
            <td>ID</td>
            <td>Tên sản phẩm</td>
            <td>Nhà sản xuất</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Mô tả</td>
            <td>image</td>
            <td>Loại</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>

        <tbody>
        <?php
        require_once('config.php');
        $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
        $sql = "";
        $sql .= " SELECT products.*, categories.category_name ";
        $sql .= " FROM products JOIN categories ";
        $sql .= " ON categories.id = products.category_id ";
        $sql .= " ORDER BY products.id ASC ";
        $result = $con -> query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['product_name']."</td>";
                echo"<td>".$row['producers']."</td>";
                echo"<td>".number_format($row["price"], 0, ".", ".")."<sup>đ</sup></td>";
                echo"<td>".$row['quantity']."</td>";
                echo"<td>".$row['description']."</td>";
                echo"<td>";
                echo"<img src='products/products_image/".$row['image']."' style='width:100px'> ";
                echo"</td>";
                echo"<td>".$row['category_name']."</td>";
                echo"<td><a href='products/products_delete.php?id=".$row['id']."'><i class='fa fa-trash '></a></td>";
                echo"<td><a href='admin.php?page=products/products_edit.php&id=".$row['id']."'><i class='fa fa-pen-to-square'></i></a></td>";
                if($row['quantity'] != 0){
                    echo"<td><a href='order_offline/add_cart_offline.php?id=".$row['id']."'><i class='fa fa-cart-shopping'></i></a></td>";
                } else {
                    echo"<td><button class='btn btn-danger disabled'>Hết hàng</button></td>";
                }

                echo"</tr>";

            }
        }
        ?>
        </tbody>
    </table>
    <a href="admin.php?page=products/products_add.php">
        <button class="btn btn-outline-dark">Thêm dữ liệu</button>
    </a>
</div>