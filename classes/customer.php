<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class customer
{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_customer($data){
        $Ten = mysqli_real_escape_string($this->db->link, $data['Ten']);
        $Phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
        $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
        $Password = mysqli_real_escape_string($this->db->link, ($data['Password']));
        $ConfirmPassword = mysqli_real_escape_string($this->db->link, ($data['ConfirmPassword']));


        if ($Ten == "" || $Phone == "" || $Email == "" || $Password == "" || $ConfirmPassword == "") {
            $alert = "<section>
                <div class='container mt-5'>
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
                                <strong class='font__weight-semibold'>Cảnh báo!</strong> Vui lòng kiểm tra lại đầy đủ thông tin còn thiếu.
                            </div>
                        </div>
                    </div>
            </section>";
            return $alert;
        } else {
            $check_email = "SELECT * FROM khachhang WHERE Email = '$Email'";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                return "
                    <section class='fade-up-down>
                <div class='container mt-5'>
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
                                <strong class='font__weight-semibold'>Cảnh báo!</strong> Email này đã tồn tại trên hệ thống!.
                            </div>
                        </div>
                    </div>
            </section>
                    ";
            } else {
                if ($Password != $ConfirmPassword) {
                    return "
                    <section class='fade-up-down>
                <div class='container mt-5'>
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
                                <strong class='font__weight-semibold'>Cảnh báo!</strong> Mật khẩu không trùng khớp!.
                            </div>
                        </div>
                    </div>
            </section>
                    ";
                } else {
                    $query = "INSERT INTO khachhang(Ten,TenDangNhap,Email,MatKhau,SDT,DiaChi,DiemTichLuy,AnhDaiDien) VALUES ('$Ten','$Email','$Email','$Password','$Phone','Trống','0','UploadedFilesUser/images/avt_default.png')";
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
                                            <strong class='font__weight-semibold'>Chúc mừng!</strong> Đăng ký tài khoản thành công!.
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>";
                        return $alert;
                    } else {
                        $alert = "<section>
                        <div class='container mt-5'>
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
                                        <strong class='font__weight-semibold'>Ôi không!</strong> Đăng ký tài khoản không thành công!
                                    </div>
                                </div>
                            </div>
                    </section>";
                        return $alert;
                    }
                }
            }
        }
    }

    public function login_customer($data){
        $email = mysqli_real_escape_string($this->db->link, $data['Email']);
        $password = mysqli_real_escape_string($this->db->link, ($data['Password']));
        if (empty($email) || empty($password)) {
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
            $check_email = "SELECT * FROM khachhang WHERE TenDangNhap = '$email'";
            $result_check = $this->db->select($check_email);
            if (!$result_check) {
                return "<section class='fade-up-down'>
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
                                    <strong class='font__weight-semibold'>Cảnh báo!</strong> Địa chỉ Email không tồn tại!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
            } else {
                $query = "SELECT * FROM khachhang WHERE TenDangNhap = '$email' AND MatKhau = '$password'";
                $result = $this->db->select($query);

                if ($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set('CTM_login', true);
                    Session::set('CTM_id',  $value['MaKhachHang']);
                    Session::set('CTM_name', $value['Ten']);
                    Session::set('CTM_email', $value['Email']);
                    Session::set('CTM_image', $value['AnhDaiDien']);
                    $alert = "<meta http-equiv='refresh' content='0;URL=index.php'>";
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
                                        <strong class='font__weight-semibold'>Ôi không!</strong> Tài khoản hoặc mật khẩu không đúng!
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

    public function show_customers($id){
        $query = "SELECT * FROM khachhang WHERE MaKhachHang = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_customer($data, $file, $id){
        $Ten = mysqli_real_escape_string($this->db->link, $data['Ten']);
        $Phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
        $DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);

        //Kiểm tra hình ảnh
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = "UploadedFilesUser/images/" . substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "./admin/" . $unique_image;


        if ($Ten == "" || $Phone == "" || $DiaChi == "") {
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
                $query = "UPDATE khachhang SET 
                    Ten = '$Ten', 
                    SDT = '$Phone',
                    DiaChi = '$DiaChi',
                    AnhDaiDien = '$unique_image'
                    WHERE MaKhachHang = '$id'
                    ";
            } else {
                //Không chọn ảnh mới
                $query = "UPDATE khachhang SET 
                Ten = '$Ten', 
                SDT = '$Phone',
                DiaChi = '$DiaChi'
                WHERE MaKhachHang = '$id'
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

    public function change_password($data, $id){
        // if (empty($OldPassword) || empty($NewPassword) || empty($ConfirmPassword)) {
        //     $alert = "<section class='fade-up-down'>
        //     <div class='container mt-5'>
        //         <div class='row'>
        //             <div class='row'>
        //                 <div class='col-sm-12'>
        //                     <div class='alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show' role='alert' data-brk-library='component__alert'>
        //                         <button type='button' class='close font__size-18' data-dismiss='alert'>
        //                             <span aria-hidden='true'>
        //                                 <i class='fa fa-times warning'></i>
        //                             </span>
        //                             <span class='sr-only'>Close</span>
        //                         </button>
        //                         <i class='start-icon fa fa-exclamation-triangle faa-flash animated'></i>
        //                         <strong class='font__weight-semibold'>Cảnh báo!</strong> Vui lòng điền đầy đủ thông tin còn trống !
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </section>";
        //     return $alert;
        // } else {
            $OldPassword = mysqli_real_escape_string($this->db->link, ($data['OldPassword']));
            $NewPassword = mysqli_real_escape_string($this->db->link, ($data['NewPassword']));
            $ConfirmPassword = mysqli_real_escape_string($this->db->link, ($data['ConfirmPassword']));
            if ($NewPassword != $ConfirmPassword) {
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
                                    <strong class='font__weight-semibold'>Cảnh báo!</strong> Mật khẩu mới không trùng khớp!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
                return $alert;
            } else {
                $check_pass = "SELECT * FROM khachhang WHERE MatKhau = '$OldPassword' AND MaKhachHang = '$id'";
                $result_check = $this->db->select($check_pass);
                if (!$result_check) {
                    return "<section class='fade-up-down'>
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
                                        <strong class='font__weight-semibold'>Cảnh báo!</strong> Mật khẩu cũ không chính xác!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>";
                } else {
                    $query = "UPDATE khachhang SET 
                    MatKhau = '$NewPassword'
                    WHERE MaKhachHang = '$id'";
                    $result = $this->db->update($query);
                    if ($result != false) {
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
                                            <strong class='font__weight-semibold'>Chúc mừng!</strong> Đổi mật khẩu thành công! <a href='dangnhap.php'> Vui lòng đăng nhập lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>";
                        // Session::set('CTM_login', false);
                        Session::destroy();
                        return $alert;
                        
                    } else {
                    }
                }
            }
       // }
    }

    public function getcustomer()
    {
        $query = "SELECT * FROM khachhang ORDER BY MaKhachHang DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcustomer_admin()
    {
        $SoKH = 5;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $KH = ($Page-1)*$SoKH;
        $query = "SELECT * FROM khachhang ORDER BY MaKhachHang DESC LIMIT $KH, $SoKH";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcustomer_search($string)
    {
        $query = "SELECT * FROM khachhang WHERE khachhang.SDT LIKE '%$string%' ORDER BY MaKhachHang DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getcustomer_admin_search($string)
    {
        $SoKH = 5;
        if(!isset($_GET['Page'])){
            $Page = 1;
        }else{
            $Page = $_GET['Page'];
        }
        $KH = ($Page-1)*$SoKH;
        $query = "SELECT * FROM khachhang WHERE khachhang.SDT LIKE '%$string%' ORDER BY MaKhachHang DESC LIMIT $KH, $SoKH";
        $result = $this->db->select($query);
        return $result;
    }
}

?>