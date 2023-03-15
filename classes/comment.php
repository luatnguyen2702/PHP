<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class comment
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getcomment($id){
        $query = "SELECT binhluan.*,khachhang.Ten, khachhang.AnhDaiDien FROM binhluan,khachhang WHERE binhluan.MaSanPham = '$id' AND binhluan.MaKhachHang = khachhang.MaKhachHang";
        $result = $this->db->select($query);
        return $result;
    }

    public function addcomment($data,$id){
        $NoiDung = mysqli_real_escape_string($this->db->link, $data['NoiDung']);
        $MaKhachHang = Session::get('CTM_id');
        $query = "INSERT INTO binhluan(MaKhachHang,MaSanPham,NoiDung) VALUES ('$MaKhachHang','$id','$NoiDung')";
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
                                <strong class='font__weight-semibold'>Chúc mừng!</strong> Đăng bình luận thành công!.
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
                            <strong class='font__weight-semibold'>Ôi không!</strong> Đăng bình luận không thành công!
                        </div>
                    </div>
                </div>
        </section>";
            return $alert;
        }
    }

    
}
?>