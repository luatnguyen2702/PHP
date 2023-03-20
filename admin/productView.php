<?php include 'inc/header.php'; ?>
<?php

if (!isset($_GET['MaSanPham']) || $_GET['MaSanPham'] == NULL) {
    echo "<script>window.location = 'sanpham_danhsach.php'</script>";
} else {
    $id = $_GET['MaSanPham'];
}

?>
<div id="content-wrapper" class="d-flex flex-column">
    <div class="container-fluid">
        <h2 class="table-admin__title text-center">Chi tiết sản phẩm</h2>
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive shadow">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <?php 
                                $product_xem = $product->get_details_id($id);
                                if ($product_xem) {
                                    while ($result = $product_xem->fetch_assoc()) {
                            ?>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Mã sản phẩm
                                </th>
                                <td>
                                    <?php echo $result['MaSanPham']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Nhà sản xuất
                                </th>
                                <td>
                                    <?php echo $result['TenNhaSanXuat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Loại sản phẩm
                                </th>
                                <td>
                                    <?php echo $result['TenDanhMucCon']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Tên sản phẩm
                                </th>
                                <td>
                                    <?php echo $result['TenSanPham']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Hình trưng bày
                                </th>
                                <td class="text-center">
                                    <img onerror="this.src='images/default.png'" class="table-admin__img" src="<?php echo $result['HinhChinh']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Giá
                                </th>
                                <td>
                                    <?php echo number_format($result['Gia'], 0, '', ','); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Đơn vị tính
                                </th>
                                <td>
                                    <?php echo $result['DonViTinh']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Mô tả
                                </th>
                                <td>
                                    <div class="table-admin__product-des">
                                        <?php echo $result['MoTa']; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Ngày sản xuất
                                </th>
                                <td>
                                    <?php echo $result['NgaySanXuat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Hạn sử dụng
                                </th>
                                <td>
                                    <?php echo $result['HanSuDung']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Số lượng tồn kho
                                </th>
                                <td>
                                    <?php echo $result['SoLuongTonKho']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Số lượng đã bán
                                </th>
                                <td>
                                    <?php echo $result['SoLuongDaBan']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Lượt yêu thích
                                </th>
                                <td>
                                    <?php echo $result['LuotYeuThich']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Điểm tích lũy
                                </th>
                                <td>
                                    <?php echo $result['Diem']; ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-capitalize detail-table__th text-primary">
                                    Tình trạng
                                </th>
                                <td>
                                    <span class="text-green">
                                        <?php if($result['TinhTrang'] == 1){ echo "Còn hàng";} else { echo "Hết hàng";} ?>
                                    </span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="productEdit.php?MaSanPham=<?php echo $result['MaSanPham']; ?>" class="btn btn-warning">Chỉnh sửa</a>
                </div>
                <?php 
                                    }
                                }
                            ?>
                <div class="col-md-12 back-to-list ">
                    <a href="productList.php">Trở lại</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'inc/footer.php'; ?>