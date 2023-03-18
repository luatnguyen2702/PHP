<?php

use LDAP\Result;

include 'inc/header.php'; ?>
<style>
    li.active>a {
        color: white !important;
        font-weight: bolder !important;
    }
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </form>

            <!-- Topbar Search -->
            <form method="GET" action="./billSearch.php?tukhoa=" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input class="col-md-10" type="text" name="tukhoa" class="form-control bg-light border-0 small" placeholder="Tìm kiếm số điện thoại..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append col-md-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mb-2 text-capitalize table-admin__title">
                Hóa đơn
            </h1>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <?php $get_all_hoadon = $cart->show_hoadon_all_admin();
                    if ($get_all_hoadon) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>

                                    <tr>
                                        <th class="text-capitalize">
                                            <a href="">M&#227; H&#243;a Đơn</a>
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Người nhận</a>
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Ng&#224;y Lập</a>
                                        </th>
                                        <th class="text-capitalize">
                                            SĐT
                                        </th>
                                        <th class="text-capitalize">
                                            Địa Chỉ
                                        </th>
                                        <th class="text-capitalize">
                                            Voucher
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Tổng tiền</a>
                                        </th>
                                        <th colspan="2" class="text-capitalize text-center">In hóa đơn</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $bill = $cart->show_hoadon_all_admin_page();
                                    $bill_count = mysqli_num_rows($get_all_hoadon);
                                    $bill_button = ceil($bill_count / 5);
                                    $i = 1;
                                    if ($bill) {
                                        while ($result = $bill->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $result['MaHoaDon']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['Ten']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['NgayLap']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['SDT']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['DiaChi']; ?>
                                                </td>
                                                <td>
                                                    0%
                                                </td>
                                                <td>
                                                    <?php
                                                    $tongtt = $result['TongTien'] + $result['Ship'];
                                                    echo number_format($tongtt, 0, '', ','); ?> vnđ
                                                </td>
                                                <td class="options">
                                                    <a href="exportbill.php?MaHoaDon=<?php echo $result['MaHoaDon']; ?>">
                                                        <span class="icon yellow-bt hover">
                                                            <ion-icon name="print" size="large"></ion-icon>
                                                        </span>
                                                    </a>
                                                </td>

                                            </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                            <br />
                            <div class="pagination-container">
                                <ul class="pagination" style="justify-content: center; display: flex;">
                                    <?php
                                    for ($i; $i <= $bill_button; $i++) {
                                        echo '<li class="page-active" page="' . $i . '" style="margin: 0 4px 0 4px;"><a href="categoryList.php?Page=' . $i . '">' . $i . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="not-data">
                            <h6>Không có dữ liệu liên quan !</h6>
                        </div>
                    <?php
                    }
                    ?>
                    <br />
                    <div class="col-md-12 back-to-list ">
                        <!-- <a href="categoryList.php">Trở lại</a> -->
                    </div>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php'; ?>