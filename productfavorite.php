<?php include 'inc/header.php'; ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Yêu Thích</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="profile.php">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Yêu Thích</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-left">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-9 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span>Sắp xếp</span>
                                <select id="basic" name="sapxep" class="selectpicker show-tick form-control" data-placeholder="$ USD">

                                    <option value="mac-dinh">Không</option>
                                    <option value="ten-A-Z">Tên A → Z</option>
                                    <option value="ten-Z-A">Tên Z → A</option>
                                    <option value="gia-thap-cao">Giá Thấp → Giá Cao</option>
                                    <option value="gia-cao-thap">Giá Cao → Giá Thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div id="view-sp">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <!--Start grid view-->
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row" id="grid-products">
                                        <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 parent">
                                            <div class="products-single fix shadow full-radius">
                                                <div class="box-img-hover none-radius">
                                                    <div class="type-lb show" value="SP01">
                                                        <p class="like bottom-left-radius text-capitalize">Đã thích</p>
                                                    </div>
                                                    <div class="img-fit product-mobile " style="background-image: url('/UploadedFiles/images/VK7g7lgly8Gtm5LrtZoT_simg_b5529c_320x320_maxb.jpg'),url('/Content/images/default.png');">
                                                    </div>
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="/cua-hang/san-pham?id=SP01" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                                            <li>
                                                                <a product-data="SP01" class="heart-hover js-tongle-like" data-toggle="tooltip" data-placement="right" title="Yêu thích">
                                                                    <i class="fas fa-heart liked-heart-icon"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <a class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" href="/them-vao-gio?masanpham=SP01&soluong=1">Thêm Vào Giỏ</a>
                                                    </div>
                                                </div>
                                                <div class="why-text view-row-content">
                                                    <h4 class="name-product">B&#193;NH DẺO XỐP NH&#194;N D&#194;U</h4>
                                                    <h5 class="price-product">45,000 đ</h5>
                                                    <a href="/them-vao-gio?masanpham=SP01&soluong=1" class="btn register hvr-hover text-capitalize add-cart-notify max-width-mobile show-in-mobile font-weight-bold font-size-mobile mt-1">Thêm vào giỏ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End grid view-->
                                <!--Start list view-->

                                <!--End list view-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
                <div class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" style="margin: auto; width: 100px;">
                    <button onclick="history.back()" style="background: transparent; border-color: transparent; color: white;">Trở lại</button>
                </div>
            </div>
</div>
<!-- End Shop Page -->
<?php include 'inc/footer.php'; ?>