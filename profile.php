<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
    $check_login = Session::get('CTM_login');
    if ($check_login == true) {   
    } else {
        header('Location:dangnhap.php');
    }
?>
<?php include 'inc/header.php'; ?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Tài Khoản </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/trang-chu">Cửa Hàng</a></li>
                    <li class="breadcrumb-item active">Tài Khoản</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start My Account  -->
<div class="my-account-box-main">
    <div class="container">
        <div class="my-account-page">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="buyhictory.php"> <i class="fa fa-gift"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4 class="text-capitalize"><a href="buyhictory.php">Đơn đặt hàng</a></h4>
                                <p>Kiểm tra đơn hàng, lịch sử mua</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="productfavorite.php"><i class="fas fa-heart"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4 class="text-capitalize"><a href="productfavorite.php">Sản Phẩm Yêu Thích</a></h4>
                                <p>Tổng hợp những sản phẩm đã yêu thích</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="profileinfo.php"> <i class="fas fa-user"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4 class="text-capitalize"><a href="profileinfo.php">Thông tin cá nhân</a></h4>
                                <p>Chỉnh sửa thông tin cá nhân</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="profilesetting.php"> <i class="fas fa-user"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4 class="text-capitalize"><a href="profilesetting.php">Quản lí mật khẩu</a></h4>
                                <p>Đổi mật khẩu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account -->
<?php include 'inc/footer.php'; ?>
