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
                            <h5> <?php echo number_format($product_details['Gia'], 0, '', ',') . " vn??"; ?> </h5>
                            <p class="available-stock font-weight-bold text-color ">
                                C?? s???n:
                                <span class="font-weight-normal text-lowercase"> <?php echo $product_details['SoLuongTonKho']; ?> </span> -
                                <span class="bg-primary text-white p-1 full-radius font-weight-normal"> ???? b??n: <?php echo $product_details['SoLuongDaBan']; ?> </span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                Lo???i:
                                <span class="font-weight-normal"><?php echo $product_details['TenDanhMucCon']; ?></span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                Th????ng hi???u:
                                <span class="font-weight-normal"><?php echo $product_details['TenNhaSanXuat']; ?></span>
                            <p>
                            <p class="available-stock font-weight-bold text-color  mt-1 mb-1">
                                ??i???m:
                                <span class="font-weight-normal"><?php echo $product_details['Diem']; ?></span>
                            <p>
                            <p class="available-stock">
                                <span class="like_num__label" style="color: #2fa564;">
                                    Y??u th??ch:
                                    <?php if ($product_details['TenNhaSanXuat'] > 0) { ?>
                                        <span style="color: black;" class="like_num__value"><?php echo $product_details['LuotYeuThich']; ?> l?????t</span>
                                    <?php } else { ?>
                                        <span id="like_num__value" class="like_num__value">0</span>
                                    <?php } ?>

                                </span>
                            <p>
                            <h4>M?? T???:</h4>
                            <p class="description-detail__product"> <?php echo $product_details['MoTa']; ?> </p>
                            <form action="" method="post">
                                <ul>
                                    <li class="max-width-mobile">
                                        <div class="quantity-box mb-1">
                                            <label class="control-label text-color mt-1">S??? L?????ng</label>
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
                                        <input type="submit" name="submit" class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" value="Th??m v??o gi???">
                                    </div>

                                    <!-- <div class="cart-and-bay-btn max-btn">
                                        <a data-product-id="" class="btn user-liked js-tongle-yeuthich"><i class="fas fa-heart"></i>???? th??ch</a>
                                    </div>

                                    <div class="cart-and-bay-btn max-btn">
                                        <a data-product-id="" class="btn user-not-like js-tongle-yeuthich"><i class="far fa-heart"></i>Y??u th??ch</a>
                                    </div> -->


                                    <div class="cart-and-bay-btn max-btn">
                                        <a href="#" class="btn user-not-like "><i class="far fa-heart"></i>Y??u th??ch</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
        <div class="row" style="margin-top: 80px">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1 data-aos="fade-up" data-aos-easing="linear">S???n ph???m li??n quan</h1>
                    <p data-aos="fade-up" data-aos-easing="linear">Ch???t l?????ng h??ng ?????u ch??ng t??i s??? 2 kh??ng ai s??? 1</p>
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
                                            <li><a href="details.php?MaSanPham=<?php echo $buys['MaSanPham']; ?>" data-toggle="tooltip" data-placement="right" title="Chi ti???t"><i class="fas fa-eye"></i></a></li>
                                            <li>
                                                <a href="#" class="heart-hover" data-toggle="tooltip" data-placement="right" title="Y??u th??ch">
                                                    <i class="far fa-heart not-like-heart-icon"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <a class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" href="details.php?MaSanPham=<?php echo $buys['MaSanPham']; ?>" name="submit">Xem chi ti???t</a>
                                        <!-- <input type="text" hidden name="SoLuong" value="1" />
                                    <input type="text" hidden name="MaSanPham" value="<?php echo $buys['MaSanPham']; ?>" />
                                    <input type="submit" name="submit" class="cart add-cart-notify text-capitalize hide-in-mobile font-weight-bold" value="Th??m v??o gi???">  -->
                                    </form>
                                </div>
                            </div>
                            <div class="why-text view-row-content">
                                <h4><?php echo $buys['TenSanPham'] ?></h4>
                                <h5><?php echo number_format($buys['Gia'], 0, '', ','); ?> vn??</h5>
                                <a href="" class="btn register hvr-hover text-capitalize add-cart-notify max-width-mobile show-in-mobile font-weight-bold font-size-mobile mt-1">Th??m v??o gi???</a>
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
                    <h2 style="padding: initial;color: white;">????nh Gi?? S???n Ph???m</h2>
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
                                    <small class="text-muted">????ng b???i <?php echo $result_cmt['Ten'] ?> v??o <?php echo $result_cmt['NgayGio'] ?> </small>
                                </div>
                            </div>
                            <hr>
                        <?php
                        }
                    } else {
                        ?>
                        <p style="width: 100%;text-align: center;font-style: italic;margin: 0px 20px 20px;">Ch??a c?? b??nh lu???n cho s???n ph???m n??y!</p>
                    <?php
                    }
                    ?>

                    <?php
                    $check_login = Session::get('CTM_login');
                    if ($check_login == true) {
                    ?>
                        <form method="POST" action="">
                            <input name="NoiDung" placeholder="Nh???p b??nh lu???n..." class="user-input_ct">

                </div>
                <input type="submit" name="binhluan" class="btn hvr-hover max-width-mobile" value="????? L???i B??nh Lu???n"></input>
                </form>
            <?php
                    } else {
            ?>
                <input name="noidung" placeholder="Nh???p b??nh lu???n..." class="user-input_ct" readonly>

            </div>
            <a href="dangnhap.php" class="btn hvr-hover max-width-mobile">????ng nh???p ????? b??nh Lu???n</a>
        <?php
                    }
        ?>


        </div>

    </div>
    <div class="flex-column text-center mt-4 mb-4 d-flex align-items-center">
    <div class="ml-auto add-cart-notify btn hvr-hover max-width-mobile font-weight-bold text-capitalize p-2" style="margin: auto; width: 100px;">
        <button onclick="history.back()" style="background: transparent;
    border-color: transparent;
    color: white;">Tr??? l???i</button>
    </div>
