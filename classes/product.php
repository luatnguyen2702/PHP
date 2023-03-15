<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getproduct()
    {
        $query = "SELECT * FROM sanpham ORDER BY MaSanPham DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_admin()
    {
        $SoSanPham = 5;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $SanPhamTu = ($Page-1)*$SoSanPham;
        $query = "SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT $SanPhamTu, $SoSanPham";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_admin_search($string)
    {
        $SoSanPham = 5;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $SanPhamTu = ($Page-1)*$SoSanPham;
        $query = "SELECT * FROM sanpham WHERE sanpham.TenSanPham LIKE '%$string%' ORDER BY MaSanPham DESC LIMIT $SanPhamTu, $SoSanPham";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new()
    {
        $query = "SELECT * FROM sanpham order by MaSanPham DESC LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_only12()
    {
        if(isset($_GET['field']) && isset($_GET['sort'])){
            $field = $_GET['field'];
            $sort = $_GET['sort'];
        }else{
            $field = "MaSanPham";
            $sort = "DESC";
        }
        $query = "SELECT * FROM sanpham ORDER BY $field $sort LIMIT 12";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_bydanhmuccon($id)
    {
        $query = "SELECT * FROM sanpham WHERE MaDanhMucCon = '$id' order by MaSanPham DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_bydanhmuc($id)
    {
        $query = "SELECT * FROM sanpham WHERE MaDanhMuc = '$id' order by MaSanPham DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_buys()
    {
        $query = "SELECT s.*
            FROM chitiethoadon as c, sanpham as s
            WHERE c.MaSanPham = s.MaSanPham
            GROUP BY c.MaSanPham
            LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_lienquan($id)
    {
        $query = "SELECT * FROM sanpham WHERE MaDanhMucCon = '$id' order by MaSanPham DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }


    public function get_details_id($id)
    {
        $query = "
            SELECT s.*, n.TenNhaSanXuat, d.TenDanhMucCon
            FROM danhmuccon as d, nhasanxuat as n, sanpham as s
            WHERE s.MaDanhMucCon = d.MaDanhMucCon AND s.MaNhaSanXuat = n.MaNhaSanXuat
            AND s.MaSanPham = '$id'
            ";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $file, $id)
    {
        $MaNhaSanXuat = mysqli_real_escape_string($this->db->link, $data['MaNhaSanXuat']);
        $MaDanhMucCon = mysqli_real_escape_string($this->db->link, $data['MaDanhMucCon']);
        $TenSanPham = mysqli_real_escape_string($this->db->link, $data['TenSanPham']);
        $Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
        $MoTa = mysqli_real_escape_string($this->db->link, $data['MoTa']);
        $DonViTinh = mysqli_real_escape_string($this->db->link, $data['DonViTinh']);
        $SoLuongTonKho = mysqli_real_escape_string($this->db->link, $data['SoLuongTonKho']);
        $NgaySanXuat = mysqli_real_escape_string($this->db->link, $data['NgaySanXuat']);
        $HanSuDung = mysqli_real_escape_string($this->db->link, $data['HanSuDung']);
        $Diem = mysqli_real_escape_string($this->db->link, $data['Diem']);
        $TinhTrang = mysqli_real_escape_string($this->db->link, $data['TinhTrang']);
        // $NgaySanXuat = date("Y-m-d", strtotime($NgaySanXuat));
        // $HanSuDung = date("Y-m-d", strtotime($HanSuDung));

        //Kiểm tra hình ảnh
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = "UploadedFiles/images/" . substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = $unique_image;

        if ($TenSanPham == "" || $Gia == "" || $MoTa == "" || $DonViTinh == "" || $SoLuongTonKho == "" || $NgaySanXuat == "" || $HanSuDung == "" || $Diem == "" || $TinhTrang == "") {
            $alert = "<section class='fade-up-down'>
                <div class='container mt-5'>
                    <div class='row'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                    <button type='button' class='close font__size-18' data-dismiss='alert'>
                                        <span aria-hidden='true'>
                                            <i class='fa fa-times warning'></i>
                                        </span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                    <strong class='font__weight-semibold'>Cảnh báo!</strong> Vui lòng điền đầy đủ thông tin còn trống!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 2048000) {
                    $alert = "<section class='fade-up-down'>
                        <div class='container mt-5'>
                            <div class='row'>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                            <button type='button' class='close font__size-18' data-dismiss='alert'>
                                                <span aria-hidden='true'>
                                                    <i class='fa fa-times warning'></i>
                                                </span>
                                                <span class='sr-only'>Close</span>
                                            </button>
                                            <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                            <strong class='font__weight-semibold'>Cảnh báo!</strong> Kích thước ảnh tải lên không quá 20MB!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    $alert = "<section class='fade-up-down'>
                        <div class='container mt-5'>
                            <div class='row'>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                            <button type='button' class='close font__size-18' data-dismiss='alert'>
                                                <span aria-hidden='true'>
                                                    <i class='fa fa-times warning'></i>
                                                </span>
                                                <span class='sr-only'>Close</span>
                                            </button>
                                            <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                            <strong class='font__weight-semibold'>Cảnh báo!</strong> Bạn chỉ được tải file - " . implode(',', $permited) . "
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE sanpham SET 
                    MaNhaSanXuat = '$MaNhaSanXuat',
                    MaDanhMucCon = '$MaDanhMucCon',
                    TenSanPham = '$TenSanPham', 
                    Gia = '$Gia',
                    MoTa = '$MoTa',
                    DonViTinh = '$DonViTinh', 
                    SoLuongTonKho = '$SoLuongTonKho',
                    NgaySanXuat = '$NgaySanXuat',
                    HanSuDung = '$HanSuDung', 
                    Diem = '$Diem',
                    TinhTrang = '$TinhTrang',
                    HinhChinh = '$unique_image'
                    WHERE MaSanPham = '$id'
                        ";
            } else {
                //Không chọn ảnh mới
                $query = "UPDATE sanpham SET 
                    MaNhaSanXuat = '$MaNhaSanXuat',
                    MaDanhMucCon = '$MaDanhMucCon',
                    TenSanPham = '$TenSanPham', 
                    Gia = '$Gia',
                    MoTa = '$MoTa',
                    DonViTinh = '$DonViTinh', 
                    SoLuongTonKho = '$SoLuongTonKho',
                    NgaySanXuat = '$NgaySanXuat',
                    HanSuDung = '$HanSuDung', 
                    Diem = '$Diem',
                    TinhTrang = '$TinhTrang'
                    WHERE MaSanPham = '$id'
                    ";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<section class='fade-up-down'>
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
                                        <strong class='font__weight-semibold'>Chúc mừng!</strong> Thay đổi thông tin thành công!</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>";
                return $alert;
            } else {
                $alert = "<section class='fade-up-down'>
                    <div class='container mt-5'>
                        <div class='row'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                        <button type='button' class='close font__size-18' data-dismiss='alert'>
                                            <span aria-hidden='true'>
                                                <i class='fa fa-times danger '></i>
                                            </span>
                                            <span class='sr-only'>Close</span>
                                        </button>
                                        <i class='start-icon far fa-times-circle faa-pulse animated'></i>
                                        <strong class='font__weight-semibold'>Ôi không!</strong> Thay đổi thông tin không thành công!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>";
                return $alert;
            }
        }
    }

    public function delete_product($id)
    {
        $query = "DELETE FROM sanpham WHERE MaSanPham = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<section class='fade-up-down'>
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Xóa sản phẩm thành công.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        } else {
            $alert = "<section class='fade-up-down'>
            <div class='container mt-5'>
                <div class='row'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                <button type='button' class='close font__size-18' data-dismiss='alert'>
                                    <span aria-hidden='true'>
                                        <i class='fa fa-times danger '></i>
                                    </span>
                                    <span class='sr-only'>Close</span>
                                </button>
                                <i class='start-icon far fa-times-circle faa-pulse animated'></i>
                                <strong class='font__weight-semibold'>Ôi không!</strong> Xóa sản phẩm thất bại rồi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        }
    }

    public function add_product($data, $file)
    {
        $MaNhaSanXuat = mysqli_real_escape_string($this->db->link, $data['MaNhaSanXuat']);
        $MaDanhMucCon = mysqli_real_escape_string($this->db->link, $data['MaDanhMucCon']);
        $TenSanPham = mysqli_real_escape_string($this->db->link, $data['TenSanPham']);
        $Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
        $MoTa = mysqli_real_escape_string($this->db->link, $data['MoTa']);
        $DonViTinh = mysqli_real_escape_string($this->db->link, $data['DonViTinh']);
        $SoLuongTonKho = mysqli_real_escape_string($this->db->link, $data['SoLuongTonKho']);
        $NgaySanXuat = mysqli_real_escape_string($this->db->link, $data['NgaySanXuat']);
        $HanSuDung = mysqli_real_escape_string($this->db->link, $data['HanSuDung']);
        $Diem = mysqli_real_escape_string($this->db->link, $data['Diem']);
        $TinhTrang = mysqli_real_escape_string($this->db->link, $data['TinhTrang']);
        $SoLuongDaBan = 0;
        $LuotYeuThich = 0;

        //Kiểm tra hình ảnh
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = "UploadedFiles/images/" . substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = $unique_image;

        if ($TenSanPham == "" || $Gia == "" || $MoTa == "" || $DonViTinh == "" || $SoLuongTonKho == "" || $NgaySanXuat == "" || $HanSuDung == "" || $Diem == "" || $TinhTrang == "" || $MaDanhMucCon == "" || $MaNhaSanXuat == "") {
            $alert = "<section class='fade-up-down'>
                <div class='container mt-5'>
                    <div class='row'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                    <button type='button' class='close font__size-18' data-dismiss='alert'>
                                        <span aria-hidden='true'>
                                            <i class='fa fa-times warning'></i>
                                        </span>
                                        <span class='sr-only'>Close</span>
                                    </button>
                                    <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                    <strong class='font__weight-semibold'>Cảnh báo!</strong> Vui lòng điền đầy đủ thông tin còn trống!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 2048000) {
                    $alert = "<section class='fade-up-down'>
                        <div class='container mt-5'>
                            <div class='row'>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                            <button type='button' class='close font__size-18' data-dismiss='alert'>
                                                <span aria-hidden='true'>
                                                    <i class='fa fa-times warning'></i>
                                                </span>
                                                <span class='sr-only'>Close</span>
                                            </button>
                                            <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                            <strong class='font__weight-semibold'>Cảnh báo!</strong> Kích thước ảnh tải lên không quá 20MB!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    $alert = "<section class='fade-up-down'>
                        <div class='container mt-5'>
                            <div class='row'>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                            <button type='button' class='close font__size-18' data-dismiss='alert'>
                                                <span aria-hidden='true'>
                                                    <i class='fa fa-times warning'></i>
                                                </span>
                                                <span class='sr-only'>Close</span>
                                            </button>
                                            <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
                                            <strong class='font__weight-semibold'>Cảnh báo!</strong> Bạn chỉ được tải file - " . implode(',', $permited) . "
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO sanpham(MaDanhMucCon,MaNhaSanXuat,TenSanPham,Gia,HinhChinh,MoTa,DonViTinh,SoLuongTonKho,SoLuongDaBan,LuotYeuThich,NgaySanXuat,HanSuDung,Diem,TinhTrang) VALUES ('$MaDanhMucCon','$MaNhaSanXuat','$TenSanPham','$Gia','$unique_image','$MoTa','$DonViTinh','$SoLuongTonKho','$SoLuongDaBan','$LuotYeuThich','$NgaySanXuat','$HanSuDung','$Diem','$TinhTrang')";
            }
        }
        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<section class='fade-up-down'>
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Thêm sản phẩm thành công.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        } else {
            $alert = "<section class='fade-up-down'>
            <div class='container mt-5'>
                <div class='row'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <div class='alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
                                <button type='button' class='close font__size-18' data-dismiss='alert'>
                                    <span aria-hidden='true'>
                                        <i class='fa fa-times danger '></i>
                                    </span>
                                    <span class='sr-only'>Close</span>
                                </button>
                                <i class='start-icon far fa-times-circle faa-pulse animated'></i>
                                <strong class='font__weight-semibold'>Ôi không!</strong> Thêm sản phẩm thất bại rồi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        }
    }

    public function getproduct_seach($string){
        $query = "SELECT * FROM sanpham WHERE sanpham.TenSanPham LIKE '%$string%' order by MaSanPham DESC LIMIT 12;";
        $result = $this->db->select($query);
        return $result;
    }
}
?>