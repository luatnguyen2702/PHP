<?php include 'inc/header.php' ?>
<?php
$check_login = Session::get('CTM_login');
if ($check_login == true) {
?>
    <div class="shop-box-inner">
        <div class="container full-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-left">
                    <div class="right-product-box">

                        <div class="user-point">
                            <div class="user-point__title">Điểm tích lũy của bạn</div>
                            <div data-point="37948" class="user-point__value">37948</div>
                        </div>
                        <div class="text-color text-center font-italic mt-3 mb-2">*Điểm tích lũy có được khi
                            <span class="underline font-weight-bold"><a class="link-to-product" href=""> đặt mua</a></span>
                            thành công những sản phẩm có số điểm tương ứng.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container voucher_place">
            <div class="row">
            </div>
            <h3 style="font-size: 18px;" class="none-notify text-center text-red">Cửa hàng chưa có voucher nào!</h3>
        </div>
    </div>
<?php
} else {
?>
    <div class="shop-box-inner">
        <div class="container full-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-left">
                    <div class="right-product-box">

                        <div class="user-point">
                            <div class="user-point__title">Đăng nhập để xem điểm của bạn!</div>
                            <a href="dangnhap.php" class="btn login hvr-hover">Đăng nhập</a>
                        </div>
                        <div class="text-color text-center font-italic mt-3 mb-2">*Điểm tích lũy có được khi
                            <span class="underline font-weight-bold"><a class="link-to-product" href=""> đặt mua</a></span>
                            thành công những sản phẩm có số điểm tương ứng.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container voucher_place">
            <div class="row">
            </div>
            <h3 style="font-size: 18px;" class="none-notify text-center text-red">Cửa hàng chưa có voucher nào!</h3>
        </div>
    </div>
<?php
}
?>
<?php include 'inc/footer.php' ?>