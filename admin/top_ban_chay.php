<h3 style="text-align: center; line-height: 2.5">TOP SẢN PHẨM BÁN CHẠY</h3>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Thời gian bắt đầu từ</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="startDate">Ngày bắt đầu:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="form-group">
                            <label for="endDate">Ngày kết thúc:</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark btn-block">Xem sản phẩm bán chạy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = "";
    $endDate = "";

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    require_once('config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $sql = "";
    $sql .= " SELECT products.image, products.product_name, COUNT(order_details.product_id) AS luot_mua ";
    $sql .= " FROM order_details JOIN products ";
    $sql .= " ON order_details.product_id = products.id ";
    $sql .= " JOIN orders ";
    $sql .= " ON order_details.order_id = orders.id ";
    $sql .= " WHERE orders.status = 'RECEIVED' AND DATE(orders.date_buy) BETWEEN '$startDate' AND '$endDate' ";
    $sql .= " GROUP BY order_details.product_id ";
    $sql .= " ORDER BY luot_mua DESC ";
    $result = $con->query($sql);
    ?>

    <div class="container mt-3">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Lượt Mua</th>
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
                    echo"<td>".$row['luot_mua']."</td>";
                    echo"</tr>";
                }
            }

            ?>
            </tbody>
        </table>
    </div>
<?php
}
?>







