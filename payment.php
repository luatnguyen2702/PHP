<?php
include 'lib/session.php';
Session::init();
// error_reporting(0);
?>
<?php
$check_login = Session::get('CTM_login');
if ($check_login == true) {
} else {
    header('Location:dangnhap.php');
}
?>

<?php include 'inc/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order'])) {
    $inserOrder = $cart->insertOrder($_POST);
    $addorderDetail = $cart->addorderdetails();
    $delCart = $cart->del_all_data_cart();
    echo "<meta http-equiv='refresh' content='0;URL=success.php'>";
}
?>
<style>
    .cover_thanhtoan {
        text-align: right;
        background-color: transparent;
        border: 0px solid;
        height: 20px;
        width: 160px;
        color: #2fa564;
        font-size: 18px;
        font-weight: bolder;
    }
</style>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thanh Toán</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Cửa Hàng</a></li>
                    <li class="breadcrumb-item active">Thanh Toán</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Cart  -->
<div class="cart-box-main">
    <?php
    $checkcart = $cart->check_cart();
    if ($checkcart) {
    ?>
        <div class="container">
            <?php
            if (isset($addorderDetail)) {
                echo $addorderDetail;
            }
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Địa Chỉ Thanh Toán</h3>
                            </div>
                            <div class="needs-validation" novalidate>
                                <?php
                                $id = Session::get('CTM_id');
                                $customer_info = $customer->show_customers($id);
                                if ($customer) {
                                    while ($result_customer = $customer_info->fetch_assoc()) {

                                ?>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="lastName">Họ và Tên (<span class="text-red">*</span>)</label>
                                                <input type="text" class="form-control" name="Ten" id="name" placeholder="Nhập tên người nhận" value="<?php echo $result_customer['Ten']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username">Số Điện Thoại (<span class="text-red">*</span>)</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="SDT" id="phone" placeholder="Nhập số điện thoại người nhận" value="<?php echo $result_customer['SDT']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="Email" id="email" placeholder="Nhập email người nhận" value="<?php echo $result_customer['Email']; ?>" required>


                                        </div>
                                        <div class="mb-3">
                                            <label for="address">Địa Chỉ (<span class="text-red">*</span>)</label>
                                            <input type="text" class="form-control" name="DiaChi" id="address" placeholder="Nhập địa chỉ người nhận" value="<?php echo $result_customer['DiaChi']; ?>" required>
                                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>


                                <hr class="mb-1">
                            </div>
                        </div>
                        <div class="d-block my-3 checkout-voucher">


                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Voucher</h3>
                                    </div>
                                    <div class="mb-4 voucher-user-payment__list">

                                        <div class="text-center">
                                            <div class="none-notify text-red ">Bạn chưa có voucher nào!</div>
                                            <span class="text-color underline font-weight-bold">
                                                <a href="voucher.php" class="link-to-product underline">Đổi ngay!</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="">
                    </div>



                    <div class="col-sm-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Phương pháp vận chuyển</h3>
                                    </div>
                                    <div class="mb-4">
                                        <form action="" name="myForm">
                                            <div class="custom-control custom-radio payment">
                                                <input id="shippingOption1" name="PhiShip" value="0" class="custom-control-input" checked="checked" type="radio">
                                                <label class="custom-control-label" for="shippingOption1">Tiêu Chuẩn</label> <span class="float-right font-weight-bold text-color">Miễn Phí</span>
                                            </div>
                                            <div class="ml-4 mb-2 small">(3-7 Ngày làm việc)</div>
                                            <div class="custom-control custom-radio payment">
                                                <input id="shippingOption2" name="PhiShip" value="20000" class="custom-control-input" type="radio">
                                                <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold text-color">20.000 đ</span>
                                            </div>
                                            <div class="ml-4 mb-2 small">(2-4 ngày làm việc)</div>
                                            <div class="custom-control custom-radio payment">
                                                <input id="shippingOption3" name="PhiShip" value="60000" class="custom-control-input" type="radio">
                                                <label class="custom-control-label" for="shippingOption3">Ngày Hôm Sau</label> <span class="float-right font-weight-bold text-color">60.000 đ</span>
                                            </div>
                                            <label id="valueShip"></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">

                                    <div class="title-left">
                                        <h3>Giỏ hàng</h3>
                                    </div>
                                    <div class="rounded p-2 bg-second final-bill">

                                        <?php
                                        $get_product = $cart->get_product_card();
                                        if ($get_product) {
                                            $tongtien = 0;
                                            while ($result_cart = $get_product->fetch_assoc()) {
                                                $tongtien += $result_cart['TongCong'];
                                        ?>
                                                <div class="media mb-2 border-bottom">
                                                    <div class="media-body">
                                                        <a class="link-to-product text-lm-1" href="details.php?MaSanPham=<?php echo $result_cart['MaSanPham']; ?>"><?php echo $result_cart['TenSanPham']; ?></a>
                                                        <div class="small text-muted"> <?php echo number_format($result_cart['Gia'], 0, '', ','); ?> vnđ<span class="mx-2">|</span><?php echo $result_cart['SoLuong']; ?><span class="mx-2">|</span> Tổng : <strong> <?php echo number_format($result_cart['TongCong'], 0, '', ','); ?> vnđ</strong></div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Thống kê</h3>
                                </div>
                                <div class="d-flex text-color">
                                    <div class="font-weight-bold ">Chi phí</div>
                                    <div class="ml-auto font-weight-bold">Tổng</div>
                                </div>
                                <hr class="my-1">
                                <!-- Tổng tiền -->
                                <div class="d-flex align-items-center">
                                    <h4>Tổng tiền</h4>
                                    <div class="ml-auto text-color">
                                        <input class="cover_thanhtoan" value="<?php echo number_format($tongtien, 0, '', ','); ?> " readonly />
                                        vnđ
                                        <input name="TongTien" hidden value="<?php echo $tongtien; ?>" readonly />
                                    </div>
                                </div>
                                <hr class="my-1">
                                <!-- Tích lũy -->
                                <div class="d-flex align-items-center">
                                    <h4>Tích lũy</h4>
                                    <div class="ml-auto text-color"><?php $tichluy = $tongtien / 1000;
                                                                    echo  $tichluy; ?></div>
                                </div>
                                <hr class="my-1">
                                <!-- Giảm giá -->
                                <div class="d-flex align-items-center">
                                    <h4>Giảm giá</h4>
                                    <div id="voucher-fee" class="ml-auto text-color" name="GiamGia">0%</div>
                                    <input name="GiamGia" hidden value="0" />
                                </div>
                                <hr class="my-1">
                                <!-- Phí ship -->
                                <div class="d-flex align-items-center">
                                    <h4>Phí ship</h4>
                                    <div class="ml-auto text-color">
                                        <?php $phiship = 0; ?>
                                        <span id="ship-show" class="ship-show">0</span><span> vnđ</span>
                                    </div>
                                </div>
                                <hr class="my-2 mt-2">
                                <!-- Tổng thanh toán -->
                                <div class="d-flex gr-total align-items-center">
                                    <h5>Tổng thanh toán</h5>
                                    <div class="ml-auto text-red" id="final-price">
                                        <span id="total-show" class="total-show cover_thanhtoan"><?php $tongtt = $tongtien + $phiship;
                                        echo number_format($tongtt, 0, '', ','); ?></span><span> vnđ</span>
                                    </div>
                                </div>
                                <hr class="my-2 mt-2">
                            </div>
                        </div>
                            <div class="col-12 d-flex shopping-box">
                                <a href="cart.php" class="ml-auto btn hvr-hover max-width-mobile font-weight-bold p-2">Hủy đặt Hàng</a>

                                <input type="submit" class="ml-auto btn hvr-hover max-width-mobile font-weight-bold p-2" name="order" value="Đặt hàng" />
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php
    } else {
    ?>
        <div class="product-categorie-box">
            <div class="tab-content">
                <!--Start grid view-->
                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                    <div class="row" id="grid-products" style="width: 100%;margin: auto;display: block;">
                        <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
                            <p id="none-product__title" class="none-product__title font-weight-bold font-italic mb-2" style="color:red ;">Giỏ hàng của quý khách đang trống <br>
                                Rất nhiều sản phẩm ngon đã được cập nhật. Ăn một lần là không muốn giảm cân... cùng Tufy Store !</p>
                            <a id="go-to-shop" href="allproduct.php">
                                <img class="none-product__img mt-3" src="./admin/images/empty-product.png" style="width: 50%;cursor: pointer;">
                            </a>
                            </a>
                        </div>
                        <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
                            <div>
                                <a class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" href="buyhictory.php">Xem đơn hàng</a>
                                <a class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" href="allproduct.php">Mua sắm nào</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
    /* ..............................................
Hiển thị phí ship
................................................. */
    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + ',')) + prev
        })
    }
    $('input[name="PhiShip"]').click(function(e) {
        var currentShip = $(this).val()
        $('#ship-show').html(formatCash(currentShip))

        var totalPay = parseInt($('input[name="TongTien"]').val()) + parseInt(currentShip)

        $('#total-show').html(formatCash(totalPay.toString()))
    })
</script>
<?php include_once 'inc/footer.php' ?>