<?php
include 'lib/session.php';
Session::init();
?>
<?php
$check_login = Session::get('CTM_login');
if ($check_login == true) {
} else {
    header('Location:dangnhap.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php
$id = Session::get('CTM_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $updateCustomer = $customer->update_customer($_POST, $_FILES, $id);
    // echo 'Mã khách hàng'. $id;
}
?>
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

    .form-user {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .max-width-fix {
        margin: auto;
    }

    .user-avatar__show {
        width: 160px;
        height: 160px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #2fa564;
        background-color: #2fa564;
    }

    .user-avatar__edit {
        --size: 35px;
        display: flex;
        position: absolute;
        bottom: 0;
        right: 10%;
        width: var(--size);
        height: var(--size);
        background-color: #fff;
        border: 1px solid var(--primary-color);
        border-radius: 50%;
        transition: all ease-in .1s;
        cursor: pointer;
    }

    .user-avatar__group {
        position: relative;
        display: inline-block;
        margin: auto;
    }

    .user-avatar__wrap {
        display: flex;
        margin-top: 20px;

    }

    .user-avatar__edit {
        --size: 35px;
        display: flex;
        position: absolute;
        bottom: 0;
        right: 10%;
        width: var(--size);
        height: var(--size);
        background-color: #fff;
        border: 1px solid var(--primary-color);
        border-radius: 50%;
        transition: all ease-in .1s;
        cursor: pointer;
    }

    .user-camera-img {
        --size: 70%;
        margin: auto;
        width: var(--size);
        height: var(--size);
        object-fit: cover;
        color: #333;
    }
</style>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thông Tin Cá Nhân</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="profile.php">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Thông Tin Cá Nhân</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <?php
    if (isset($updateCustomer)) {
        echo $updateCustomer;
    }
    ?>
    <form action="" method="post" class="form-horizontal mt-3 review-form-box" enctype="multipart/form-data">
        <?php
        $id = Session::get('CTM_id');
        $customer = $customer->show_customers($id);
        if ($customer) {
            while ($result = $customer->fetch_assoc()) {
        ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="user-avatar__wrap">
                            <div class="user-avatar__group">
                                <img class="user-avatar__show" id="myimage" src="./admin/<?php echo $result['AnhDaiDien']; ?>" />
                                <label for="choose-image">
                                    <div class="user-avatar__edit">
                                        <ion-icon class="user-camera-img" name="camera"></ion-icon>
                                    </div>
                                </label>
                                <script>
                                    function onFileSelected(event) {
                                        var selectedFile = event.target.files[0];
                                        var reader = new FileReader();

                                        var imgtag = document.getElementById("myimage");
                                        imgtag.title = selectedFile.name;

                                        reader.onload = function(event) {
                                            imgtag.src = event.target.result;
                                        };

                                        reader.readAsDataURL(selectedFile);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" hidden id="choose-image" onchange="onFileSelected(event)" name="image">
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                        <div class="user-input__label">Email</div>
                        <input class="form-control user-input" value="<?php echo $result['Email']; ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                        <div class="user-input__label">Tên khách hàng</div>
                        <input class="form-control user-input text-box single-line" name="Ten" placeholder="Nhập tên của bạn" type="text" value="<?php echo $result['Ten']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                        <div class="user-input__label">Số điện thoại</div>
                        <input class="form-control user-input text-box single-line" name="Phone" placeholder="Nhập số điện thoại của bạn" type="text" value="<?php echo $result['SDT']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 user-input-info max-width-fix">
                        <div class="user-input__label">Địa chỉ</div>
                        <input class="form-control user-input text-box single-line" name="DiaChi" placeholder="Nhập địa chỉ của bạn" type="text" value="<?php echo $result['DiaChi']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-12 btn-update-info__wrap" style="text-align: center;">
                        <!-- <button type="submit" class="btn hvr-hover max-width-mobile text-capitalize m-auto p-2">Cập
                            nhật</button>
                            <input type="submit" value="Cập nhật" > -->

                        <input type="submit" name="save" value="Cập nhật" class="btn hvr-hover max-width-mobile text-capitalize m-auto p-2" />
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </form>
</div>


<?php include 'inc/footer.php' ?>