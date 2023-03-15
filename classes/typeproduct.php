<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class typeproduct
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function gettype()
    {
        $query = "SELECT * FROM danhmuc";
        $result = $this->db->select($query);
        return $result;
    }

    public function gettype_search($string)
    {
        $query = "SELECT * FROM danhmuc WHERE danhmuc.TenDanhMuc LIKE '%$string%' order by danhmuc.MaDanhMuc";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_type($id)
    {
        $query = "DELETE FROM danhmuc WHERE MaDanhMuc = '$id'";
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Xóa danh mục thành công.
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
                                <strong class='font__weight-semibold'>Ôi không!</strong> Xóa danh mục thất bại rồi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        }
    }

    public function get_details_type($id)
    {
        $query = "
            SELECT * FROM danhmuc WHERE danhmuc.MaDanhMuc = '$id'
            ";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_type($data, $id)
    {
        $TenDanhMuc = mysqli_real_escape_string($this->db->link, $data['TenDanhMuc']);

        if (empty($TenDanhMuc)) {
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
            $query = "UPDATE danhmuc SET 
            TenDanhMuc = '$TenDanhMuc'
            WHERE MaDanhMuc = '$id'
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

    public function gettype_admin()
    {
        $SoDanhMuc = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $DanhMuc = ($Page - 1) * $SoDanhMuc;
        $query = "SELECT * FROM danhmuc ORDER BY MaDanhMuc DESC LIMIT $DanhMuc, $SoDanhMuc";
        $result = $this->db->select($query);
        return $result;
    }

    public function add_type($data)
    {
        $TenDanhMuc = mysqli_real_escape_string($this->db->link, $data['TenDanhMuc']);
        if(empty($TenDanhMuc)){
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
            $query = "INSERT INTO danhmuc(TenDanhMuc) VALUES ('$TenDanhMuc')";
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
                                    <strong class='font__weight-semibold'>Chúc mừng!</strong> Thêm danh mục thành công.
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
                                    <strong class='font__weight-semibold'>Ôi không!</strong> Thêm danh mục thất bại rồi!
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