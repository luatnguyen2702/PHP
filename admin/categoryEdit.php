<?php include 'inc/header.php'; ?>
<?php
error_reporting(0);
if (!isset($_GET['MaDanhMucCon']) || $_GET['MaDanhMucCon'] == NULL) {
    echo "<script>window.location = 'categoryList.php'</script>";
} else {
    $id = $_GET['MaDanhMucCon'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCate = $category->update_category($_POST, $id);
}
?>
<style>
    @media (min-width: 750px) {
        .form-horizontal-custom {
            width: 50%;
            /* margin: auto; */
        }
    }

    @media (min-width: 1200px) {
        .col-xl-6 {
            flex: 0 0 50%;
        }
    }

    @media (min-width: 992px) {
        .col-lg-6 {
            flex: 0 0 50%;
        }
    }

    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 50%;
        }
    }

    @media (min-width: 576px) {
        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .custom_text {
        text-align: center;
        color: #2fa564;
        margin: 15px 20px;
        font-size: 18px;
    }
</style>
<div id="content-wrapper" class="d-flex flex-column">
    <?php
    if (isset($updateCate)) {
        echo  $updateCate;
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
            <h3 class="mb-2 text-capitalize table-admin__title" style="text-align: center;">
                Thay đổi thông tin loại sản phẩm
            </h3>
            <!-- DataTales Example -->
            <div class="card shadow mb-4" style="min-height: 520px;display: flex;align-items: center;justify-content: center;">
                <form action="#" class="form-horizontal-custom mt-3 review-form-box" method="POST" role="form" enctype="multipart/form-data" style="margin-top: 0 !important;">
                    <div class="form-group" style="margin: 20px 0px;">
                        <?php
                        $categoryEdit = $category->get_details_category($id);
                        if ($categoryEdit) {
                            while ($result = $categoryEdit->fetch_assoc()) {
                        ?>
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                                    <div class="user-input__label custom_text">Mã loại</div>
                                    <input class="form-control user-input" readonly placeholder="<?php echo $result['MaDanhMucCon'] ?>" style="text-align: center;" />
                                </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Tên Danh Mục</span>
                        <div class="col-md-12">
                            <select class="form-control" name="MaDanhMuc">
                                <?php
                                $category_list = $category->getcategory();
                                if ($category_list) {
                                    while ($result_category = $category_list->fetch_assoc()) {
                                ?>
                                        <option <?php
                                                if ($result['MaDanhMuc'] == $result_category['MaDanhMuc']) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $result_category['MaDanhMuc'] ?>"><?php echo $result_category['TenDanhMuc'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin: 20px 0px;">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                            <div class="user-input__label custom_text" style="margin: 0;">Tên loại sản phẩm
                                <input class="form-control user-input" name="TenDanhMucCon" type="text" value="<?php echo $result['TenDanhMucCon'] ?>" style="text-align: center; margin-top: 12px;" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin: 20px 0px;">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                            <div class="user-input__label custom_text" style="margin: 0;">Hình ảnh (url)
                                <input class="form-control user-input" name="HinhAnh" type="text" value="<?php echo $result['HinhAnh'] ?>" style="text-align: center; margin-top: 12px;" />
                            </div>
                        </div>
                    </div>
            <?php
                            }
                        }
            ?>

            <div class="form-group col-md-12">
                <div class="col-md-offset-2 btn-touch">
                    <input type="submit" name="submit" value="Cập nhật" class="btn btn-warning" style="    background-color: #2fa564;border-color: #2fa564;" />
                </div>
            </div>
            <div class="col-md-12 back-to-list ">
                <a href="categoryList.php">Trở lại</a>
            </div>
            </div>
            </form>
        </div>
        <?php include 'inc/footer.php'; ?>