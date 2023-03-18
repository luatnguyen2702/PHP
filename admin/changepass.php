<?php include 'inc/header.php'; ?>
<style>
    @media (min-width: 1200px){
        .col-xl-6 {
        flex: 0 0 50%;
        }
    }
    @media (min-width: 992px){
        .col-lg-6 {
            flex: 0 0 50%;
        }   
    }
    @media (min-width: 768px){
        .col-md-6 {
            flex: 0 0 50%;
        }
    }
    @media (min-width: 576px){
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
            <h1 class="mb-2 text-capitalize table-admin__title" style="text-align: center;">
                Đổi mật khẩu
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4" style="min-height: 510px;">

                
                    <form action="" class="form-horizontal mt-3 review-form-box" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group" style="margin: 20px 0px;">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                                <div class="user-input__label custom_text">Mật khẩu hiện tại</div>
                                <input class="form-control user-input" type="password" name="OldPassword" placeholder="Nhập mật khẩu cũ" />
                            </div>
                        </div>
                        <div class="form-group" style="margin: 20px 0px;">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                                <div class="user-input__label custom_text">Mật khẩu mới</div>
                                <input class="form-control user-input" type="password" name="NewPassword" placeholder="Nhập mật khẩu mới" />
                            </div>
                        </div>
                        <div class="form-group" style="margin: 20px 0px;">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                                <div class="user-input__label custom_text">Xác nhận mật khẩu mới</div>
                                <input class="form-control user-input" type="password" name="ConfirmPassword" placeholder="Nhập lại mật khẩu mới" />
                            </div>
                        </div>
                        <div class="form-group" style="margin: 40px 0px;">
                            <div class="col-md-offset-2 col-md-12 btn-update-info__wrap " style="text-align: center;">
                                <input type="submit" class="btn hvr-hover max-width-mobile text-capitalize m-auto p-2" value="Xác nhận" name="save"  style="background-color: #2fa564;color: white;"/>
                            </div>
                        </div>
                    </form>
                
            </div>

        </div>
        <?php include 'inc/footer.php'; ?>