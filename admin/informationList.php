<?php include 'inc/header.php'; ?>
<!-- Content Wrapper -->
<style>
    li.active > a  {
        color: white !important;
        font-weight: bolder !important;
    }
</style>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="mb-2 text-capitalize table-admin__title">
                Thông tin cửa hàng
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive" style="min-height: 500px;">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="">Tên cửa hàng</a>
                                    </th>
                                    <th class="text-center">
                                        <a href="">Đường dây nóng</a>
                                    </th>
                                    <th>
                                        <a href="">Địa chỉ</a>
                                    </th>
                                    <th colspan="1" class="text-capitalize text-center">Chỉnh sửa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $getstore_info = $store->getstore_info();
                                if ($getstore_info) {
                                    while ($result = $getstore_info->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['TenCuaHang']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $result['SDT']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['DiaChi']; ?>
                                            </td>
                                            <td class="options">
                                                <a href="informationEdit.php">
                                                    <span class="icon yellow-bt hover">
                                                        <ion-icon name="create" size="large"></ion-icon>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <br />
                        <div class="pagination-container">
                            <ul class="pagination" style="justify-content: center; display: flex;">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>