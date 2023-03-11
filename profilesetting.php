<?php
include_once 'lib/session.php';
Session::init();
?>
<?php
$check_login = Session::get('CTM_login');
if ($check_login == true) {
} else {
    header('Location:dangnhap.php');
}
?>

<?php
include_once  'lib/database.php';
include_once  'helpers/format.php';
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$customer = new customer();
$id = Session::get('CTM_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $updateCustomerPW = $customer->change_password($_POST, $id);
}
?>
<?php include_once 'inc/header.php' ?>

<style>
    .review-form-box .form-control {
        min-height: 40px;
        border: 1px solid #e8e8e8;
        box-shadow: none !important;
        font-size: 14px;
        border-radius: var(--input-corner-radius);
    }

    .user-input {
        width: 100%;
        padding: 5px 10px;
    }

    .max-width-fix {
        margin: auto;
    }
</style>
<?php
if (isset($updateCustomerPW)) {
    echo $updateCustomerPW;
}
?>
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Đổi mật khẩu</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="profile.php">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<h2 class="text-center title-table">Đổi mật khẩu</h2>
<form action="" class="form-horizontal mt-3 review-form-box" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
            <div class="user-input__label">Mật khẩu hiện tại</div>
            <input class="form-control user-input" type="password" name="OldPassword" placeholder="Nhập mật khẩu cũ" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
            <div class="user-input__label">Mật khẩu mới</div>
            <input class="form-control user-input" type="password" name="NewPassword" placeholder="Nhập mật khẩu mới" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
            <div class="user-input__label">Xác nhận mật khẩu mới</div>
            <input class="form-control user-input" type="password" name="ConfirmPassword" placeholder="Nhập lại mật khẩu mới" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-12 btn-update-info__wrap " style="text-align: center;">
            <input type="submit" class="btn hvr-hover max-width-mobile text-capitalize m-auto p-2" value="Xác nhận" name="save" />
        </div>
    </div>
</form>
<?php include 'inc/footer.php' ?>