<?php include 'inc/header.php'; ?>
<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $addProduct = $product->add_product($_POST, $_FILES);
    // echo 'Mã danh mục con' . $_POST['MaNhaSanXuat'];
}
?>
<div id="content-wrapper" class="d-flex flex-column">
    <?php
    if (isset($addProduct)) {
        echo  $addProduct;
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <div class="form-horizontal">
            <h2 class="table-admin__title text-center">Thêm mới sản phẩm</h2>
            <div class="form-group">
                <span class="label-admin">Tên Danh Mục Con</span>
                <div class="col-md-12">
                    <select class="form-control" name="MaDanhMucCon">
                        <option value="">Chọn danh mục con</option>
                        <?php
                        $category_list = $categorysub->getcategorysublist($id);
                        if ($category_list) {
                            while ($result_category = $category_list->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $result_category['MaDanhMucCon'] ?>"><?php echo $result_category['TenDanhMucCon'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Tên Nhà Sản Xuất</span>
                <div class="col-md-12">
                    <select class="form-control" name="MaNhaSanXuat">
                        <option value="">Chọn nhà sản xuất</option>
                        <?php
                        $producer_list = $producer->getproducer();
                        if ($producer_list) {
                            while ($result_producer = $producer_list->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $result_producer['MaNhaSanXuat'] ?>"><?php echo $result_producer['TenNhaSanXuat'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Tên Sản Phẩm</span>
                <div class="col-md-12">
                    <input class="form-control text-box single-line" name="TenSanPham" type="text" placeholder="Nhập tên sản phẩm..." />
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Giá</span>
                <div class="col-md-12">
                    <input class="form-control text-box single-line" name="Gia" type="number" placeholder="Nhập giá sản phẩm..." />
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Đơn vị tính</span>
                <div class="col-md-12">
                    <input class="form-control text-box single-line" name="DonViTinh" type="text" placeholder="Nhập đơn vị tính sản phẩm..." />
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Mô Tả</span>
                <div class="col-md-12">
                    <textarea class="text-area__admin-edit" id="Mota" name="MoTa" placeholder="Nhập giá mô tả sản phẩm..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Hình Trưng bày</span>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9 mb-1" style="margin: auto;text-align: center;">
                            <img onerror="this.src='./images/default.png'" class="table-admin__img" src="./images/default.png" id="myimage" style="width: 250px;" />

                            <input id="linkImg" hidden class="form-control" name="HinhChinh" style="margin-top: 20px;" />
                        </div>
                        <div class="col-md-3 mb-1" style="margin: auto;" for="choose-image">
                            <label for="choose-image" class="btn btn-outline-success d-flex flex-1 justify-content-center min-width-100" style="margin-bottom: 0px;">Chọn ảnh</label>
                        </div>
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
            <div class="form-group">
                <span class="label-admin">Ngày Sản Xuất</span>
                <div class="col-md-12">
                    <input class="form-control" name="NgaySanXuat" type="text" placeholder="Nhập ngày sản xuất...">
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Hạn Sử Dụng</span>
                <div class="col-md-12">
                    <input class="form-control" name="HanSuDung" type="text" placeholder="Nhập hạn sử dụng...">
                </div>
            </div>

            <div class="form-group">
                <span class="label-admin">Số Lượng Tồn Kho</span>
                <div class="col-md-12">
                    <input class="form-control text-box single-line" name="SoLuongTonKho" type="number" placeholder="Nhập số lượng tồn kho..." />
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Điểm</span>
                <div class="col-md-12">
                    <input class="form-control text-box single-line" name="Diem" type="number" placeholder="Nhập điểm sản phẩm..." />
                </div>
            </div>
            <div class="form-group">
                <span class="label-admin">Tình Trạng <span class="font-italic">(Còn hàng)</span></span>
                <div class="col-md-12">
                    <select id="select" name="TinhTrang" style="border-radius: 0.35rem; padding: 8px 8px;">
                        <option value="">Chọn tình trạng sản phẩm</option>
                        <option value="1">Còn hàng</option>
                        <option value="0">Hết Hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-offset-2 btn-touch">
                    <input type="submit" name="submit" value="Thêm mới" class="btn btn-warning" style="    background-color: #2fa564;border-color: #2fa564;" />
                </div>
            </div>
            <div class="col-md-12 back-to-list ">
                <a href="sanpham_danhsach.php">Trở lại</a>
            </div>
        </div>
    </form>

    <?php include 'inc/footer.php' ?>