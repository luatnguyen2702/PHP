<?php include 'inc/header.php' ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCustomer = $customer->insert_customer($_POST);
    }
?>

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="title-left account">
                    <h3 class="text-capitalize">Đăng Ký Tài Khoản</h3>
                </div>
                <?php 
                    if(isset($insertCustomer)){
                        echo $insertCustomer;
                    }
                ?>
                <form action="" class="mt-3 mb-3 review-form-box" id="formRegister" method="post" role="form">
                    <div class="validation-summary-valid text-danger" data-valmsg-summary="true">
                        <ul>
                            <li style="display:none"></li>
                        </ul>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">Họ và Tên (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="Ten" placeholder="Nhập họ và tên" type="text" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPhone" class="mb-0">Số điện thoại</label>
                            <input type="text" class="form-control" name="Phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="InputEmail1" class="mb-0">Email (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="Email" placeholder="Nhập email" type="email" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Mật Khẩu (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="Password" placeholder="Nhập mật khẩu" type="password" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword2" class="mb-0">Xác thực mật khẩu (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="ConfirmPassword" placeholder="Nhập lại mật khẩu" type="password" />
                        </div>
                    </div>
                    <button type="submit" name="submit" value="Register" class="btn hvr-hover max-width-mobile">Đăng ký</button>
                </form>

                <form action="" method="post"><input name="" type="hidden" value="" />
                    <div id="socialLoginList">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 social__button-wrap">
                                <button type="submit" class="btn hvr-hover social__button " id="Google" name="provider" value="Google" title="Log in using your Google account" style="width: 100%">Dùng tài khoản Google</button>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 social__button-wrap">
                                <button type="submit" class="btn hvr-hover social__button " id="Facebook" name="provider" value="Facebook" title="Log in using your Facebook account" style="width: 100%">Dùng tài khoản Facebook</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Cart -->


<?php include 'inc/footer.php' ?>