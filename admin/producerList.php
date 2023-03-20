<?php include 'inc/header.php'; ?>
<?php
$pd = new product();
if (isset($_GET['MaNhaSanXuat'])) {
    $id = $_GET['MaNhaSanXuat'];
    $delPd = $producer->delete_producer($id);
}
?>
<style>
    li.active > a  {
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
            <form method="GET" action="./producerSearch.php?tukhoa=" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                Nhà sản xuất
            </h1>
            <div>
                <a href="./producerAdd.php" class="text-capitalize add-item-admin__btn">
                    <span class="icon white">
                        <ion-icon size="large" name="add-circle"></ion-icon>
                    </span>
                    <span class="add-item">Thêm</span>
                </a>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-capitalize">
                                        <a href="#">M&#227; nh&#224; sản xuất</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="#">T&#234;n nh&#224; sản xuất</a>
                                    </th>
                                    <th colspan="2" class="text-capitalize text-center">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $producerall = $producer->getproducer();
                                $nhansanxuat = $producer->getproducer_admin();
                                $producer_count = mysqli_num_rows($producerall);
                                $producer_button = ceil($producer_count / 5);
                                $i = 1;
                                if ($nhansanxuat) {
                                    while ($result = $nhansanxuat->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['MaNhaSanXuat']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['TenNhaSanXuat']; ?>
                                            </td>
                                            <td class="options">
                                                <a href="producerEdit.php?MaNhaSanXuat=<?php echo $result['MaNhaSanXuat'] ?>">
                                                    <span class="icon yellow-bt hover">
                                                        <ion-icon name="create" size="large"></ion-icon>
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="options">
                                                <a onClick="return confirm('Bạn có muốn xóa nhà sản xuất <?php echo $result['TenNhaSanXuat']; ?> không?')" href="?MaNhaSanXuat=<?php echo $result['MaNhaSanXuat'] ?>">
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
                                for ($i; $i <= $producer_button; $i++) {
                                    echo '<li class="page-active" page="' . $i . '" style="margin: 0 4px 0 4px;"><a href="producerList.php?Page=' . $i . '">' . $i . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php include 'inc/footer.php'; ?>