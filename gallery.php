<?php include 'inc/header.php' ?>

<style>
    .gallery__name_fix {
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
        padding: 5px 5px;
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        word-break: break-all;
        color: #fff;
        background: linear-gradient(180deg, transparent, #222);
        z-index: 2;
        transition: all ease-in .1s;
    }
</style>

<!-- Start Gallery  -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Bộ Sưu Tập</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Bộ Sưu Tập</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Gallery  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1 data-aos="fade-up" data-aos-easing="linear">Danh Mục</h1>
                    <p data-aos="fade-up" data-aos-easing="linear">Các sản phẩm luôn mới nhất, rẻ nhất và chất lượng nhất.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*" data-aos="fade-up">Tất cả</button>
                        <?php
                        $danhmuc = $category->getdanhmuc();
                        if ($danhmuc) {
                            $i = 0;
                            while ($result_danhmuc = $danhmuc->fetch_assoc()) {
                                $i += 100;
                        ?>
                                <button data-filter=".<?php echo $result_danhmuc['MaDanhMuc']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>" data-aos-easing="linear"><?php echo $result_danhmuc['TenDanhMuc']; ?></button>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list" data-aos="fade-up" data-aos-easing="linear">
            <?php
            $getdanhmucconall = $categorysub->getdanhmucconall();
            if ($getdanhmucconall) {
                while ($result = $getdanhmucconall->fetch_assoc()) {
            ?>
                    <div class="col-lg-3 col-md-6 special-grid <?php echo $result['MaDanhMuc'] ?>">
                        <div class="products-single fix shadow gallery-box">
                            <div class="box-img-hover ">
                                <a href="productbycatesub.php?MaDanhMucCon=<?php echo $result['MaDanhMucCon']; ?>">
                                    <div class="img-fit gallery" style="background-image: url('<?php echo $result['HinhAnh'] ?>'),url('./admin/images/default.png');"></div>
                                    <span class="gallery__name_fix"><?php echo $result['TenDanhMucCon'] ?></span>
                                    <span class="mask"></span>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
    <div class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" style="margin: auto; width: 100px;">
        <button onclick="history.back()" style="background: transparent;
    border-color: transparent;
    color: white;">Trở lại</button>
    </div>
</div>
    <!-- End Gallery  -->
    <?php include 'inc/footer.php' ?>