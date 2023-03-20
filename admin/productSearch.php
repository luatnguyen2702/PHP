<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['MaSanPham'])) {
    $id = $_GET['MaSanPham'];
    $delPd = $product->delete_product($id);
}
if (isset($_GET['tukhoa'])) {
    $tukhoa = $_GET['tukhoa'];
} else {
    $tukhoa = '';
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
            <!-- Topbar Search -->
            <form method="GET" action="./productSearch.php?tukhoa=" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input class="col-md-10" type="text" name="tukhoa" class="form-control bg-light border-0 small" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append col-md-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Topbar Navbar -->
            <!-- Topbar Navbar -->

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
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
                Sản phẩm
            </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php
                    $productall = $product->getproduct_seach($tukhoa);
                    if ($productall) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize">
                                            <a href="">M&#227; Sản Phẩm</a>
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Loại sản phẩm</a>
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">T&#234;n Sản Phẩm</a>
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Gi&#225;</a>
                                        </th>
                                        <th width="125px">
                                            Hình
                                        </th>
                                        <th class="text-capitalize">
                                            <a href="">Tồn kho</a>
                                        </th>
                                        <th class="text-capitalize text-center">
                                            <a href="">T&#236;nh trạng</a>
                                        </th>
                                        <th colspan="3" class="text-capitalize text-center">Tùy chọn</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $product = $product->getproduct_admin_search($tukhoa);
                                    $product_count = mysqli_num_rows($productall);
                                    $product_button = ceil($product_count / 5);
                                    $i = 1;
                                    if ($product) {
                                        while ($result = $product->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $result['MaSanPham']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['MaDanhMucCon']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['TenSanPham']; ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($result['Gia'], 0, '', ','); ?>
                                                </td>
                                                <td>
                                                    <div class="img-fit cart" style="background-image: url('../admin/<?php echo $result['HinhChinh']; ?>'),url('../admin/images/default.png');">
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $result['SoLuongTonKho']; ?>
                                                </td>

                                                <td>
                                                    <span class="icon green">
                                                        <ion-icon name="checkmark-circle"></ion-icon>
                                                    </span>
                                                </td>
                                                <td class="options">
                                                    <a href="productView.php?MaSanPham=<?php echo $result['MaSanPham'] ?>">
                                                        <span class="icon green-bt hover">
                                                            <ion-icon name="eye" size="large"></ion-icon>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="options">
                                                    <a href="productEdit.php?MaSanPham=<?php echo $result['MaSanPham'] ?>">
                                                        <span class="icon yellow-bt hover">
                                                            <ion-icon name="create" size="large"></ion-icon>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="options">
                                                    <a onClick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $result['TenSanPham']; ?> không?')" href="?MaSanPham=<?php echo $result['MaSanPham'] ?>">
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
                                    for ($i; $i <= $product_button; $i++) {
                                        echo '<li class="page-active" page="' . $i . '" style="margin: 0 4px 0 4px;"><a href="productSearch.php?tukhoa=' . $tukhoa . '&Page=' . $i . '">' . $i . '</a></li>';
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
                        <a href="productList.php">Trở lại</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include 'inc/footer.php'; ?>