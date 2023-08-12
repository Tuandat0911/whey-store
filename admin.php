<?php
    session_start();
    $page = null;
    if(isset ($_GET['page'])) {
        $page = $_GET['page'];
    }
    $admin = "";
    if(isset ($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-secondary navbar-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">
            <img src="assets/logos.png" alt="" style="width: 120px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php?page=products/products.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php?page=categories/categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Menu</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="admin.php?page=accounts/accounts.php">accounts</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=orders/orders.php">orders</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=order_details/order_detail.php">order details</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=admin/doanh_so.php">Doanh số</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=admin/top_ban_chay.php">Top sản phẩm bán chạy</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=admin/san_pham_sap_het_hang.php">Sản phẩm sắp hết hàng</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=orders/order_offline.php">Order Offline</a></li>
                        <li><a class="dropdown-item" href="admin.php?page=admin/admin_table.php">Nhân viên bán hàng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
        if($admin == ""){
            ?>
            <a href="admin/login_admin.php">
                <button class="btn btn-outline-dark" type="button" style="margin-right: 85px">
                    <i class="fa fa-right-to-bracket" style="color: #000000;"></i>
                    Sign in
                </button>
            </a>
            <?php
        } else {
            echo '
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 85px">
                                ' . $admin . '
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
    </div>
</nav>


</body>
</html>
<?php
if($admin == ""){
    echo"<div class='container mt-3'>";
    echo'<div class="alert alert-danger">';
    echo'<b>Tuổi gì đòi vào đây (¬_¬)</b>';
    echo'</div>';
    echo"</div>";
} else {

    if ($page == null) {
        require_once('products/products.php');
    } else if ($page == 'products/products_add.php') {
        require_once('products/products_add.php');
    } else if ($page == 'products/products.php') {
        require_once('products/products.php');
    } else if ($page == 'products/products_edit.php') {
        require_once('products/products_edit.php');


    } else if ($page == 'categories/categories.php') {
        require_once('categories/categories.php');
    } else if ($page == 'categories/categories_add.php') {
        require_once('categories/categories_add.php');
    } else if ($page == 'categories/categories_delete.php') {
        require_once('categories/categories_delete.php');
    } else if ($page == 'categories/categories_edit.php') {
        require_once('categories/categories_edit.php');


    } else if ($page == 'accounts/accounts.php') {
        require_once('accounts/accounts.php');
    } else if ($page == 'accounts/accounts_edit.php') {
        require_once('accounts/accounts_edit.php');


    } else if ($page == 'orders/orders.php') {
        require_once('orders/orders.php');
    }

    else if($page == 'admin/doanh_so.php') {
        require_once('admin/doanh_so.php');
    }

    else if($page == 'admin/top_ban_chay.php') {
        require_once('admin/top_ban_chay.php');
    }

    else if($page == 'order_offline/cart_offline.php') {
        require_once('order_offline/cart_offline.php');
    }

    else if($page == 'admin/admin_table.php') {
        require_once('admin/admin_table.php');
    }

    else if($page == 'admin/san_pham_sap_het_hang.php') {
        require_once('admin/san_pham_sap_het_hang.php');
    }

    else if($page == 'order_details/order_detail.php') {
        require_once('order_details/order_detail.php');
    }

    else if($page == 'admin/add_admin.php') {
        require_once('admin/add_admin.php');
    }
}
?>


