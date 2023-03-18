<?php include 'inc/header.php'; ?>
<!-- Content Wrapper -->
<?php
if (isset($_GET['MaQuanTri'])) {
    $id = $_GET['MaQuanTri'];
    $delAd = $admin->delete_admin($id);
}
?>
<style>
    li.active>a {
        color: white !important;
        font-weight: bolder !important;
    }

    .not-data {
        width: 100%;
        text-align: center;
        margin: 100px 0px;
    }

    .not-data>h6 {
        font-style: italic;
        color: white;
    }
</style>
<div id="content-wrapper" class="d-flex flex-column">
    <?php
    if (isset($delAd)) {
        echo $delAd;
    }
    ?>

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
            <form method="GET" action="./adminSearch.php?tukhoa=" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input class="col-md-10" type="text" name="tukhoa" class="form-control bg-light border-0 small" placeholder="Tìm kiếm theo số điện thoại..." aria-label="Search" aria-describedby="basic-addon2">
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
                Quản trị viên
            </h1>
            <div>
                <a href="adminAdd.php" class="text-capitalize add-item-admin__btn">
                    <span class="icon white">
                        <ion-icon size="large" name="add-circle"></ion-icon>
                    </span>
                    <span class="add-item">Thêm</span>
                </a>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body" style="min-height: 500px;">
                    <?php
                        $adminall = $admin->getadmin();
                        if($adminall){
                    ?>
                    <div class="table-responsive" style="min-height: 500px;">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-capitalize text-center">
                                        <a href="">STT</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="">Họ và tên</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="">Tên đăng nhập</a>
                                    </th>
                                    <th class="text-capitalize text-center">
                                        <a href="">SĐT</a>
                                    </th>
                                    <th colspan="2" class="text-capitalize text-center">Tùy chọn</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $admin = $admin->getadmin_admin();
                                $admin_count = mysqli_num_rows($adminall);
                                $admin_button = ceil($admin_count / 5);
                                $i = 1;
                                if ($admin) {
                                    while ($result = $admin->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $result['MaQuanTri']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['Ten']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['TenDangNhap']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $result['SDT']; ?>
                                            </td>
                                            <td class="options">
                                                <a href="adminEdit.php?MaQuanTri=<?php echo $result['MaQuanTri'] ?>">
                                                    <span class="icon yellow-bt hover">
                                                        <ion-icon name="create" size="large"></ion-icon>
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="options">
                                                <a onClick="return confirm('Bạn có muốn xóa nhân viên <?php echo $result['Ten']; ?> không?')" href="?MaQuanTri=<?php echo $result['MaQuanTri'] ?>">
                                                    <span class="icon red-bt hover">
                                                        <ion-icon name="trash" size="large"></ion-icon>
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
                                <?php
                                for ($i; $i <= $admin_button; $i++) {
                                    echo '<li class="page-active" page="' . $i . '" style="margin: 0 4px 0 4px;"><a href="productList.php?Page=' . $i . '">' . $i . '</a></li>';
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
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>