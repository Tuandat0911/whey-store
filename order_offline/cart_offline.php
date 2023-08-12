<?php
if(isset ($_SESSION['carts'])) {
    $cart = $_SESSION['carts'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }

        .cart {
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
        }

        .item-table th, .item-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .item-table th {
            text-align: left;
        }

        .item-table td input {
            margin: 0;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="cart">
            <h2>Giỏ hàng</h2>
            <table class="item-table table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình Ảnh</th>
                    <th>Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Số Tiền</th>
                    <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($cart as $k => $v){
                    if($v != null){
                        echo "<tr class='item'>";
                        echo"<td><input type='number' name='id' value='".$v['id']."' readonly class='border-0' style='max-width: 45px'></td>";
                        echo "<td>";
                        echo "<img src='products/products_image/".$v['image']."' style='width: 90px'>";
                        echo "</td>";
                        echo "<td>".$v['product_name']."</td>";
                        echo "<td>".number_format($v["price"], 0, '.', '.')."</td>";
                        echo "<td><input type='number' class='form-control quantity' value='1' min='1' style='max-width: 100px' name='quantity'></td>";
                        echo"<td class='price'></td>";
                        echo "<td>";
                        echo "<a href='order_offline/delete_cart_offline.php?id=".$v["id"]."'><i class='fa fa-trash' style='color: #000000;'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                ?>
                </tbody>
            </table>
            <div class="total">
                <span>Tổng cộng:</span>
                <span id="total-price">0</span>
            </div>
        </div>
    </div>

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

<div class="container mt-5">
    <h3 style="text-align: center">Thông tin đơn hàng</h3>
    <form action="order_offline/order_offline_save.php">
<!--        <label for="ids">Mã sản phẩm:</label>-->
        <input type="hidden" class="input form-control" required name="ids" id="ids"><br>

        <label for="name">Tên người nhận:</label>
        <input type="text" class="input form-control" required name="fullName" id="name"><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" class="input form-control" required name="phone" id="phone"><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" class="input form-control" required name="address" id="address"><br>

        <input type="hidden" class="input form-control" required name="quantity" id="quantity"><br>

        <div>
            <br>
            <button type="submit" class="btn btn-outline-dark float-end" id="order">Đặt mua</button>
        </div>
    </form>
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



</body>
</html>

