<?php
include '../classes/admin.php';
include_once($filepath . '../../lib/session.php');
Session::checkLogin();
?>
<?php
$admin = new admin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $TenDangNhap = $_POST['TenDangNhap'];
    $MatKhau = $_POST['MatKhau'];
    $login_check = $admin->login_admin($TenDangNhap, $MatKhau);
}
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

                        <p style="font-size: 16px;">Gọi ngay : <a href="tel:0376701749">+84 934161264</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href=""><i class="fas fa-location-arrow text-capitalize"></i> Địa Điểm Cửa Hàng</a>
                            </li>
                            <li><a href=""><i class="fas fa-headset"></i> Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 custom-login">
                    <div class="option-account">
                        <?php
                        $loginadmin = Session::get("QTVLOGIN");
                        $QTVTEN = Session::get("QTVTEN");
                        if ($loginadmin) {
                        ?>
                            <?php
                            error_reporting(0);
                            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                Session::destroy();
                            }
                            ?>
                            <a href="index.php" class="btn login hvr-hover">Quản trị</a>
                            <a href="?action=logout" class="btn register hvr-hover">Đăng xuất</a>
                        <?php } ?>

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
            <div class="container" style="justify-content: center; align-content: center; display: contents;">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div>
                    <a class="navbar-brand" href="index.php"><img src="./images/logo_luonvuituoi.png" class="logo" alt="" style="height: 90px; width: auto;"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu" style="text-align: center;">
                    <div class="title-left account" style="font-size: 16px; border-bottom: 0px solid #222; width: 100%; font-style: italic;margin: 20px 0;font-style: italic;">
                        <h4>Hệ Thống Chuỗi Cửa Hàng Bánh Kẹo luonvuituoi Store</h4>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-md-6 col-ml-6 mb-3">
                    <a class="navbar-brand" href="index.php" style="width: 100%;"><img src="./images/logo_luonvuituoi.png" class="logo" alt="" style="height: 100%; width: 100%; text-align: center;"></a>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">

                    <?php
                    $loginadmin = Session::get("QTVLOGIN");
                    $QTVTEN = Session::get("QTVTEN");
                    if ($loginadmin) {
                    ?>
                        <div class="">
                            <h3 class="text-capitalize">Xin chào QTV <?php echo $QTVTEN ?> ! Chúc một ngày tốt lành !</h3>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div>
                            <div class="title-left account">
                                <h3 class="text-capitalize">Đăng Nhập Tài Khoản Quản Trị Viên</h3>
                            </div>
                            <?php
                            if (isset($login_check)) {
                                echo $login_check;
                            }
                            ?>
                            <form action="dangnhap.php" class="form-horizontal mt-3 review-form-box" method="post" role="form">
                                <input name="" type="hidden" value="" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="InputEmail" class="mb-0">Email (<span class="text-red">*</span>)</label>
                                        <input class="form-control" data-val="true" data-val-email="Email không đúng định dạng!" data-val-required="Vui lòng nhập Email!" id="InputEmail" name="TenDangNhap" placeholder="Nhập email" type="email" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="InputPassword" class="mb-0">Mật Khẩu (<span class="text-red">*</span>)</label>
                                        <input class="form-control" data-val="true" data-val-length="Mật khẩu phải từ 6 đến 100 ký tự!" data-val-length-max="100" data-val-length-min="6" data-val-required="Vui lòng nhập mật khẩu!" id="InputPassword" name="MatKhau" placeholder="Nhập mật khẩu" type="password" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <input type="submit" class="btn hvr-hover max-width-mobile" value="Đăng nhập"></input>
                            </form>
                            <div class="ask-link-group">
                                <div><a href="" class="text-muted ask-link">Bạn chưa có tài khoản? Đăng ký ngay!</a>
                                </div>
                                <div><a href="" class="text-muted ask-link">Quên mật khẩu?</a></div>
                            </div>


                            <form action="" method="post"><input name="__RequestVerificationToken" type="hidden" value="" />
                                <div id="socialLoginList">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 social__button-wrap">
                                            <button type="submit" class="btn hvr-hover social__button " id="Google" name="provider" value="Google" title="Log in using your Google account" style="width: 100%;">Dùng tài khoản Google</button>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 social__button-wrap">
                                            <button type="submit" class="btn hvr-hover social__button " id="Facebook" name="provider" value="Facebook" title="Log in using your Facebook account" style="width: 100%;">Dùng tài khoản Facebook</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    <?php } ?>

                </div>
            </div>
        </div>
    </div>


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->



    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Thời Gian Hoạt Động</h3>
                            <ul class="list-time">
                                <li> Thứ 2 - Thứ 7:<span> 08:00 Sáng to 08:00 Chiều</span> </li>
                                <li>Chủ Nhật: <span>Đóng cửa</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Bản Tin</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Gửi</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Mạng Xã Hội</h3>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>luonvuituoi Store</h4>
                            <p style="color: white;font-size: 16px">Cửa hàng hiện đang là một trong chuỗi cửa hàng của
                                luonvuituoi Company HCMC.
                                Chuyên cung cấp các loại bánh kẹo ngon, hot trên thị trường, đến từ nhiều thương hiệu
                                khác nhau, trong đó có cả các thương hiệu từ trong nước đến ngoài nước như Hàn Quốc,
                                Thái Lan, Nhật,... Ngoài ra bên cửa hàng còn cung cấp các sản phẩm cho tiệc cưới hỏi như
                                trầu cau, quả bánh, kết quả kết bánh,... Vào các dịp lễ Tết còn bánh thêm các loại mứt
                                dẻo, mứt sấy và có cả mâm ngũ quả được trang trị bắt mắt theo nhiều hình thức khác nhau
                                cho từng nhu cầu của khách hàng. Cửa hàng chúng tôi luôn xem khách hàng là thượng đế.
                                Chào mừng bạn đã đến với chung tôi, cảm ơn bạn vì đã quan tâm và ủng hộ ❤️</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Thông Tin</h4>
                            <ul>
                                <li><a href="#">Về Chúng Tôi</a></li>
                                <li><a href="#">Dịch Vụ Khách Hàng</a></li>
                                <li><a href="#">Điều Khoản &amp; Điều Kiện</a></li>
                                <li><a href="#">Chính Sách Bảo Mật</a></li>
                                <li><a href="#">Thông Tin Giao Hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Liên hệ</h4>
                            <ul>
                                <li>
                                    <p style="color: white"><i class="fas fa-map-marker-alt"></i>Địa Chỉ: 23A Đường 236
                                        Tăng Nhơn Phú A Quận 9 Thành Phố Thủ Đức </p>
                                </li>
                                <li>
                                    <p style="color: white"><i class="fas fa-phone-square"></i>Số Điện Thoại: <a style="color: white" href="tel:037670179">+84 376701749</a></p>
                                </li>
                                <li>
                                    <p style="color: white"><i class="fas fa-envelope"></i>Email: <a style="color: white" href="mailto:contactinfo@gmail.com">thangminhcaoss@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2023 <a href="#">luonvuituoi Store</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
    <!-- ALL JS FILES -->
    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-latest.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/style.js"></script>
</body>

</html>