<?php
	include '../classes/producer.php';
    $producer = new producer();
    include '../classes/product.php';
    $product = new product();
    include '../classes/categorysub.php';
    $categorysub = new categorysub();
    include '../classes/typeproduct.php';
    $typeproduct = new typeproduct();
    include '../classes/cart.php';
    $cart = new cart();
?>
<?php
if (!isset($_GET['MaHoaDon']) || $_GET['MaHoaDon'] == NULL) {
    echo "<script>
    window.location = 'hoadon_danhsach.php'
</script>";
} else {
    $id = $_GET['MaHoaDon'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>luonvuituoi Store | In hóa đơn</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


    <link rel="shortcut icon" href="images/logo_luonvuituoi.png" type="image/x-icon">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="./css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/custom.css">

    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/baguetteBox.min.css">
    <link rel="stylesheet" href="./css/bootsnav.css">
    <link rel="stylesheet" href="./css/bootstrap-select.css">
    <link rel="stylesheet" href="./css/carousel-ticker.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- jQuery UI CSS Reference -->
    <link href="../themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <!-- Required jQuery and jQuery UI Javascript references -->
    <script src="../Scripts/jquery-1.7.1.min.js"></script>
    <script src="../Scripts/jquery-ui-1.10.4.min.js"></script>

    <script src="../Scripts/modernizr-2.8.3.js"></script>

    <link href="../css/value.css" rel="stylesheet" />
</head>

<body>
    <?php
    $get_hoadon_export = $cart->show_hoadon_admin_export($id);
    if ($get_hoadon_export) {
        while ($result = $get_hoadon_export->fetch_assoc()) {
    ?>
            <div class="wrapper">
                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h2 class="page-header">
                                <!-- <i style="margin-right:16px" class="fas fa-store"></i> -->
                                <img src="./images/logo_luonvuituoi.png" alt="Logo luonvuituoi Store" style="width: 50px;
    margin-left: 16px;">
                                <span>luonvuituoi Store</span>

                                <small class="float-right">
                                    Ngày: <?php $date = date('d/m/y'); echo $date;  ?>
                                </small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col" style="text-align: center;">
                            Nguồn giao
                            <address>
                                <strong>luonvuituoi Store</strong><br>
                                152 Trần Văn Quang , Phường 10 ,Quận Tân Bình<br>
                                SĐT: 0934161264<br>
                                Email: nguyenluat2702@gmail.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col" style="text-align: center;">
                            Giao đến
                            <address>
                                <strong><?php echo $result['Ten'] ?></strong><br>
                                Địa chỉ: <?php echo $result['DiaChi'] ?><br>
                                SĐT: <?php echo $result['SDT'] ?><br>
                                Email: <?php echo $result['Email'] ?>
                            </address>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Table row -->
                    <div class="print-bill-id">Mã Hóa Đơn: <span><?php echo $result['MaHoaDon']; ?></span></div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize">STT</th>
                                        <th class="text-capitalize">Tên Sản Phẩm</th>
                                        <th class="text-capitalize">Số Lượng</th>
                                        <th class="text-capitalize">Đơn Giá</th>
                                        <th class="text-capitalize">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $get_hoadon_export = $cart->show_cthoadon_admin_export($id);
                                if ($get_hoadon_export) {
                                    $i = 0;
                                    while ($result_dt = $get_hoadon_export->fetch_assoc()) {
                                        $i += 1;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result_dt['TenSanPham']; ?></td>
                                        <td><?php echo $result_dt['SoLuong']; ?><span class="text-lowercase"> <?php echo $result_dt['DonViTinh']; ?></span></td>
                                        <td><?php echo number_format($result_dt['DonGia'], 0, '', ','); ?> vnđ</td>
                                        <td><?php echo number_format($result_dt['ThanhTien'], 0, '', ','); ?> vnđ</td>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6 img-credit" style="text-align: center;">
                            <p class="lead">Phương thức thanh toán:</p>
                            <img src="./img/agribank-logo-1CEEE70C76-seeklogo.com.png" alt="Agribank">
                            <img style="margin-left: 14px; margin-right: 14px" src="./img/momo-upload-api-push-momo-avatar-190131152912 (1).png" alt="Momo">
                            <img src="./img/truck-24-hour-shipping-flat-circle-icon-vector-3442007-300x300.png" alt="Vietcombank">


                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Có thể thanh toán online hoặc thanh toán khi nhận được hàng
                            </p>
                            <p style="text-align: center;">Chữ ký người nhận hàng </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">


                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Giảm giá:</th>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Tổng tiền hàng:</th>
                                        <td><?php echo number_format($result['TongTien'], 0, '', ','); ?> vnđ</td>
                                    </tr>

                                    <tr>
                                        <th>Phí ship:</th>
                                        <td><?php echo number_format($result['Ship'], 0, '', ','); ?> vnđ</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng thanh toán:</th>
                                        <td class="print-bill-pay"><?php
                                        $tongtt = $result['TongTien'] + $result['Ship'];
                                        echo number_format($tongtt, 0, '', ','); ?> vnđ</td>
                                    </tr>
                                </table>
                                <h6 style="font-style: italic;
    color: #b3b3b3;
    text-align: center;">(Ngày nhận hàng dự kiến sau <?php if($result['Ship'] == 0){
                                    echo "7 tới 10 ngày kể từ ngày xuất hóa đơn";
                                }elseif($result['Ship'] == 20000){
                                    echo "3 tới 6 ngày kể từ ngày xuất hóa đơn";
                                }else{
                                    echo "1 tới 2 ngày kể từ ngày xuất hóa đơn";
                                } ?> )</h6>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- ./wrapper -->
            <!-- Page specific script -->
            <script>
                window.addEventListener("load", window.print());
            </script>
    <?php
        }
    } ?>
</body>

</html>