</div>
</div>
<?php

?>
<!-- End Shop Detail -->
<script>
    /* ..............................................
        Y??u th??ch
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
                    showNotify('???? x??a kh???i Y??u th??ch!', 'heart-dislike-outline')
                    element
                        .removeClass('user-liked')
                        .addClass('user-not-like')
                        .text("")
                        .append(`<i class="far fa-heart"></i>Y??u th??ch`)

                    curentLike--;
                    curentLike = curentLike < 0 ? 0 : curentLike;
                    luotyeuthich.innerText = (curentLike).toString();

                } else {
                    showNotify('???? th??m v??o Y??u th??ch!', 'heart-outline')
                    element
                        .removeClass('user-not-like')
                        .addClass('user-liked')
                        .text("")
                        .append(`<i class="fas fa-heart"></i>???? th??ch`)

                    curentLike++;
                    luotyeuthich.innerText = (curentLike).toString();
                }
            }).fail(function() {
                alert("X???y ra l???i khi y??u th??ch!");
            });
    });

    /* ..............................................
    Xem th??m v?? b???t comment
    ................................................. */

    //S??? comment m???c ?????nh ban ?????u
    var x = 5;
    const actionCount = x;

    const eleHide = `.comment-item:nth-child(n + ${actionCount + 1})`
    $(eleHide).hide()

    if ($("#myList li").length <= actionCount) {
        $('#loadMore').hide();
    }
    $('#showLess').hide();


    //h??m xem th??m comment
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

    //h??m ???n b???t comment
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
    //Th??m s??? ki???n onclick 2 n??t
    $('#loadMore').click(LoadMoreComment)
    $('#showLess').click(ShowLessComment)

    /* ..............................................
    load list curent comment user
    ................................................. */

    // h??m load b??nh lu???n
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

                // Avt cmt hi???n t???i
                $(".user-avatar__comment").first().attr("src", currentAvt);

                //Day cmt hi???n t???i
                if (currentName != null) {
                    $('.user-comment__day').first().html(`????ng b???i ${currentName} - ${currentDate}`)
                } else {
                    $('.user-comment__day').first().html(`????ng b???i ${currentEmail} - ${currentDate}`)
                }

                $('#showLess').hide();
                if ($("#myList li").length > actionCount) {
                    $(eleHide).hide()
                    $('#loadMore').show();
                }
            },
            error: function() {
                alert("X???y ra l???i khi b??nh lu???n!");
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
        Th??ng b??o th??m qu?? s??? l?????ng s???n ph???m t???n kho
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