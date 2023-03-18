<?php include 'inc/header.php'; ?>
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
            <form method="post" action="/admin/danh-muc" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                Danh mục
            </h1>
            <div>
                <a href="/admin/danh-muc/them" class="text-capitalize add-item-admin__btn">
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
                                        <a href="/admin/danh-muc?sapxep=m%C3%A3%20t%C4%83ng%20d%E1%BA%A7n">M&#227; Danh Mục</a>
                                    </th>
                                    <th class="text-capitalize">
                                        <a href="/admin/danh-muc?sapxep=t%C3%AAn%20A-Z">T&#234;n Danh Mục</a>
                                    </th>
                                    <th colspan="2" class="text-capitalize text-center">Tùy chọn</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        DM01
                                    </td>
                                    <td>
                                        B&#225;nh
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/chinh-sua?id=DM01">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/xoa?id=DM01">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DM02
                                    </td>
                                    <td>
                                        Kẹo
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/chinh-sua?id=DM02">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/xoa?id=DM02">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DM03
                                    </td>
                                    <td>
                                        Mứt
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/chinh-sua?id=DM03">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/xoa?id=DM03">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DM04
                                    </td>
                                    <td>
                                        S&#237;nh lễ cưới
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/chinh-sua?id=DM04">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/danh-muc/xoa?id=DM04">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <span class="show-page-text text-white">Trang 1 / 1</span>

                        <div class="pagination-container">
                            <ul class="pagination">
                                <li class="active"><a>1</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>