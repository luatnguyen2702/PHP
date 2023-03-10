<?php include_once 'inc/header.php'; ?>
<?php
error_reporting(0);
if (!isset($_GET['MaSanPham']) || $_GET['MaSanPham'] == NULL) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $id = $_GET['MaSanPham'];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $SoLuong = $_POST['SoLuongAdd'];
    $MaSanPham =  $_POST['MaSanPham'];
    $sId = session_id();
    $addToCart = $cart->add_to_cart($MaSanPham, $SoLuong, $sId);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binhluan'])) {
    $addBinhLuan = $comment->addcomment($_POST,$id);
}
?>
<style>
    .user-input_ct {
        width: 100%;
        padding: 5px 10px;
        border: 1px solid var(--gray);
        border-color: var(--border-input-color);
        border-radius: 10px;
    }
</style>
<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <?php
    if (isset($addToCart)) {
        echo $addToCart;
    }
    if (isset($addBinhLuan)) {
        echo $addBinhLuan;
    }
    ?>
    <div class="container">
        <?php
        $get_details_id = $product->get_details_id($id);
        if ($get_details_id) {
            while ($product_details = $get_details_id->fetch_assoc()) {
        ?>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="img-fit detail" style="background-image: url('./admin/<?php echo $product_details['HinhChinh']; ?>'),url('./admin/images/default.png');"></div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-fit detail" style="background-image: url('./admin/<?php echo $product_details['HinhChinh']; ?>'),url('./admin/images/default.png');"></div>

                                </div>
                                <div class="carousel-item">
                                    <div class="img-fit detail" style="background-image: url('./admin/<?php echo $product_details['HinhChinh']; ?>'),url('./admin/images/default.png');"></div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                            <ol class="carousel-indicators" style="background-color: #2fa564;">
                                <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                    <img onerror="this.src='images/default.png'" class="d-block w-100 img-fluid" src="./admin/<?php echo $product_details['HinhChinh']; ?>" alt="" />
                                </li>
                                <li data-target="#carousel-example-1" data-slide-to="1">
                                    <img onerror="this.src='./admin/images/default.png'" class="d-block w-100 img-fluid" src="./admin/<?php echo $product_details['HinhChinh']; ?>" alt="" />
                                </li>
                                <li data-target="#carousel-example-1" data-slide-to="2">
                                    <img onerror="this.src='./admin/images/default.png'" class="d-block w-100 img-fluid" src="./admin/<?php echo $product_details['HinhChinh']; ?>" alt="" />
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="single-product-details">
                            <h2> <?php echo $product_details['TenSanPham']; ?> </h2>
                            <h5> <?php echo number_format($product_details['Gia'], 0, '', ',') . " vnđ"; ?> </h5>
                            <p class="available-stock font-weight-bold text-color ">
                                Có sẵn:
                                <span class="font-weight-normal text-lowercase"> <?php echo $product_details['SoLuongTonKho']; ?> </span> -
                                <span class="bg-primary text-white p-1 full-radius font-weight-normal"> Đã bán: <?php echo $product_details['SoLuongDaBan']; ?> </span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                Loại:
                                <span class="font-weight-normal"><?php echo $product_details['TenDanhMucCon']; ?></span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                Thương hiệu:
                                <span class="font-weight-normal"><?php echo $product_details['TenNhaSanXuat']; ?></span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                Điểm:
                                <span class="font-weight-normal"><?php echo $product_details['Diem']; ?></span>
                            <p>
                            <p class="available-stock">
                                <span class="like_num__label" style="color: #2fa564;">
                                    Yêu thích:
                                    <?php if ($product_details['TenNhaSanXuat'] > 0) { ?>
                                        <span style="color: black;" class="like_num__value"><?php echo $product_details['LuotYeuThich']; ?> lượt</span>
                                    <?php } else { ?>
                                        <span id="like_num__value" class="like_num__value">0</span>
                                    <?php } ?>

                                </span>
                            <p>
                            <h4>Mô Tả:</h4>
                            <p class="description-detail__product"> <?php echo $product_details['MoTa']; ?> </p>
                            <form action="" method="post">
                                <ul>
                                    <li class="max-width-mobile">
                                        <div class="quantity-box mb-1">
                                            <label class="control-label text-color mt-1">Số Lượng</label>
                                        </div>
                                        <div>
                                            <input class="user-input" value="1" min="1" name="SoLuongAdd" id="soluong" type="number" style="    text-align: center; margin: 0 10px; min-width: 100px; border-radius: var(--input-corner-radius); margin-bottom: 20px; width: 100%;" />
                                        </div>
                                    </li>
                                </ul>
                                <input hidden name="masanpham" id="masanpham" value="" />
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn max-btn">
                                        <!-- <input type="text" hidden name="SoLuongAdd" value="1" /> -->
                                        <input type="text" hidden name="MaSanPham" value="<?php echo $product_details['MaSanPham']; ?>" />
                                        <input type="submit" name="submit" class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" value="Thêm vào giỏ">
                                    </div>

                                    <!-- <div class="cart-and-bay-btn max-btn">
                                        <a data-product-id="" class="btn user-liked js-tongle-yeuthich"><i class="fas fa-heart"></i>Đã thích</a>
                                    </div>

                                    <div class="cart-and-bay-btn max-btn">
                                        <a data-product-id="" class="btn user-not-like js-tongle-yeuthich"><i class="far fa-heart"></i>Yêu thích</a>
                                    </div> -->


                                    <div class="cart-and-bay-btn max-btn">
                                        <a href="#" class="btn user-not-like "><i class="far fa-heart"></i>Yêu thích</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
        <div class="row" style="margin-top: 80px">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1 data-aos="fade-up" data-aos-easing="linear">Sản phẩm liên quan</h1>
                    <p data-aos="fade-up" data-aos-easing="linear">Chất lượng hàng đầu chúng tôi số 2 không ai số 1</p>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <?php
            $MaDanhMucCon = $product_details['MaDanhMucCon'];
            $product_buys = $product->getproduct_lienquan($MaDanhMucCon);
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
                                                <a href="#" class="heart-hover" data-toggle="tooltip" data-placement="right" title="Yêu thích">
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
        <?php
            }
        }
        ?>


        <div class="row my-5">
            <div class="card card-outline-secondary my-4" style="width: 100%;">
                <div class="card-header" style="background-color: #2fa564;">
                    <h2 style="padding: initial;color: white;">Đánh Giá Sản Phẩm</h2>
                </div>
                <div class="card-body">
                    <?php
                    $getcmt = $comment->getcomment($id);
                    if ($getcmt) {
                        while ($result_cmt = $getcmt->fetch_assoc()) {
                    ?>
                            <div class="media mb-3">
                                <div class="mr-2">
                                    <img style="width: 48px;" class="rounded-circle border p-1" src="./admin/<?php echo $result_cmt['AnhDaiDien'] ?>" alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <p><?php echo $result_cmt['NoiDung'] ?></p>
                                    <small class="text-muted">Đăng bởi <?php echo $result_cmt['Ten'] ?> vào <?php echo $result_cmt['NgayGio'] ?> </small>
                                </div>
                            </div>
                            <hr>
                        <?php
                        }
                    } else {
                        ?>
                        <p style="width: 100%;text-align: center;font-style: italic;margin: 0px 20px 20px;">Chưa có bình luận cho sản phẩm này!</p>
                    <?php
                    }
                    ?>

                    <?php
                    $check_login = Session::get('CTM_login');
                    if ($check_login == true) {
                    ?>
                        <form method="POST" action="">
                            <input name="NoiDung" placeholder="Nhập bình luận..." class="user-input_ct">

                </div>
                <input type="submit" name="binhluan" class="btn hvr-hover max-width-mobile" value="Để Lại Bình Luận"></input>
                </form>
            <?php
                    } else {
            ?>
                <input name="noidung" placeholder="Nhập bình luận..." class="user-input_ct" readonly>

            </div>
            <a href="dangnhap.php" class="btn hvr-hover max-width-mobile">Đăng nhập để bình Luận</a>
        <?php
                    }
        ?>


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
<?php

