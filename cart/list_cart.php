<?php
    session_start();
?>
<?php
   $cart = "";
   if(isset ($_SESSION['cart'])){
       $cart = $_SESSION['cart'];
   }
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
<!--phần giỏ hàng-->
<?php
    if($username != ""){
        if($cart != "") {
?>
    <div class="container mt-5">
        <div class="cart">
            <h2>Giỏ hàng</h2>
            <table class="table item-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>

                <tbody>

                <?php
                foreach($cart as $carts){
                    if($carts != null){
                        echo"<tr class='item'>";
                            echo"<td><input type='number' name='id' value='".$carts['id']."' readonly class='border-0' style='max-width: 45px'></td>";
                            echo"<td>";
                                echo"<img src='../products/products_image/".$carts['image']."' style='width: 90px'>";
                            echo"</td>";
                            echo"<td>".$carts['productName']."</td>";
                            echo"<td>".number_format($carts['price'], 0, '.','.')."<sup>đ</sup></td>";
                            echo"<td><input type='number' name='quantity' value='".$carts['quantity']."' class='form-control quantity' value='1' min='1' style='max-width: 100px'></td>";
                            echo"<td class='price'></td>";
                            echo"<td><a href='cart_delete.php?id=".$carts['id']."'><i class='fa-solid fa-trash' style='color: #000000;'></i></a></td>";
                        echo"</tr>";
                    }
                }

                ?>
                </tbody>
            </table>

            <script>
                $(document).ready(function() {
                    // Khi số lượng thay đổi, cập nhật tổng giá trị
                    $('.quantity').change(function() {
                        var total = 0;
                        $('.item').each(function() {
                            var price = parseFloat($(this).find('td:nth-child(4)').text().replace(/\./g, '').replace(',', '.'));
                            var quantity = parseInt($(this).find('.quantity').val());
                            var itemTotal = price * quantity;
                            $(this).find('.price').text(formatCurrency(itemTotal));
                            total += itemTotal;
                        });
                        $('#total-price').text(formatCurrency(total));
                    });

                    // Hàm định dạng số tiền thành định dạng tiền tệ
                    function formatCurrency(number) {
                        var formatter = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });
                        return formatter.format(number).replace(/\u00A0/g, '').replace(',', '.');
                    }

                    // Cập nhật tổng số tiền ban đầu
                    $('.quantity').change();
                });
            </script>
            <button class="btn btn-outline-* float-end" type="button">Tổng tiền: <b id="total-price">0</b></button>
            <br>
            <h3 style="text-align: center">Thông tin đơn hàng</h3>
            <form action="../orders/order_save.php">

                <input type="hidden" class="input form-control" required name="ids" id="ids"><br>

                <label for="name">Tên người nhận:</label>
                <input type="text" class="input form-control" required name="fullName" id="name"><br>

                <label for="phone">Số điện thoại:</label>
                <input type="text" class="input form-control" required name="phone" id="phone"><br>

                <label for="address">Địa chỉ:</label>
                <input type="text" class="input form-control" required name="address" id="address"><br>



                <input type="hidden" class="input form-control" required name="quantity" id="quantity"><br>

                <div>
                    <button type="submit" class="btn btn-outline-dark float-end" id="order">Đặt mua</button>
                </div>
            </form>
            <br>

        </div>
    </div>
    <script>
        $(function () {
            $("#order").click(function () {
                var ids = new Array();
                $("input[name=id]").each(function() {
                    ids.push($(this).val());
                });
                $("#ids").val(ids);

                var price = new Array();
                $("input[name=price]").each(function() {
                    price.push($(this).val());
                });
                $("#price").val(price);

                var quantity = new Array();
                $("input[name=quantity]").each(function() {
                    quantity.push($(this).val());
                });
                $("#quantity").val(quantity);
            });
        });
    </script>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-white" style="margin-top: 500px">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Kết nối với chúng tôi:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 link-secondary">
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
                                <img src="../assets/logos.png" alt="" style="width: 260px">
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
                            Products
                        </h6>
                        <p>
                            <a href="#" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> Thanh Trì, Hà Nội, Việt Nam</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            datbanwhey@gmail.com
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
            © 2021 Copyright by
            <span class="text-reset fw-bold">wheystore.com</span>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>
<?php
        }else{
            echo"<div class='container mt-3'>";
            echo'<div class="alert alert-danger">';
            echo'<strong>Warning! </strong><p>Bạn chưa có bất kỳ sản phẩm nào trong giỏ hàng</p>';
            echo'</div>';
            echo"</div>";
        }
    }else {
        echo"<div class='container mt-3'>";
        echo'<div class="alert alert-danger">';
        echo'<strong>Warning! </strong>Bạn cần <a href="../login.php">đăng nhập</a> để cập nhật giỏ hàng';
        echo'</div>';
        echo"</div>";
    }
?>