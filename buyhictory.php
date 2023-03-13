<?php
include 'lib/session.php';
Session::init();
error_reporting(0);
?>
<?php
$check_login = Session::get('CTM_login');
if ($check_login == true) {
} else {
    header('Location:dangnhap.php');
}
?>
<?php include 'inc/header.php'; ?>
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Lịch sử mua hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="profile.php">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<h2 class="text-center title-table">Lịch sử mua hàng</h2>
<div class="table-container mb-2" style="width: 1400px;">
    <table class="table table-user table-striped shadow">
        <thead class="bg-primary text-white" style="background-color: #2fa564 !important;">
            <tr>
                <th>
                    Ngày đặt
                </th>
                <th>
                    Người nhận
                </th>
                <th>
                    Địa chỉ
                </th>
                <th>
                    SDT
                </th>
                <th>
                    Email
                </th>
                <th>
                    Giảm giá
                </th>
                <th>
                    Tổng tiền
                </th>
                <th>
                    Phí Ship
                </th>
                <th>
                    Tổng thanh toán
                </th>
                <th>
                    Xem
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $buyall = $cart->show_hoadon_all();
            if($buyall){?>
            <?php
                $buy_count = mysqli_num_rows($buyall);
                $buy_button = ceil($buy_count / 5);  
            $i = 1;
            $gethictory = $cart->show_hoadon();
            if ($gethictory) {
                while ($result = $gethictory->fetch_assoc()) {
            ?>
                    <tr>

                        <td>
                            <?php echo $result['NgayLap'] ?>
                        </td>
                        <td>
                            <?php echo $result['Ten']; ?>
                        </td>
                        <td style="max-width:200px">
                            <?php echo $result['DiaChi']; ?>
                        </td>
                        <td>
                            <?php echo $result['SDT']; ?>
                        </td>

                        <td>
                            <?php echo $result['Email']; ?>
                        </td>
                        <td>
                            <?php echo $result['GiamGia']; ?> %
                        </td>
                        <td>
                            <?php echo number_format($result['TongTien'], 0, '', ','); ?> vnđ
                        </td>
                        <td>
                            <?php echo number_format($result['Ship'], 0, '', ','); ?> vnđ
                        </td>
                        <td>
                            <?php $tongcong = $result['TongTien'] + $result['Ship'];
                            echo number_format($tongcong, 0, '', ','); ?> vnđ
                        </td>
                        <td>
                            <a class="view-bill-detail__link" href="billdetails.php?DonHang=<?php echo $result['MaHoaDon']; ?>"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<style>
    .pagination > li {
        background-color: #2fa564;
        border-radius: 5px;
        margin: 0 4px;
        color: white;
        cursor: pointer;
        padding: 4px 0px;
    }

    .pagination > li > a {
        color: white;
        padding: 6px 12px;
    }
</style>
<div class="pagelist_custom" style="margin-top: 20px">
    <span class="show-page-text" style="color: black;">Trang 1 / <?php echo $buy_button; ?></span>
</div>
<div class="pagination-container">
    <ul class="pagination" style="justify-content: center;
    margin: 20px;">
        <?php
        for ($i; $i <= $buy_button; $i++) {
            echo '<li><a href="buyhictory.php?Page=' . $i . '">' . $i . '</a></li>';
        }
        ?>
    </ul>
</div>

<?php }else{
?>

<h2 style="font-size: 22px;
    text-align: center;
    margin: 20px;
    font-style: italic;
    color: red;">Lịch sử mua hàng trống</h2>

<?php } ?>

<div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
    <div class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" style="margin: auto; width: 100px;cursor: pointer;">
        <button onclick="history.back()" style="background: transparent;
    border-color: transparent;
    color: white;cursor: pointer;">Trở lại</button>
    </div>
</div>
<?php include 'inc/footer.php'; ?>