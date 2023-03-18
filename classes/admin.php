<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class admin
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($TenDangNhap, $MatKhau)
    {
        $TenDangNhap = $this->fm->validation($TenDangNhap);
        $MatKhau = $this->fm->validation($MatKhau);

        $TenDangNhap = mysqli_real_escape_string($this->db->link, $TenDangNhap);
        $MatKhau = mysqli_real_escape_string($this->db->link, $MatKhau);

        if (empty($TenDangNhap) || empty($MatKhau)) {
            $alert = "Tài khoản hoặc mật khẩu không được bỏ trống.";
            return $alert;
        } else {
            $query = "SELECT * FROM quantrivien WHERE TenDangNhap = '$TenDangNhap' AND MatKhau = '$MatKhau' LIMIT 1";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('QTVLOGIN', true);
                Session::set('QTVID', $value['MaQuanTri']);
                Session::set('QTVTENDANGNHAP', $value['TenDangNhap']);
                Session::set('QTVLEVEL', $value['CapBac']);
                Session::set('QTVTEN', $value['Ten']);
                header('Location:dangnhap.php');
                // $alert = "Tài khoản hoặc mật khẩu đúng rồi." .  $value['Ten'];
                // return $alert;
            } else {
                $alert = "Tài khoản hoặc mật khẩu không đúng.";
                return $alert;
            }
        }
    }

    public function getadmin_admin()
    {
        $SoQuanTri = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $QT = ($Page - 1) * $SoQuanTri;
        $query = "SELECT * FROM quantrivien WHERE quantrivien.CapBac = 1 ORDER BY MaQuanTri DESC LIMIT $QT, $SoQuanTri";
        $result = $this->db->select($query);
        return $result;
    }

    public function getadmin()
    {
        $query = "SELECT * FROM quantrivien WHERE quantrivien.CapBac = 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_admin($id)
    {
        $query = "DELETE FROM quantrivien WHERE MaQuanTri = '$id'";
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Xóa nhân viên thành công.
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
                                <strong class='font__weight-semibold'>Ôi không!</strong> Xóa nhân viên thất bại rồi!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
            return $alert;
        }
    }

    public function show_admin_all_admin_search($string)
    {
        $query = "SELECT * FROM quantrivien WHERE quantrivien.SDT LIKE '%$string%' AND quantrivien.CapBac = 1 ORDER BY MaQuanTri DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_admin_all_admin_page_search($string)
    {
        $SoAdmin = 5;
        if (!isset($_GET['Page'])) {
            $Page = 1;
        } else {
            $Page = $_GET['Page'];
        }
        $AD = ($Page - 1) * $SoAdmin;
        $query = "SELECT * FROM quantrivien WHERE quantrivien.SDT LIKE '%$string%' AND quantrivien.CapBac = 1 ORDER BY MaQuanTri DESC LIMIT $AD, $SoAdmin";
        $result = $this->db->select($query);
        return $result;
    }

    public function add_admin($data)
    {
        $Ten = mysqli_real_escape_string($this->db->link, $data['Ten']);
        $TenDangNhap = mysqli_real_escape_string($this->db->link, $data['TenDangNhap']);
        $MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);
        $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
        if (empty($Ten) || empty($TenDangNhap) || empty($MatKhau) || empty($SDT)) {
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
            $query = "INSERT INTO quantrivien(Ten, TenDangNhap, MatKhau, SDT, CapBac) VALUES ('$Ten', '$TenDangNhap', '$MatKhau', '$SDT', 1)";
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
                                    <strong class='font__weight-semibold'>Chúc mừng!</strong> Thêm nhân viên thành công.
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
                                    <strong class='font__weight-semibold'>Ôi không!</strong> Thêm nhân viên thất bại rồi!
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

    public function get_details_admin($id)
    {
        $query = "
            SELECT * FROM quantrivien WHERE quantrivien.MaQuanTri = '$id'
            ";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_admin($data, $id)
    {
        $Ten = mysqli_real_escape_string($this->db->link, $data['Ten']);
        $TenDangNhap = mysqli_real_escape_string($this->db->link, $data['TenDangNhap']);
        $MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);
        $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
        if (empty($Ten) || empty($TenDangNhap) || empty($MatKhau) || empty($SDT)) {
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
            $query = "UPDATE quantrivien SET 
            Ten = '$Ten',
            TenDangNhap = '$TenDangNhap',
            MatKhau = '$MatKhau',
            SDT = '$SDT'
            WHERE MaQuanTri = '$id'
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
}

?>