<?php
    session_start();
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
    <link rel="icon" type="image/x-icon" href="assets/logos.png"/>
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        #saleoff {
            width: 100%;
            display: flex;
            height: 322px;
        }
        #saleoff .box-left ,#saleoff .box-right {
            width: 50%;
        }
        #saleoff .box-left {
            background:#3e413e;
            text-align: center;
            min-height: 322px;
        }

        #saleoff .box-left h1 {
            padding-top:38px;
        }
        #saleoff .box-left span:nth-child(1)
        {
            color:#fff;
            font-size:50px;
        }

        #saleoff .box-left span:nth-child(2)
        {
            color:orange;
            font-size:128px;
        }

        #saleoff .box-right {
            background-image:url("assets/2-7.jpg");
        }

        .card {
            border-radius: .7rem;
        }

        body{
            background-color: #f3f2f2

    </style>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#">
            <img src="assets/logos.png" alt="" style="width: 136px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
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
                <div class="btn-group">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 10px">
                        <i class="fa fa-cart-shopping" style="color: #000000;"></i>
                        Cart
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cart/list_cart.php"><i class="fa fa-cart-shopping" style="color: #000000;"></i>  Cart</a></li>
                        <li><a class="dropdown-item" href="orders/orders_customer.php"><i class="fa-brands fa-jedi-order fa-xl" style="color: #000000;"></i>  Orders</a></li>
                    </ul>
                </div>

                <?php
                if($username == ""){
                ?>
                <a href="login.php">
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
<!-- Header-->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/banner1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="assets/Banner2.jpg" alt="Chicago" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="assets/Banner3.jpg" alt="New York" class="d-block" style="width:100%">
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<h2 style=" text-align: center;
                    margin-bottom: -35px;
                    margin-top: 50px;
                    font-size:32px;
                    color:#626a67;"
>SẢN PHẨM CỦA CHÚNG TÔI</h2>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4   justify-content-center">
            <?php
            require_once('config.php');
            $con = new mysqli (ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
            $sql = "SELECT * FROM products";
            $result = $con->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <?php
                            //                                <!-- Product image-->
                            echo'<img class="card-img-top" src="products/products_image/'.$row['image'].'" alt="..." />';
                            ?>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <?php
                                    echo'<h5 class="fw-bolder">'.$row['product_name'].'</h5>'
                                    ?>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div><i class="fa fa-star" style="color: #ffde38;"></i></div>
                                        <div><i class="fa fa-star" style="color: #ffde38;"></i></div>
                                        <div><i class="fa fa-star" style="color: #ffde38;"></i></div>
                                        <div><i class="fa fa-star" style="color: #ffde38;"></i></div>
                                        <div><i class="fa fa-star" style="color: #ffde38;"></i></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php
                                    echo'<span class="text-muted text-decoration-line-through">10.000.000<sup>đ</sup></span>'.number_format($row["price"], 0, ".", ".").'<sup>đ</sup>';
                                    ?>
                                </div>
                            </div>
                            <?php
                                if($row['quantity'] > 0) {
                            ?>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <?php
                                            echo'<a class="btn btn-outline-dark mt-auto" href="products/product_detail.php?id='.$row['id'].'">Add To Cart</a>';
                                            ?>
                                        </div>
                                    </div>
                            <?php
                                } else {
                            ?>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <?php
                                            echo'<a class="btn btn-danger disabled" href="#">Hết Hàng</a>';
                                            ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<div id="saleoff">
    <div class="box-left">
        <h1>
            <span>GIẢM GIÁ LÊN ĐẾN</span>
            <span>90%</span>
        </h1>
    </div>
    <div class="box-right"></div>
</div>


<section style="color: #000; background-color: #f3f2f2" class="py-5">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-8 text-center">
                <h3 class="fw-bold mb-4">Khách hàng nói gì về chúng tôi</h3>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="assets/jeffseid.png"
                                 class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold">Jeff Seid</h5>
                        <h6 class="font-weight-bold my-3">Lực sĩ thể hình</h6>
                        <ul class="list-unstyled d-flex justify-content-center">
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star-half-alt fa-sm text-info"></i>
                            </li>
                        </ul>
                        <p class="mb-2">
                            <i class="fas fa-quote-left pe-2"></i>Whey này thật tuyệt vời! Tôi đã sử dụng nó trong một thời gian ngắn và thấy sự tiến bộ rõ rệt về cơ bắp và sức mạnh. Hương vị thật ngon và dễ uống. Tôi hoàn toàn tin tưởng và giới thiệu sản phẩm này!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="assets/andrei.png"
                                 class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold">Andrei Deiu</h5>
                        <h6 class="font-weight-bold my-3">Giáo viên lập trình</h6>
                        <ul class="list-unstyled d-flex justify-content-center">
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                        </ul>
                        <p class="mb-2">
                            <i class="fas fa-quote-left pe-2"></i>Tôi đã dùng nhiều loại whey, nhưng không có gì so sánh được với sản phẩm này. Whey tuyệt vời, dễ hòa tan và cung cấp dinh dưỡng tối ưu cho cơ bắp. Sự phục hồi sau tập luyện nhanh hơn và tôi cảm thấy năng lượng tăng lên.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-0">
                <div class="card">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="assets/cris.png"
                                 class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold">Chris Bumstead</h5>
                        <h6 class="font-weight-bold my-3">Giáo viên thể dục</h6>
                        <ul class="list-unstyled d-flex justify-content-center">
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="fas fa-star fa-sm text-info"></i>
                            </li>
                            <li>
                                <i class="far fa-star fa-sm text-info"></i>
                            </li>
                        </ul>
                        <p class="mb-2">
                            <i class="fas fa-quote-left pe-2"></i>Sản phẩm whey này thực sự ấn tượng! Tôi đã dùng nó trong thời gian dài và thấy sự phát triển đáng kinh ngạc của cơ bắp. Hương vị tuyệt hảo và không gây đầy bụng. Tôi đã giới thiệu cho bạn bè và tất cả đều thích nó. Hãy trải nghiệm và bạn sẽ không thất vọng!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-white">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Kết nối với chúng tôi:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="https://www.facebook.com/dhbkhanoi/?fref=ts" class="me-4 link-secondary">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/DHBKHN_HUST" class="me-4 link-secondary">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://hust.edu.vn/" class="me-4 link-secondary">
                <i class="fab fa-google"></i>
            </a>
            <a href="https://www.instagram.com/hust_dhbkhanoi/" class="me-4 link-secondary">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="http://bulletin.hust.edu.vn/" class="me-4 link-secondary">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/" class="me-4 link-secondary">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <div class="logo">
                            <img src="assets/logo2.png" alt="" style="width: 260px">
                        </div>
                    </h6>
                    <p>
                        Whey Store luôn cung cấp những sản phẩm chất lượng nhất giành cho quý khách
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Sản Phẩm
                    </h6>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Tăng Cân</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Giảm Mỡ</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Whey</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Thực Phẩm Bổ Sung</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Tiện Ích
                    </h6>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="https://hust.edu.vn/" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Liên Hệ</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i> Thanh Trì, Hà Nội, Việt Nam</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-secondary"></i>
                        Datsumo0911@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3 text-secondary"></i> + 84 234 567 88</p>
                    <p><i class="fas fa-print me-3 text-secondary"></i> + 84 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright by
        <span class="text-reset fw-bold">wheystore.com</span>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

</body>
</html>


