<?php include 'inc/header.php'; ?>
<!-- Content Wrapper -->
<?php 
	$pd = new product();	
    if(isset($_GET['MaSanPham'])){
        $id = $_GET['MaSanPham'];
		$delPd = $product->delete_product($id);
    }
    
?>
<div id="content-wrapper" class="d-flex flex-column">
<?php
    if(isset($delPd)){
        echo $delPd;
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
            <form method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input class="col-md-10" type="text" name="timkiem" class="form-control bg-light border-0 small" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="basic-addon2">
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
                Sản Phẩm
            </h1>
            <div>
                <a href="sanpham_them.php" class="text-capitalize add-item-admin__btn">
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
                                        <a href="/admin/san-pham?sapxep=m%C3%A3%20t%C4%83ng%20d%E1%BA%A7n">M&#227; Sản Phẩm</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="/admin/san-pham?sapxep=lo%E1%BA%A1i%20A-Z">Loại sản phẩm</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="/admin/san-pham?sapxep=t%C3%AAn%20A-Z">T&#234;n Sản Phẩm</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="/admin/san-pham?sapxep=gi%C3%A1%20th%E1%BA%A5p%20%3E%20cao">Gi&#225;</a>
                                    </th>
                                    <th width="125px">
                                        Hình
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="/admin/san-pham?sapxep=t%E1%BB%93n%20kho%20th%E1%BA%A5p%20%3E%20cao">Tồn kho</a>
                                    </th>
                                    <th class="text-capitalize text-center">
                                        <a href="/admin/san-pham?sapxep=c%C3%B2n%20h%C3%A0ng">T&#236;nh trạng</a>
                                    </th>
                                    <th colspan="3" class="text-capitalize text-center">Tùy chọn</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $productall = $product->getproduct();
                                $product = $product->getproduct_admin();
                                $product_count = mysqli_num_rows($productall);
                                $product_button = ceil($product_count/5);
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
                                                <?php echo $result['Gia']; ?>
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
                                                <a href="sanpham_xem.php?MaSanPham=<?php echo $result['MaSanPham'] ?>">
                                                    <span class="icon green-bt hover">
                                                        <ion-icon name="eye" size="large"></ion-icon>
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="options">
                                                <a href="sanpham_sua.php?MaSanPham=<?php echo $result['MaSanPham'] ?>">
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
                        <span class="show-page-text text-white">Trang <?php echo $i?>/<?php echo $product_button ?></span>
                        
                        <div class="pagination-container">
                            <ul class="pagination">
                                <?php
                                    for($i;$i<=$product_button;$i++){
                                       echo '<li><a href="sanpham_danhsach.php?Page='.$i.'">'.$i.'</a></li>';
                                    }
                                ?>
                                <!-- <li class="active"><a>1</a></li>
                                <li><a href="/admin/san-pham?trang=2">2</a></li>
                                <li><a href="/admin/san-pham?trang=3">3</a></li>
                                <li><a href="/admin/san-pham?trang=4">4</a></li>
                                <li><a href="/admin/san-pham?trang=5">5</a></li>
                                <li><a href="/admin/san-pham?trang=6">6</a></li>
                                <li><a href="/admin/san-pham?trang=7">7</a></li>
                                <li><a href="/admin/san-pham?trang=8">8</a></li>
                                <li><a href="/admin/san-pham?trang=9">9</a></li>
                                <li><a href="/admin/san-pham?trang=10">10</a></li>
                                <li class="disabled PagedList-ellipses"><a>&#8230;</a></li>
                                <li class="PagedList-skipToNext"><a href="/admin/san-pham?trang=2" rel="next">»</a></li>
                                <li class="PagedList-skipToLast"><a href="/admin/san-pham?trang=11">»»</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>