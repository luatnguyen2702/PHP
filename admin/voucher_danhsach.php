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
        <form method="post" action="/admin/voucher" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    <img class="img-profile rounded-circle"
                         src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->

            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class=" mb-2 text-capitalize table-admin__title">
            Voucher
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
                                    <a href="/admin/voucher?sapxep=m%C3%A3%20t%C4%83ng%20d%E1%BA%A7n">M&#227; voucher</a>
                                </th>
                                <th class="text-capitalize">
                                    <a href="/admin/voucher?sapxep=t%C3%AAn%20A-Z">T&#234;n Voucher</a>
                                </th>
                                <th class="text-capitalize">
                                    <a href="/admin/voucher?sapxep=gi%C3%A1%20tr%E1%BB%8B%20th%E1%BA%A5p%20%3E%20cao">Gi&#225; trị</a>
                                </th>
                                <th class="text-capitalize">
                                    Điểm đổi
                                </th>
                                <th class="text-capitalize">
                                    <a href="/admin/voucher?sapxep=h%E1%BA%A1n%20s%E1%BB%AD%20d%E1%BB%A5ng%20t%C4%83ng%20d%E1%BA%A7n">Hạn Sử Dụng</a>
                                </th>
                                <th colspan="2" class="text-capitalize text-center"> Tùy chọn</th>
                            </tr>
                        </thead>

                        <tbody>
                                <tr>
                                    <td>
                                        BLCKFR21
                                    </td>
                                    <td>
                                        Back Friday Hot
                                    </td>
                                    <td>
                                        40%
                                    </td>
                                    <td>
                                        4000
                                    </td>
                                    <td>
                                        07-01-2022
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/chinh-sua?id=BLCKFR21">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/xoa?id=BLCKFR21">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NOELVUI
                                    </td>
                                    <td>
                                        Gi&#225;ng sinh an l&#224;nh
                                    </td>
                                    <td>
                                        50%
                                    </td>
                                    <td>
                                        5000
                                    </td>
                                    <td>
                                        23-12-2021
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/chinh-sua?id=NOELVUI">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/xoa?id=NOELVUI">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        SALE10
                                    </td>
                                    <td>
                                        Giảm 10% đơn h&#224;ng
                                    </td>
                                    <td>
                                        10%
                                    </td>
                                    <td>
                                        1000
                                    </td>
                                    <td>
                                        17-12-2021
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/chinh-sua?id=SALE10">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/voucher/xoa?id=SALE10">
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

                    <div class="pagination-container"><ul class="pagination"><li class="active"><a>1</a></li></ul></div>
                </div>
            </div>
        </div>

    </div>