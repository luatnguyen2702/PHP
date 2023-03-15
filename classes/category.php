<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getdanhmuc()
    {
        $query = "SELECT * FROM danhmuc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcategory()
    {
        $query = "SELECT danhmuccon.*, danhmuc.* FROM danhmuccon, danhmuc WHERE danhmuccon.MaDanhMuc = danhmuc.MaDanhMuc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcategory_admin()
    {
        $SoLoai = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $Loai = ($Page - 1) * $SoLoai;
        $query = "SELECT * FROM danhmuccon ORDER BY MaDanhMucCon DESC LIMIT $Loai, $SoLoai";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_category($id)
    {
        $query = "DELETE FROM danhmuccon WHERE MaDanhMucCon = '$id'";
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Xóa loại sản phẩm thành công.
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
                                <strong class='font__weight-semibold'>Ôi không!</strong> Xóa loại sản phẩm thất bại rồi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        }
    }

    public function update_category($data, $id)
    {
        $MaDanhMuc = mysqli_real_escape_string($this->db->link, $data['MaDanhMuc']);
        $TenDanhMucCon = mysqli_real_escape_string($this->db->link, $data['TenDanhMucCon']);
        $HinhAnh = mysqli_real_escape_string($this->db->link, $data['HinhAnh']);
        if(empty($MaDanhMuc) || empty($TenDanhMucCon) || empty($HinhAnh)){
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
            $query = "UPDATE danhmuccon SET 
            TenDanhMucCon = '$TenDanhMucCon',
            HinhAnh = '$HinhAnh',
            MaDanhMuc = '$MaDanhMuc'
            WHERE MaDanhMucCon = '$id'
            ";

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

    public function get_details_category($id)
    {
        $query = "
            SELECT * FROM danhmuccon WHERE danhmuccon.MaDanhMucCon = '$id'
            ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcategory_seach($string){
        $query = "SELECT * FROM danhmuccon WHERE danhmuccon.TenDanhMucCon LIKE '%$string%' order by MaDanhMucCon DESC LIMIT 12;";
        $result = $this->db->select($query);
        return $result;
    }

    public function ggetcategory_admin_search($string)
    {
        $SoDMC = 5;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $DMC = ($Page-1)*$SoDMC;
        $query = "SELECT * FROM danhmuccon WHERE danhmuccon.TenDanhMucCon LIKE '%$string%' ORDER BY MaDanhMucCon DESC LIMIT $DMC, $SoDMC";
        $result = $this->db->select($query);
        return $result;
    }

    public function add_category($data){
        $MaDanhMuc = mysqli_real_escape_string($this->db->link, $data['MaDanhMuc']);
        $TenDanhMucCon = mysqli_real_escape_string($this->db->link, $data['TenDanhMucCon']);
        $HinhAnh = mysqli_real_escape_string($this->db->link, $data['HinhAnh']);

        if(empty($MaDanhMuc) || empty($TenDanhMucCon) || empty($HinhAnh)){
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
        }else{
            $query = "INSERT INTO danhmuccon(MaDanhMuc, TenDanhMucCon, HinhAnh) VALUES ($MaDanhMuc,'$TenDanhMucCon','$HinhAnh')";
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
                                    <strong class='font__weight-semibold'>Chúc mừng!</strong> Thêm loại sản phẩm thành công.
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
                                    <strong class='font__weight-semibold'>Ôi không!</strong> Thêm loại sản phẩm thất bại rồi!
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
}
?>