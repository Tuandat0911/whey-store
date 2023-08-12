<?php
    require_once('../config.php');
    $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    $id = $_GET['id'];
    $sql = "";
    $sql .= " SELECT products.*, categories.category_name ";
    $sql .= " FROM products JOIN categories ";
    $sql .= " ON categories.id = products.category_id ";
    $sql .= " WHERE products.id = $id ";
    $result = $con->query($sql);
    $obj = null;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $obj = $row;
        }
    }
    session_start();
?>
<?php
$username = "";
if(isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
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
    <link rel="stylesheet" href="Product_detail.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div style="margin-bottom: 40px">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../home.php">
                <img src="../assets/logos.png" alt="" style="width: 136px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
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
</div>

<div class="container-fluid">
    <div class = "card-wrapper">
        <div class = "card">
            <!-- card left -->
            <div class = "product-imgs">
                <div class = "img-display">
                    <div class = "img-showcase">
                        <?php
                        echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                        echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                        echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                        echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                        ?>
                    </div>
                </div>
                <div class = "img-select">
                    <div class = "img-item">
                        <a href = "#" data-id = "1">
                            <?php
                            echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                            ?>
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "2">
                            <?php
                            echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                            ?>
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "3">
                            <?php
                            echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                            ?>
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "4">
                            <?php
                            echo'<img src = "../products/products_image/'.$obj['image'].'" alt = "shoe image">';
                            ?>
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class = "product-content">
                <?php
                echo'<h3 class = "product-title">'.$obj["product_name"].'</h3>';
                ?>
                <a href = "#" class = "product-link">Về trang chủ</a>
                <div class = "product-rating">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star-half-alt"></i>
                    <span>4.8(900)</span>
                </div>

                <div class = "product-price">
                    <p class = "last-price">Giá cũ: <span>10.000.000<sup>đ</sup></span></p>
                    <p class = "new-price">Khuyễn mãi lớn: <?php echo'<span>'.number_format($obj["price"], 0, ".", ".").'<sup>đ</sup></span>' ?></p>
                </div>

                <div class = "product-detail">
                    <h2>Mô tả sản phẩm</h2>
                    <?php
                    echo"<p>".$obj['description']."</p>";
                    ?>
                    <ul>
                        <li>Khối lượng tịnh : <?php echo'<span>'.$obj['weight'].'</span>' ?></li>
                        <li>Tồn kho: <?php echo'<span>'.$obj['quantity'].'</span>' ?></li>
                        <li>Loaị: <?php echo'<span>'.$obj['category_name'].'</span>' ?></li>
                        <li>Nhà sản xuất: <?php echo'<span>'.$obj['producers'].'</span>' ?></li>
                        <li>Phí ship: <span>Free</span></li>
                    </ul>
                </div>
                <?php
                if($username == ""){
                    echo'<div class = "purchase-info">';
                        echo"<p style='color: red'>Bạn cần đăng nhập để có thể mua sắm</p>";
                        echo"<a href='../login.php'><button class='btn'>Đăng nhập ngay</button></a>";
                    echo'</div>';
                }
                else{
                    echo'<div class = "purchase-info">';
                        echo '<form action="../cart/cart_add.php?id='.$obj['id'].'" method="post">' ;
                        echo'<input type = "number" min = "1" value = "1" name="quantity">';
                        echo'<button type = "submit" class = "btn" style="margin-bottom: 5px">';
                            echo'Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>';
                        echo'</button>';
                        echo'</form>';
                    echo'</div>';
                }
                ?>


                <div class = "social-links">
                    <p>Share At: </p>
                    <a href = "#">
                        <i class = "fab fa-facebook-f"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-twitter"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-instagram"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-whatsapp"></i>
                    </a>
                    <a href = "#">
                        <i class = "fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="product_detail.js"></script>
</body>
</html>