?>
<!-- End Shop Detail -->
<script>
    /* ..............................................
        Yêu thích
        ................................................ */
    $(".js-tongle-yeuthich").click(function(e) {
        var luotyeuthich = document.getElementById('like_num__value')
        var curentLike = parseInt(luotyeuthich.innerText)
        var element = $(e.target);
        $.post("/api/yeuthich", {
                MaSanPham: element.attr("data-product-id")
            })
            .done(function(result) {
                if (result == "cancel") {
                    showNotify('Đã xóa khỏi Yêu thích!', 'heart-dislike-outline')
                    element
                        .removeClass('user-liked')
                        .addClass('user-not-like')
                        .text("")
                        .append(`<i class="far fa-heart"></i>Yêu thích`)

                    curentLike--;
                    curentLike = curentLike < 0 ? 0 : curentLike;
                    luotyeuthich.innerText = (curentLike).toString();

                } else {
                    showNotify('Đã thêm vào Yêu thích!', 'heart-outline')
                    element
                        .removeClass('user-not-like')
                        .addClass('user-liked')
                        .text("")
                        .append(`<i class="fas fa-heart"></i>Đã thích`)

                    curentLike++;
                    luotyeuthich.innerText = (curentLike).toString();
                }
            }).fail(function() {
                alert("Xảy ra lỗi khi yêu thích!");
            });
    });

    /* ..............................................
    Xem thêm và bớt comment
    ................................................. */

    //Số comment mặc định ban đầu
    var x = 5;
    const actionCount = x;

    const eleHide = `.comment-item:nth-child(n + ${actionCount + 1})`
    $(eleHide).hide()

    if ($("#myList li").length <= actionCount) {
        $('#loadMore').hide();
    }
    $('#showLess').hide();


    //hàm xem thêm comment
    function LoadMoreComment() {
        size_li = $("#myList li").length;
        x = (x + actionCount <= size_li) ? x + actionCount : size_li;
        $('#myList li:lt(' + x + ')').show();
        $('#myList li:lt(' + x + ')').css("display", "flex")
        $('#showLess').show();
        if (x >= size_li) {
            $('#loadMore').hide();
        }
    };

    //hàm ẩn bớt comment
    function ShowLessComment() {
        size_li = $("#myList li").length;
        x = (x - actionCount <= actionCount) ? actionCount : x - actionCount;
        $('#myList li').not(':lt(' + x + ')').hide();
        $('#loadMore').show();
        $('#showLess').show();
        if (x <= actionCount) {
            $('#showLess').hide();
        }
    };
    //Thêm sự kiện onclick 2 nút
    $('#loadMore').click(LoadMoreComment)
    $('#showLess').click(ShowLessComment)

    /* ..............................................
    load list curent comment user
    ................................................. */

    // hàm load bình luận
    function loadBinhLuan() {
        var maSP = $('input[name="masanpham"]').val();
        var noiDung = $('input[name="noidung"]').val();

        $.ajax({
            url: "/SanPhams/Binhluan",
            //type: "POST",
            data: {
                masanpham: maSP,
                noidung: noiDung
            },
            success: function(res) {
                $('#list-comment__product-detail').html(res)
                $('input[name="noidung"]').val("")

                var currentAvt = $('#currentUser').first().attr('src');
                var currentName = $('#currentUser').first().attr('user-name');
                var currentEmail = $('#currentUser').first().attr('user-email');
                var currentDate = $('#currentUser').first().attr('date');

                // Avt cmt hiện tại
                $(".user-avatar__comment").first().attr("src", currentAvt);

                //Day cmt hiện tại
                if (currentName != null) {
                    $('.user-comment__day').first().html(`Đăng bởi ${currentName} - ${currentDate}`)
                } else {
                    $('.user-comment__day').first().html(`Đăng bởi ${currentEmail} - ${currentDate}`)
                }

                $('#showLess').hide();
                if ($("#myList li").length > actionCount) {
                    $(eleHide).hide()
                    $('#loadMore').show();
                }
            },
            error: function() {
                alert("Xảy ra lỗi khi bình luận!");
            }
        })
    }

    $('#post-comment').click(loadBinhLuan);
    $('input[name="noidung"]').keypress(function(ele) {
        if (ele.keyCode == 13) {
            loadBinhLuan();
        }
    })

    /* ..............................................
        Thông báo thêm quá số lượng sản phẩm tồn kho
       ................................................. */
    function ThongBaoQuaSoLuong() {
        if (parseInt($('input[name="soluong"]').val()) > parseInt($('input[name="soluong"]').attr('max'))) {
            $('input[name="soluong"]').val(parseInt($('input[name="soluong"]').attr('max')));
            $('.message-max').show();
            setTimeout(function() {
                $('.message-max').hide();
            }, 1000);
        } else {
            $('.message-max').hide();
        }

        if (parseInt($('input[name="soluong"]').val()) <= 1) {
            $('input[name="soluong"]').val(1)
        }
    }

    $('.message-max').hide();
    //$('input[name="soluong"]').change(ThongBaoQuaSoLuong);
    $('input[name="soluong"]').on("input", ThongBaoQuaSoLuong)
</script>

<?php include 'inc/footer.php'; ?>