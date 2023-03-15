<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class cart
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($MaSanPham, $SoLuong, $sId)
    {
        $SoLuong = $this->fm->validation($SoLuong);
        $SoLuong = mysqli_real_escape_string($this->db->link, $SoLuong);
        $MaSanPham = mysqli_real_escape_string($this->db->link, $MaSanPham);
        $sId = $sId;

        $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
        $result = $this->db->select($query)->fetch_assoc();

        $HinhChinh = $result['HinhChinh'];
        $Gia = $result['Gia'];
        $TenSanPham = $result['TenSanPham'];
        $Tong = $SoLuong * $Gia;

        $query_cart = "SELECT * FROM giohang WHERE MaSanPham = '$MaSanPham' AND sId = '$sId' ";
        $check_cart =  $this->db->select($query_cart);
        if ($check_cart) {
            $alert = "<section class='fade-up-down'>
                    <div class='container mt-5'>
                        <div class='row'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                        <button type='button' class='close font__size-18' data-dismiss='alert'>
                                            <span aria-hidden='true'>
                                                <i class='fa fa-times blue-cross'></i>
                                            </span>
                                            <span class='sr-only'>Close</span>
                                        </button>
                                        <i class='start-icon  fa fa-info-circle faa-shake animated'></i>
                                        <strong class='font__weight-semibold'>Khoan nào!</strong> Sản phẩm đã được thêm vào giỏ hàng rồi. <a href='cart.php'>Xem giỏ hàng!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>";
            return $alert;
        } else {
            $query_insert = "INSERT INTO giohang(sId ,MaSanPham, TenSanPham, HinhChinh, Gia, SoLuong, TongCong) VALUES ('$sId','$MaSanPham', '$TenSanPham', '$HinhChinh', '$Gia', '$SoLuong', '$Tong')";
            $insert = $this->db->insert($query_insert);
            if ($insert) {
                header('Location:cart.php');
                return "<meta http-equiv='refresh' content='0;URL=details.php?MaSanPham=".$MaSanPham."'>";
            } else {
                return "Thêm vào giỏ hàng k tc";
            }
        }
    }

    public function get_product_card()
    {
        $sId = session_id();
        $query = "SELECT giohang.*, sanpham.SoLuongTonKho FROM giohang, sanpham WHERE sId = '$sId' AND giohang.MaSanPham = sanpham.MaSanPham";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_quantity_card($MaGioHang, $SoLuong, $Gia)
    {
        $SoLuong = mysqli_real_escape_string($this->db->link, $SoLuong);
        $MaGioHang = mysqli_real_escape_string($this->db->link, $MaGioHang);
        $Gia = mysqli_real_escape_string($this->db->link, $Gia);
        $Tong = $SoLuong * $Gia;
        $query = "UPDATE giohang SET 
        SoLuong = '$SoLuong',
        TongCong = '$Tong'
        WHERE MaGioHang = '$MaGioHang'";
        $result = $this->db->update($query);
        if ($result) {
            header('Location:cart.php');
        } else {
        }
    }

    public function delete_card($id)
    {
        $query = "DELETE FROM giohang WHERE MaGioHang = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:cart.php');
        } else {

        }
    }

    public function check_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM giohang WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_all_data_cart()
    {
        $sId = session_id();
        $query = "DELETE FROM giohang WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertOrder($data)
    {
        $idKH = Session::get('CTM_id');
        $Ten = mysqli_real_escape_string($this->db->link, $data['Ten']);
        $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
        $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
        $DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);
        $TongTien = mysqli_real_escape_string($this->db->link, $data['TongTien']);
        $GiamGia = mysqli_real_escape_string($this->db->link, $data['GiamGia']);
        $PhiShip = mysqli_real_escape_string($this->db->link, $data['PhiShip']);


        $query_hoadon = "INSERT INTO hoadon(MaKhachHang, Ten, SDT, DiaChi, Email, GiamGia, TongTien, Ship) VALUES ('$idKH','$Ten', '$SDT', '$DiaChi', '$Email', '$GiamGia', '$TongTien', '$PhiShip') ";
        $addhoadon =  $this->db->select($query_hoadon);
    }

    public function addorderdetails()
    {
        $sId = session_id();
        $query = "SELECT * FROM giohang WHERE sId  = '$sId'";
        $get_product = $this->db->select($query);
        while ($result = $get_product->fetch_assoc()) {
            $MaSanPham = $result['MaSanPham'];
            $Gia = $result['Gia'];
            $SoLuong = $result['SoLuong'];
            $TongCong = $result['TongCong'];
            $query_order = "INSERT INTO chitiethoadon(MaSanPham, SoLuong, DonGia, ThanhTien) VALUES ('$MaSanPham', '$SoLuong', '$Gia', '$TongCong')";
            $insert_orderchitiet = $this->db->insert($query_order);
        }
        // header('Location:buyhictory.php');
        return "<section class='fade-up-down'>
        <div class='container mt-5'>
            <div class='row'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show'>
                            <button type='button' class='close font__size-18' data-dismiss='alert'>
                                <span aria-hidden='true'><a>
                                        <i class='fa fa-times greencross'></i>
                                    </a></span>
                                <span class='sr-only'>Close</span>
                            </button>
                            <i class='start-icon far fa-check-circle faa-tada animated'></i>
                            <strong class='font__weight-semibold'>Chúc mừng!</strong> Đặt hàng thành công!.<a href='buyhictory.php'>Xem đơn hàng!</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>";
    }

    public function show_hoadon_all_admin(){
        $query = "SELECT * FROM hoadon ORDER BY MaHoaDon DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon_all_admin_search($string){
        $query = "SELECT * FROM hoadon WHERE hoadon.SDT LIKE '%$string%' ORDER BY MaHoaDon DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon_all_admin_page_search($string)
    {
        $SoHD = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $HD = ($Page - 1) * $SoHD;
        $query = "SELECT * FROM hoadon WHERE hoadon.SDT LIKE '%$string%' ORDER BY MaHoaDon DESC LIMIT $HD, $SoHD";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon_all_admin_page()
    {
        $SoHD = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $HD = ($Page - 1) * $SoHD;
        $query = "SELECT * FROM hoadon ORDER BY MaHoaDon DESC LIMIT $HD, $SoHD";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function show_hoadon_all(){
        $id = Session::get('CTM_id');
        $query = "SELECT * FROM hoadon WHERE MaKhachHang = '$id' ORDER BY NgayLap DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon(){
        $SoHoaDon = 4;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $HoaDonTu = ($Page-1)*$SoHoaDon;
        $id = Session::get('CTM_id');
        $query = "SELECT * FROM hoadon WHERE MaKhachHang = '$id' ORDER BY NgayLap DESC LIMIT $HoaDonTu, $SoHoaDon";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon_sucess(){
        $id = Session::get('CTM_id');
        $query = "SELECT * FROM hoadon WHERE MaKhachHang = '$id' ORDER BY NgayLap DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_cthoadon($id){
        $query = "SELECT chitiethoadon.*, sanpham.MaSanPham, sanpham.TenSanPham, sanpham.DonViTinh FROM chitiethoadon, sanpham, hoadon WHERE sanpham.MaSanPham = chitiethoadon.MaSanPham AND hoadon.NgayLap = chitiethoadon.NgayLap AND hoadon.MaHoaDon = '$id';";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_cthoadon_admin_export($id){
        $query = "SELECT chitiethoadon.*, sanpham.MaSanPham, sanpham.TenSanPham, sanpham.DonViTinh FROM chitiethoadon, sanpham, hoadon WHERE sanpham.MaSanPham = chitiethoadon.MaSanPham AND hoadon.NgayLap = chitiethoadon.NgayLap AND hoadon.MaHoaDon = '$id';";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_hoadon_admin_export($id)
    {
        $query = "SELECT hoadon.* FROM chitiethoadon, sanpham, hoadon WHERE sanpham.MaSanPham = chitiethoadon.MaSanPham AND hoadon.NgayLap = chitiethoadon.NgayLap AND hoadon.MaHoaDon = '$id' LIMIT 1;";
        $result = $this->db->select($query);
        return $result;
    }

}

?>