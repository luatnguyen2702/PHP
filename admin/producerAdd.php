<?php include 'inc/header.php'; ?>
<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $addProducer = $producer->add_producer($_POST);
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
    if (isset($addProducer)) {
        echo  $addProducer;
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
                Thêm nhà sản xuất
            </h3>
            <!-- DataTales Example -->
            <div class="card shadow mb-4" style="min-height: 520px;display: flex;align-items: center;justify-content: center;">
                <form action="#" class="form-horizontal-custom mt-3 review-form-box" method="POST" role="form" enctype="multipart/form-data" style="margin-top: 0 !important;">
                    <div class="form-group" style="margin: 20px 0px;">
                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                            <div class="user-input__label custom_text">Tên nhà sản xuất</div>
                            <input class="form-control user-input" name="TenNhaSanXuat" type="text" value="<?php echo $result['TenNhaSanXuat'] ?>" style="text-align: center;" />
                        </div>
                    </div>
            <?php
            ?>
            <div class="form-group col-md-12">
                <div class="col-md-offset-2 btn-touch">
                    <input type="submit" name="submit" value="Thêm" class="btn btn-warning" style="    background-color: #2fa564;border-color: #2fa564;" />
                </div>
            </div>
            <div class="col-md-12 back-to-list ">
                <a href="producerList.php">Trở lại</a>
            </div>
            </div>
            </form>
        </div>
        <?php include 'inc/footer.php'; ?>