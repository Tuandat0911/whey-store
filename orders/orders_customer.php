<?php
session_start();
?>
<?php
$username = "";
if(isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
}
$id = "";
if(isset ($_SESSION['id'])){
    $id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Whey Store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/logos.png"/>
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="../home.php">
            <img src="../assets/logos.png" alt="" style="width: 136px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="../home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" style="margin-right: 10px" type="button">
                    <i class="fa fa-cart-shopping" style="color: #000000;"></i>
                    Cart
                </button>
                <?php
                if($username == ""){
                    ?>
                    <a href="../login.php">
                        <button class="btn btn-outline-dark" type="button">
                            <i class="fa fa-right-to-bracket" style="color: #000000;"></i>
                            Sign in
                        </button>
                    </a>
                    <?php
                } else {
                    echo '
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . $username . '
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fa fa-right-from-bracket" style="color: #000000;"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>';
                }
                ?>
            </form>
        </div>
    </div>
</nav>
<h3 style="text-align: center; line-height: 2.5">THEO DÕI ĐƠN HÀNG</h3>
<?php
    if($username != ""){


?>
<div class="container mt-5">
        <table class="table item-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
            </thead>

            <tbody>

            <?php
            require_once('../config.php');
            $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);

                $sql = "";
                $sql .= " SELECT orders.id, products.image, products.product_name, order_details.total, orders.status ";
                $sql .= " FROM orders JOIN accounts ";
                $sql .= " ON orders.account_id = accounts.id ";
                $sql .= " JOIN order_details ";
                $sql .= " ON orders.id = order_details.order_id ";
                $sql .= " JOIN products ";
                $sql .= " ON order_details.product_id = products.id ";
                $sql .= " WHERE accounts.id = $id ";

                $result = $con->query($sql);
                if($result->num_rows>0){
                    while($row= $result->fetch_assoc()){
                        echo"<tr>";
                            echo"<td>".$row['id']."</td>";
                            echo"<td>";
                                echo"<img src='../products/products_image/".$row['image']."' style='width: 100px'>";
                            echo"</td>";
                            echo"<td>".$row['product_name']."</td>";
                        echo"<td>".number_format($row['total'], 0, ".", ".")."<sup>đ</sup></td>";
                            if($row['status'] == 'PENDING'){
                                echo"<td style='color: #20c997'>".$row['status']."</td>";
                                echo"<td><a href='xu_ly_huy_don.php?id=".$row['id']."' class='btn btn-outline-danger'>Hủy đơn hàng</a></td>";
                            }else {
                                echo"<td style='color: #20c997'>".$row['status']."</td>";
                            }

                        echo"</tr>";
                    }
                }
            ?>
            </tbody>
        </table>
<?php
    }else{
        echo"<div class='container mt-3'>";
            echo'<div class="alert alert-danger">';
                echo'<strong>Warning! </strong>Bạn cần <a href="../login.php">đăng nhập</a> để xem thông tin đơn hàng';
            echo'</div>';
        echo"</div>";
    }
?>