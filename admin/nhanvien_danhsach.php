<?php include 'inc/header.php'; ?>
<div id="content-wrapper" class="d-flex flex-column">
            
<link href="/Content/PagedList.css" rel="stylesheet" type="text/css" />


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
        <form method="post" action="/admin/khach-hang" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
            <!-- Nav Item - User Information -->
            <!--<li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    <img class="img-profile rounded-circle"
                         src="img/undraw_profile.svg">
                </a>-->
                <!-- Dropdown - User Information -->

            <!--</li>-->

        </ul>

    </nav>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-2 text-capitalize table-admin__title">
            Nhân viên
        </h1>
        <div>
            <a href="/admin/voucher/them" class="text-capitalize add-item-admin__btn">
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
                                    <a href="/admin/khach-hang?sapxep=t%C3%AAn%20A-Z">T&#234;n</a>
                                </th>
                                <th class="text-capitalize">
                                    Email
                                </th>
                                <th class="text-capitalize">
                                    sđt
                                </th>
                                <th class="text-capitalize">
                                    <a href="">Cấp bậc</a>
                                </th>

                                
                            </tr>
                        </thead>

                        <tbody>
                                <tr>
                                    <td>
                                        Trần Nguyên Lộc
                                    </td>
                                    <td>
                                        trannguyenloc@gmail.com
                                    </td>
                                    <td>
                                        0773922314
                                    </td>
                                    <td>
                                        1
                                    </td>
                                </tr>
                                
                        </tbody>
                    </table>
                    <br />
                    <span class="show-page-text text-white">Trang 1 / 2</span>

                    <div class="pagination-container"><ul class="pagination"><li class="active"><a>1</a></li><li><a href="/admin/khach-hang?trang=2">2</a></li><li class="PagedList-skipToNext"><a href="/admin/khach-hang?trang=2" rel="next">»</a></li></ul></div>
                </div>
            </div>
        </div>

    </div>