<?php include 'inc/header.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $loginCustomer = $customer->login_customer($_POST);
    }
?>
<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="title-left account">
                    <h3 class="text-capitalize">Đăng Nhập Tài Khoản</h3>
                </div>
                <?php 
                    if(isset($loginCustomer))
                        echo $loginCustomer;
                ?>
                <form action="" class="form-horizontal mt-3 review-form-box" method="POST" role="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Email (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="Email" placeholder="Nhập email" type="email" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Mật Khẩu (<span class="text-red">*</span>)</label>
                            <input class="form-control" name="Password" placeholder="Nhập mật khẩu" type="password" />
                        </div>
                    </div>
                    <input type="submit" class="btn hvr-hover max-width-mobile" value="Đăng nhập" name="login" />
                </form>
                <div class="ask-link-group">
                    <div><a href="register.php" class="text-muted ask-link">Bạn chưa có tài khoản? Đăng ký ngay!</a></div>
                    <div><a href="" class="text-muted ask-link">Quên mật khẩu?</a></div>
                </div>


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

<?php include 'inc/footer.php'; ?>