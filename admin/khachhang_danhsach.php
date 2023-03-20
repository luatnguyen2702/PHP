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
            Khách Hàng
        </h1>
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
                                <th class="text-capitalize text-center">
                                    <a href="/admin/khach-hang?sapxep=x%C3%A1c%20th%E1%BB%B1c">X&#225;c thực</a>
                                </th>
                                <th class="text-capitalize">
                                    sđt
                                </th>
                                <th class="text-capitalize">
                                    <a href="/admin/khach-hang?sapxep=%C4%91i%E1%BB%83m%20cao%20%3E%20th%E1%BA%A5p">Điểm t&#237;ch lũy</a>
                                </th>

                                
                            </tr>
                        </thead>

                        <tbody>
                                <tr>
                                    <td>
                                        Tang Thuan Phat
                                    </td>
                                    <td>
                                        tangphat092000@gmail.com
                                    </td>

                                        <td>
                                            <span class="icon green">
                                                <ion-icon name="checkmark-circle"></ion-icon>
                                            </span>
                                        </td>
                                    <td>
                                        0937800163
                                    </td>
                                    <td>
                                        37260
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