<?php include 'inc/header.php'; ?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cửa hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">Cửa Hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-left" id="sapxep">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-9 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span>Sắp xếp</span>
                                <select id="basic" name="sapxep" class="selectpicker show-tick form-control" data-placeholder="$ USD" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="?field=MaSanPham&sort=DESC">Không</option>
                                    <option value="?field=TenSanPham&sort=ASC">Tên A → Z</option>
                                    <option value="?field=TenSanPham&sort=DESC">Tên Z → A</option>
                                    <option value="?field=Gia&sort=ASC">Giá Thấp → Giá Cao</option>
                                    <option value="?field=Gia&sort=DESC">Giá Cao → Giá Thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 text-center text-sm-right option-view">
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
                                        <?php
                                        $product_only12 = $product->getproduct_only12();
                                        if ($product_only12) {
                                            while ($result = $product_only12->fetch_assoc()) {
                                        ?>
                                                <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 parent">
                                                    <div class="products-single fix shadow full-radius">
                                                        <div class="box-img-hover none-radius">
                                                            <div class="type-lb" value="SP02">
                                                                <p class="like bottom-left-radius text-capitalize">Đã thích</p>
                                                            </div>
                                                            <div class="img-fit product-mobile " style="background-image: url('./admin/<?php echo $result['HinhChinh']; ?>'),url('../admin/images/default.png');">
                                                            </div>
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                                                    <li>
                                                                        <a product-data="SP02" class="heart-hover js-tongle-like" data-toggle="tooltip" data-placement="right" title="Yêu thích">
                                                                            <i class="far fa-heart not-like-heart-icon"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <a class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" href="details.php?MaSanPham=<?php echo $result['MaSanPham']; ?>">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                        <div class="why-text view-row-content">
                                                            <h4 class="name-product"><?php echo $result['TenSanPham']; ?></h4>
                                                            <h5 class="price-product"><?php echo number_format($result['Gia'], 0, '', ',') . ' vnđ'; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
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
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="search.php?" method="GET">
                            <input class="form-control" name="tukhoa" placeholder="Tìm kiếm..." type="text">
                            <button name="timkiem" value="Tìm kiếm"><i class="fa fa-search"></i></button>
                        </form>                        
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Phân Loại</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php
                            $danhmuc = $category->getdanhmuc();
                            if ($danhmuc) {
                                while ($result_danhmuc = $danhmuc->fetch_assoc()) {
                            ?>
                                    <div class="list-group-collapse sub-men">
                                        <a data-toggle="collapse" aria-expanded="true" aria-controls="<?php echo $result_danhmuc['MaDanhMuc']; ?>" class="list-group-item list-group-item-action group-menu-title" href="#MDM<?php echo $result_danhmuc['MaDanhMuc']; ?>">
                                            <?php echo $result_danhmuc['TenDanhMuc']; ?>
                                            <small value="MDM<?php echo $result_danhmuc['MaDanhMuc']; ?>" class="text-muted text-lowercase quantity-small quantity-dmc">
                                            <?php 
                                                // $danhmuccon = $categorysub->getdanhmuccon($result_danhmuc['MaDanhMuc']);
                                                // $soloaisp = mysqli_num_rows($danhmuccon);
                                                // echo '(' . $soloaisp . ')' ;
                                            ?>
                                            </small>
                                            <i class="fas fa-chevron-down arrow-down float-right"></i>
                                        </a>
                                        <div class="danh-muc collapse" id="MDM<?php echo $result_danhmuc['MaDanhMuc']; ?>" data-parent="#list-group-men">
                                            <div class="list-group group-danhmucon MDM<?php echo $result_danhmuc['MaDanhMuc']; ?>">
                                                <?php
                                                $danhmuccon = $categorysub->getdanhmuccon($result_danhmuc['MaDanhMuc']);
                                                // $soloaisp = mysqli_num_rows($danhmuccon);
                                                // echo $soloaisp;
                                                if ($danhmuccon) {
                                                    while ($result_danhmuccon = $danhmuccon->fetch_assoc()) {
                                                ?>
                                                        <a href="productbycatesub.php?MaDanhMucCon=<?php echo $result_danhmuccon['MaDanhMucCon']; ?>" class="danh-muc-con list-group-item list-group-item-action text-capitalize">
                                                            <?php echo $result_danhmuccon['TenDanhMucCon']; ?>
                                                            <small value="LSP01" class="text-muted quantity-small loai-sp"></small>
                                                        </a>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
        <div class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" style="margin: auto; width: 100px;">
            <button onclick="history.back()" style="background: transparent;
    border-color: transparent;
    color: white;">Trở lại</button>
        </div>
    </div>
</div>
<!-- End Shop Page -->


<?php include 'inc/footer.php'; ?>