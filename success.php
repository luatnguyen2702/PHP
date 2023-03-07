<?php include 'inc/header.php'; ?>
<div class="success-main" style="display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 0;
    flex-direction: column;">
    <div class="success-title" style="    display: flex;
    align-items: baseline;">
        <h1 class="text-center title-table">
            Bạn đã đặt hàng thành công
        </h1>
        <img class="success-img" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Light_green_check.svg/2048px-Light_green_check.svg.png" style="margin-left: 12px;
    width: 50px;
    height: 50px;"/>
    </div>
    <div class="table-container">
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
            $gethictory = $cart->show_hoadon_sucess();
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
</div>
<?php include 'inc/footer.php'; ?>