<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/slider.php'; ?>
<?php

?>
<style>
    .mask-icon input.cart {
        background: var(--primary-color);
        position: absolute;
        bottom: 0;
        left: 0px;
        padding: 10px 20px;
        font-weight: 700;
        color: #222;
        transition: all linear 0.2s;
    }
</style>
<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1 data-aos="fade-up" data-aos-easing="linear">Sản phẩm Mới Nhất</h1>
                    <p data-aos="fade-up" data-aos-easing="linear">Sản phẩm mới nhập về của luonvuituoiStore.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $product_new = $product->getproduct_new();
            if ($product_new) {
                while ($new = $product_new->fetch_assoc()) {
            ?>
                    <div class="col-md-6 col-lg-4 col-xl-4" data-aos="zoom-in-up" data-aos-delay="500" data-aos-easing="linear">
                        <div class="blog-box full-radius shadow flex-column">
                            <div class="box-img none-radius">
                                <a href="details.php?MaSanPham=<?php echo $new['MaSanPham']; ?>">
                                    <div class="type-lb show">
                                        <p class="new bottom-left-radius">Mới nhất</p>
                                    </div>
                                    <div class="img-fit product-mobile" style="background-image: url('./admin/<?php echo $new['HinhChinh'] ?>'),url('./admin/images/default.png');">
                                    </div>
                                </a>

                            </div>
                            <div class="blog-content flex-grow-1 flex-shrink-1">
                                <div class="title-blog view-row-content ">
                                    <h4><?php echo $new['TenSanPham']; ?></h4>
                                    <p class="new-product-descrip" style="color: black;">
                                        <?php echo $new['MoTa']; ?>
                                    </p>
                                </div>
                                <ul class="option-blog">
                                    <li style="display: block;"><a style="width: 100%;" href="details.php?MaSanPham=<?php echo $new['MaSanPham']; ?>"><i class="fas fa-eye"></i></a></li>
                                </ul>
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
<!-- End Blog  -->

<div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-down" data-aos-duration="1000">
                <div class="offer-box-products">
                    <img class="img-fluid" src="./admin/images/add-img-01.jpg" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-down" data-aos-duration="1000">
                <div class="offer-box-products">
                    <img class="img-fluid" src="./admin/images/add-img-02.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1 data-aos="fade-up" data-aos-easing="linear">Sản phẩm bán chạy</h1>
                    <p data-aos="fade-up" data-aos-easing="linear">Chất lượng hàng đầu chúng tôi số 2 không ai số 1</p>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <?php
            $product_buys = $product->getproduct_buys();
            if ($product_buys) {
                while ($buys = $product_buys->fetch_assoc()) {
            ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 special-grid best-seller">
                        <div class="products-single fix shadow full-radius">
                            <div class="box-img-hover none-radius">
                                <div class="type-lb show">
                                    <p class="hot bottom-left-radius">Best Sale</p>
                                </div>
                                <div class="img-fit product-mobile " style="background-image: url('./admin/<?php echo $buys['HinhChinh'] ?>')">
                                </div>
                                <div class="mask-icon">
                                    <form action="" method="POST">
                                        <ul>
                                            <li><a href="details.php?MaSanPham=<?php echo $buys['MaSanPham']; ?>" data-toggle="tooltip" data-placement="right" title="Chi tiết"><i class="fas fa-eye"></i></a></li>
                                            <li>
                                                <a href="" class="heart-hover" data-toggle="tooltip" data-placement="right" title="Yêu thích">
                                                    <i class="far fa-heart not-like-heart-icon"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <a class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" href="details.php?MaSanPham=<?php echo $buys['MaSanPham']; ?>" name="submit">Xem chi tiết</a>
                                        <!-- <input type="text" hidden name="SoLuong" value="1" />
                                    <input type="text" hidden name="MaSanPham" value="<?php echo $buys['MaSanPham']; ?>" />
                                    <input type="submit" name="submit" class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" value="Thêm vào giỏ">  -->
                                    </form>
                                </div>
                            </div>
                            <div class="why-text view-row-content">
                                <h4><?php echo $buys['TenSanPham'] ?></h4>
                                <h5><?php echo number_format($buys['Gia'], 0, '', ','); ?> vnđ</h5>
                                <a href="" class="btn register hvr-hover text-capitalize add-cart-notify max-width-mobile show-in-mobile font-weight-bold font-size-mobile mt-1">Thêm vào giỏ</a>
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
<!-- End Products  -->

<?php include 'inc/footer.php'; ?>