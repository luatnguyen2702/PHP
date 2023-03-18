<?php

use LDAP\Result;

 include 'inc/header.php'; ?>
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
                    <form method="post" action="/admin/hoa-don" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input class="col-md-10" type="text" name="timkiem" class="form-control bg-light border-0 small" placeholder="Tìm kiếm"
                                   aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
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
                                            <th colspan="2" class="text-capitalize text-center">Tùy chọn</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                    <?php
                                            $get_all_hoadon = $cart->show_hoadon_all_admin();
                                            if($get_all_hoadon){
                                                while($result = $get_all_hoadon->fetch_assoc()){
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
                                                <a href="">
                                                    <span class="icon green-bt hover">
                                                        <ion-icon name="eye" size="large"></ion-icon>
                                                    </span>
                                                </a>
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
                                <span class="show-page-text text-white">Trang 1 / 1</span>
            
                                <div class="pagination-container"><ul class="pagination"><li class="active"><a>1</a></li></ul></div>
                            </div>
                        </div>
                    </div>
            
                </div>