<?php include 'inc/header.php'; ?>
<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateInfo = $store->update_information($_POST, $_FILES, $id);
}
?>
<div id="content-wrapper" class="d-flex flex-column">
    <?php
    if (isset($updateInfo)) {
        echo  $updateInfo;
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <div class="form-horizontal">
            <h2 class="table-admin__title text-center">Chỉnh sửa thông tin<br />cửa hàng</h2>
            <?php
            $getstore_info = $store->getstore_info();
            if ($getstore_info) {
                while ($result = $getstore_info->fetch_assoc()) {
            ?>
                    <div class="form-group">
                        <span class="label-admin">Tên cửa hàng</span>
                        <div class="col-md-12">
                            <input class="form-control text-box single-line" name="TenCuaHang" type="text" value="<?php echo $result['TenCuaHang']; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">SĐT</span>
                        <div class="col-md-12">
                            <input class="form-control text-box single-line" name="SDT" type="text" value="<?php echo $result['SDT'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Email</span>
                        <div class="col-md-12">
                            <input class="form-control text-box single-line" name="Email" type="text" value="<?php echo $result['Email'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Địa chỉ</span>
                        <div class="col-md-12">
                            <input class="form-control text-box single-line" name="DiaChi" type="text" value="<?php echo $result['DiaChi'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Ngày thành lập</span>
                        <div class="col-md-12">
                            <input class="form-control" name="NgayThanhLap" type="text" value="<?php echo $result['NgayThanhLap']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Giờ mở cửa</span>
                        <div class="col-md-12">
                            <input class="form-control" name="ThoiGianMoCua" type="text" value="<?php echo $result['ThoiGianMoCua']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Giờ đóng cửa</span>
                        <div class="col-md-12">
                            <input class="form-control" name="ThoiGianDongCua" type="text" value="<?php echo $result['ThoiGianDongCua']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Giới thiệu</span>
                        <div class="col-md-12">
                            <textarea class="text-area__admin-edit" id="Mota" name="LoiGioiThieu"><?php echo $result['LoiGioiThieu'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="label-admin">Hình Trưng bày</span>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9 mb-1" style="margin: auto;text-align: center;">
                                    <img onerror="this.src='./admin/images/default.png'" class="table-admin__img" src="<?php echo $result['HinhAnhMinhHoa']; ?>" id="myimage" style="width: 250px;" />

                                    <input id="linkImg" class="form-control" name="HinhAnhMinhHoa" value="<?php echo $result['HinhAnhMinhHoa'] ?>" style="margin-top: 20px;" />
                                </div>
                                <!-- <div class="col-md-3 mb-1" style="margin: auto;" for="choose-image">
                                    <label for="choose-image" class="btn btn-outline-success d-flex flex-1 justify-content-center min-width-100" style="margin-bottom: 0px;">Chọn ảnh</label>
                                </div> -->
                                <input type="file" id="choose-image" name="image" hidden onchange="onFileSelected(event)" />
                            </div>
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
                    <div class="form-group col-md-12">
                        <div class="col-md-offset-2 btn-touch">
                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-warning" style="    background-color: #2fa564;border-color: #2fa564;" />
                        </div>
                    </div>
                    <div class="col-md-12 back-to-list ">
                        <a href="informationList.php">Trở lại</a>
                    </div>
        </div>
    </form>
<?php
                }
            }
?>

<?php include 'inc/footer.php' ?>