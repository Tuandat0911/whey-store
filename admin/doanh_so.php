
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Tổng Doanh Thu</title>
    <!-- Link thư viện Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Xem Tổng Doanh Thu</h5>
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
                        <button type="submit" class="btn btn-dark btn-block">Xem Tổng Doanh Thu</button>
                    </form>
                </div>
                <?php
                require_once('config.php');
                $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $start = $_POST['startDate'];
                    $end = $_POST['endDate'];
                    $sql = "";
                    $sql .= " SELECT SUM(order_details.total) AS tong ";
                    $sql .= " FROM orders JOIN order_details ";
                    $sql .= " ON orders.id = order_details.order_id ";
                    $sql .= " WHERE orders.status = 'RECEIVED' ";
                    $sql .= " AND DATE(orders.date_buy) BETWEEN '$start' AND '$end'; ";

                    $result = $con->query($sql);
                    $obj = null;
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $obj = $row;
                        }
                    }
                    echo'<div class="card-footer">';
                    echo '<button class="btn btn-outline-* float-end" type="button">Tổng doanh thu: <b>' . number_format($obj['tong'], 0, ".", ".") . '<sup>đ</sup></b></button>';
                    echo'</div>';
                }
                ?>

            </div>
        </div>
    </div>
</div>

<!-- Link thư viện Bootstrap JS và Popper.js (cần thiết cho các thành phần tương tác) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
