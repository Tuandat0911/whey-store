
<h2 style="text-align: center">Bảng orders</h2>
<div class="container">
    <table class="table table-bordered table-striped-">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng Cộng</th>
        </tr>
        </thead>

        <tbody>
        <?php
        require_once('config.php');
        $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
        $sql = "";
        $sql .= " SELECT order_details.order_id, products.product_name, products.image, order_details.sl, order_details.price, order_details.total ";
        $sql .= " FROM order_details JOIN products  ";
        $sql .= " ON order_details.product_id = products.id  ";

        $result = $con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo"<tr>";
                echo"<td>".$row['order_id']."</td>";
                echo"<td>".$row['product_name']."</td>";
                echo"<td>";
                    echo"<img src='products/products_image/".$row['image']."' style = 'width: 100px'>";
                echo"</td>";
                echo"<td>".$row['sl']."</td>";
                echo"<td>".number_format($row['price'], 0, ".", ".")."<sup>đ</sup></td>";
                echo"<td>".number_format($row['total'], 0, ".", ".")."<sup>đ</sup></td>";

                echo"</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>