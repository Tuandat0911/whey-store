
<h2 style="text-align: center">Bảng orders</h2>
<div class="container">
    <table class="table table-bordered table-striped-">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Ngày Mua</th>
                <th>Mã Người Bán</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        <?php
        require_once('config.php');
        $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
            $sql = "SELECT * FROM orders";
            $result = $con->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo"<tr>";
                        echo"<td>".$row['id']."</td>";
                        echo"<td>".$row['customer_name']."</td>";
                        echo"<td>".$row['phone']."</td>";
                        echo"<td>".$row['address']."</td>";
                        echo"<td>".$row['date_buy']."</td>";
                        echo"<td>".$row['admin_id']."</td>";
                        echo"<td>".$row['status']."</td>";
                        if($row['status'] == 'PENDING'){
                            echo'<td><a href="orders/update_status_accepted.php?id='.$row["id"].'"><i class="fa fa-forward fa-xl" style="color: #000000;"></i></a></td>';
                            echo'<td><a href="orders/update_status_cancel.php?id='.$row["id"].'"><i class="fa fa-xmark fa-xl" style="color: #ff0000;"></i></a></td>';
                        }
                        if($row['status'] == 'ACCEPTED') {
                            echo '<td><a href="orders/update_status_shipping.php?id=' . $row["id"] . '"><i class="fa fa-forward fa-xl" style="color: #000000;"></i></a></td>';
                        }
                        if($row['status'] == 'SHIPPING') {
                            echo '<td><a href="orders/update_status_received.php?id=' . $row["id"] . '"><i class="fa fa-forward fa-xl" style="color: #000000;"></i></a></td>';
                        }
                    echo"</tr>";
                }
            }
        ?>
        </tbody>
    </table>
</div>