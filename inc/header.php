<?php
include_once 'lib/session.php';
Session::init();
?>
<?php
include_once  'lib/database.php';
include_once  'helpers/format.php';
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$store = new store();
$product = new product();
$category = new category();
$categorysub = new categorysub();
$customer = new customer();
$cart = new cart();
$comment = new comment();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>luonvuituoi Store</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href=" images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href=" images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href=" css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href=" css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href=" css/custom.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        .user-avatar__login {
            width: 40px;
            padding: 1.5px !important;
            background-color: #2fa564;
            transition: all ease-in .1s;
        }
    </style>
</head>

<body>
    <!-- Start Loader -->
    <div id="loader__wrap" class="loader__wrap">
        <span id="loader__effect"></span>
    </div>
    <!-- End Loader -->
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 custom-about-shop">
                    <div class="right-phone-box">

                        <p style="font-size: 16px;">Gọi ngay : <a href="tel:0376701749">+84934161264</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="mapstore.php"><i class="fas fa-location-arrow text-capitalize"></i> Địa Điểm Cửa Hàng</a></li>
                            <li><a href="contactstore.php"><i class="fas fa-headset"></i> Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 custom-login">
                    <div class="option-account">
                        <?php
                        if (isset($_GET['MaKhachHang'])) {
                            $delCart = $cart->del_all_data_cart();
                            Session::destroy();
                        }
                        ?>
                        <?php
                        $check_login = Session::get('CTM_login');
                        $id = Session::get("CTM_id");
                        $image = Session::get("CTM_image");
                        if ($check_login == true) { ?>
                            <a href="profile.php" class="name-account" routeValues: null>
                                <span>
                                    <?php if ($image == 'UploadedFilesUser/images/avt_default.png') { ?>
                                        <img class="rounded-circle p-1 user-avatar__login" src="./admin/UploadedFilesUser/images/avt_default.png" />
                                    <?php } else { ?>
                                        <img class="rounded-circle p-1 user-avatar__login" src="./admin/<?php echo $image; ?>" />
                                    <?php } ?>
                                </span>
                            </a>
                            <a href="?MaKhachHang=<?php echo $id; ?>" class="btn login hvr-hover">Đăng xuất</a>
                        <?php } else { ?>
                            <a href="dangnhap.php" class="btn login hvr-hover">Đăng nhập</a>
                            <a href="register.php" class="btn register hvr-hover">Đăng ký</a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart text-single "></i> Back Friday Hot - 40%
                                </li>
                                <li>
                                    <i class="fab fa-opencart text-single "></i> Giáng sinh an lành - 50%
                                </li>
                                <li>
                                    <i class="fab fa-opencart text-single "></i> Giảm 10% đơn h&#224;ng - 10%
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container" style="padding-bottom: 0px;">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="./admin/images/logo_luonvuituoi.png" class="logo" alt="" style="height: 90px; margin-left: 20px; width: auto;"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="producestore.php">Về Chúng Tôi</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Cửa Hàng</a>
                            <ul class="dropdown-menu">
                                <li><a href="allproduct.php">Sản phẩm</a></li>
                                <li><a href="cart.php">Giỏ Hàng</a></li>
                                <?php
                                $check_login = Session::get('CTM_login');
                                if ($check_login == true) {
                                    echo '<li><a href="profile.php">Tài Khoản Của Tôi</a></li>';
                                } else {
                                }
                                ?>
                                <?php
                                $check_login = Session::get('CTM_login');
                                if ($check_login == true) {
                                    echo '<li><a href="voucher.php">Voucher</a></li>';
                                } else {
                                }
                                ?>

                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Bộ Sưu Tập</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactstore.php">Liên Hệ</a></li>
                    </ul>
                </div>

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">
                                    <?php
                                    $checkcart = $cart->check_cart();
                                    if ($checkcart) {
                                        $getsluong = $cart->get_product_card();
                                        if ($getsluong) {
                                            $i = 0;
                                            while ($sum = $getsluong->fetch_assoc()) {
                                                $i++;
                                            }
                                        }
                                        echo $i;
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </span>
                                <p></p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                        $checkcart = $cart->check_cart();
                        if ($checkcart) {
                            $getsluong = $cart->get_product_card();
                            if ($getsluong) {
                                while ($sum = $getsluong->fetch_assoc()) {
                        ?>


                                    <li>
                                        <a href="#" class="photo"><img src="./admin/<?php echo $sum['HinhChinh'] ?>" class="cart-thumb" /></a>
                                        <h6><a href="#"><?php echo $sum['TenSanPham'] ?></a></h6>
                                        <p><?php echo $sum['SoLuong']; ?>x - <span class="price"><?php echo number_format($sum['Gia'], 0, '', ','); ?></span></php>
                                    </li>

                            <?php }
                            }
                            ?>
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart" style="width: 100%;">XEM GIỎ HÀNG</a>
                        <?php

                        } else { ?>
                            <li class="total">
                                <span class="float-right"><strong>Chưa có sản phẩm</strong></span>
                            </li>
                        <?php } ?>
                    </ul>


                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <form action="search.php?" method="GET" class="form-control" style="padding: 0;background-color: transparent;border-color: transparent;margin: 0 20px;">
                    <input name="tukhoa" class="form-control" placeholder="Tìm kiếm..." type="text">
                </form>
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->