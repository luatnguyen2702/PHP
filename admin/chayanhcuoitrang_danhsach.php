<?php include 'inc/header.php' ?>
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
        <h1 class=" mb-2 text-capitalize table-admin__title">Chạy ảnh cuối trang</h1>
        <div>
            <a href="/admin/chay-anh-cuoi-trang/them" class="text-capitalize add-item-admin__btn">
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
                                    Hình chạy cuối trang
                                </th>
                                <th colspan="2" class="text-capitalize text-center"> Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="text-center">
                                        <img class="slider-admin__img" src="https://images.unsplash.com/photo-1590080875515-8a3a8dc5735e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=580&amp;q=80"/>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/chinh-sua?id=6">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/xoa?id=6">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="slider-admin__img" src="https://images.unsplash.com/photo-1534119428213-bd2626145164?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=580&amp;q=80"/>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/chinh-sua?id=5">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/xoa?id=5">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="slider-admin__img" src="https://d1uz88p17r663j.cloudfront.net/original/2020_06_03T13_18_56_mrs_ImageRecipes_30117lrg.jpg"/>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/chinh-sua?id=4">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/xoa?id=4">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="slider-admin__img" src="https://media.cooky.vn/recipe/g4/37781/s320x320/cooky-recipe-cover-r37781.jpg"/>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/chinh-sua?id=3">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/xoa?id=3">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="slider-admin__img" src="https://d1uz88p17r663j.cloudfront.net/original/2020_06_03T13_22_19_mrs_ImageRecipes_147689lrg.jpg"/>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/chinh-sua?id=1">
                                            <span class="icon yellow-bt hover">
                                                <ion-icon name="create" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="/admin/chay-anh-cuoi-trang/xoa?id=1">
                                            <span class="icon red-bt hover">
                                                <ion-icon name="trash" size="large"></ion-icon>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <br />
                    
                </div>
            </div>
        </div>

    </div>