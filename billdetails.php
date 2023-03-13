<?php include_once 'inc/header.php'; ?>
<?php
error_reporting(0);
if (!isset($_GET['DonHang']) || $_GET['DonHang'] == NULL) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $id = $_GET['DonHang'];
}
?>
<h2 class="text-center title-table mb-2">Thông tin hóa đơn</h2>
<div class="text-center mb-3">

</div>
<div class="table-container" style="width: 90%">
    <table class="table table-user table-striped shadow">
        <thead class="bg-primary text-white">

            <tr>
                <th>
                    Tên sản phẩm
                </th>
                <th>
                    Đơn giá
                </th>
                <th>
                    Số lượng
                </th>
                <th>
                    Thành tiền
                </th>
                <th>
                    Tích lũy
                </th>
            </tr>

        </thead>

        <tbody>
            <?php
            $getchitiet = $cart->show_cthoadon($id);
            if ($getchitiet) {
                $tongdiem = 0;
                while ($result = $getchitiet->fetch_assoc()) {
                    $tongdiem += $result['tichluy']
            ?>
                    <tr>
                        <td>
                            <a class="link-to-product text-lm-2" href=""><?php echo $result['TenSanPham'] ?></a>
                        </td>
                        <td>
                            <?php echo number_format($result['DonGia'], 0, '', ','); ?> vnđ
                        </td>
                        <td>
                            <?php echo $result['SoLuong'] ?> <span class="text-lowercase"><?php echo $result['DonViTinh'] ?></span>
                        </td>

                        <td>
                            <?php echo number_format($result['ThanhTien'], 0, '', ','); ?>
                        </td>
                        <td>
                            <span class="count-up"><?php $tichluy = $result['ThanhTien'] / 1000;
                                                    echo $tichluy ?></span> điểm
                        </td>
                    </tr>
            <?php

                }
            }
            ?>

        </tbody>

    </table>
    <div class="table-container" style="width: 90%; text-align: center;">
        <a href="buyhictory.php">
            <button class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2">Trở lại</button>
        </a>

    </div>

</div>


<?php include 'inc/footer.php'; ?>