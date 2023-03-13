<?php
include_once  'lib/database.php';
include_once  'helpers/format.php';
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$cart = new cart();

error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['CapNhatSoLuong'])) {
    $cardId = $_POST['MaGioHang'];
    $quantity = $_POST['SoLuong'];
    $price = $_POST['Gia'];
    // echo $cardId . $quantity ;
    $update_quantity_card = $cart->update_quantity_card($cardId, $quantity, $price);
}
if (isset($_GET['MaGioHang'])) {
    $id = $_GET['MaGioHang'];
    // echo "$id";
    $delCart = $cart->delete_card($id);
}
?>
<?php include_once 'inc/header.php' ?>
<!-- Start Cart  -->
<div class="cart-box-main pt-5">
    <?php
    $check_cart = $cart->check_cart();
    if ($check_cart) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($delCart) {
                        echo $delCart;
                    } ?>
                    <div class="table-main table-responsive shadow">
                        <table class="table custom">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Tùy chọn</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>

                            <tbody id="cart-index__body">
                                <?php
                                $get_all = $cart->get_product_card();
                                if ($get_all) {
                                    $soloai = 0;
                                    $tongtien = 0;
                                    while ($result = $get_all->fetch_assoc()) {
                                        $soloai += 1;
                                        $tongtien += $result['TongCong'];
                                ?>
                                        <!-- <form action="" method="POST"> -->
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="details.php?MaSanPham=<?php echo $result['MaSanPham']; ?>">
                                                    <div class="img-fit cart" style="background-image: url('./admin/<?php echo $result['HinhChinh'] ?>'),url('./admin/images/default.png');">
                                                    </div>

                                                </a>
                                            </td>
                                            <td class="name-pr" style="white-space: inherit;">
                                                <a href="details.php?MaSanPham=<?php echo $result['MaSanPham']; ?>">
                                                    <?php echo $result['TenSanPham'] ?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p><?php echo number_format($result['Gia'], 0, '', ','); ?> vnđ</p>
                                            </td>
                                            <form action="" method="POST">
                                                <td class="quantity-box">
                                                    <div class="quantity-box-wrap">
                                                        <div>
                                                            <input type="hidden" name="MaGioHang" value="<?php echo $result['MaGioHang']; ?>" />
                                                            <input type="hidden" name="Gia" value="<?php echo $result['Gia']; ?>" />
                                                            <input class="user-input" value="<?php echo $result['SoLuong'] ?>" min="1" name="SoLuong" id="soluong" type="number" />
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="total-pr" style="font-weight: 700;">
                                                    <p><?php echo number_format($result['TongCong'], 0, '', ','); ?> vnđ</p>
                                                </td>
                                                <td>
                                                    <input type="submit" id="btn-update" class="update-cart btn hvr-hover max-width-mobile text-capitalize p-2 float-right shadow" name="CapNhatSoLuong" value="Cập nhật" />
                                                </td>
                                            </form>
                                            <td class="remove-pr">
                                                <a href="?MaGioHang=<?php echo $result['MaGioHang'] ?>" data-id="SP<?php echo $result['MaSanPham'] ?>" class="delete-product">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- </form> -->
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row ">


                <div class="col-lg-12 col-sm-12">
                    <!-- <div class="update-box">
                    <button type="submit" id="btn-update" class="update-cart btn hvr-hover max-width-mobile text-capitalize p-2 float-right mt-3 shadow">Cập nhật</button>
                </div> -->
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3 style="text-align: center;">Thông tin đơn hàng</h3>
                        <div class="d-flex align-items-center text-color">
                            <h4 class="font-weight-bold ">Sản phẩm</h4>
                            <div class="ml-auto "><?php echo $i; ?> loại</div>
                        </div>
                        <hr class="mt-1 mb-1 " />
                        <div class="d-flex align-items-center text-color">
                            <h4 class="font-weight-bold ">Tích lũy</h4>
                            <div class="ml-auto"><?php echo $tongtien / 1000; ?> điểm</div>
                        </div>
                        <hr class="mt-1 mb-1 " />
                        <div class="d-flex align-items-center text-color">
                            <h4 class="font-weight-bold ">Tiền hàng</h4>
                            <div class="ml-auto "><?php echo number_format($tongtien, 0, '', ',');; ?> đ</div>
                        </div>
                        <hr class="mt-1 mb-1 " />
                        <div class="d-flex gr-total">
                            <h5>Tổng cộng</h5>
                            <div class="ml-auto h5"><?php echo number_format($tongtien, 0, '', ','); ?> vnđ</div>
                        </div>
                        <hr class="mt-1 mb-2" />
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box">
                    <a href="payment.php" class="ml-auto btn hvr-hover max-width-mobile font-weight-bold">Thanh toán</a>
                </div>

            </div>

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
                            <a href="allproduct.php">
                                <button class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2">Mua sắm nào</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>

            </div>
            <!-- End Cart -->
            <?php include 'inc/footer.php' ?>