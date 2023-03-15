<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once  ($filepath.'/../lib/database.php');
    include_once  ($filepath.'/../helpers/format.php');
?>
<?php
    class store{
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function getstore_info(){
            $query = "SELECT * FROM thongtincuahang WHERE thongtincuahang.MaCuaHang = 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_buys(){
            $query = "SELECT s.*
            FROM chitiethoadon as c, sanpham as s
            WHERE c.MaSanPham = s.MaSanPham
            GROUP BY c.MaSanPham
            LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_information($data)
    {
        $TenCuaHang = mysqli_real_escape_string($this->db->link, $data['TenCuaHang']);
        $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
        $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
        $DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);
        $NgayThanhLap = mysqli_real_escape_string($this->db->link, $data['NgayThanhLap']);
        $ThoiGianMoCua = mysqli_real_escape_string($this->db->link, $data['ThoiGianMoCua']);
        $ThoiGianDongCua = mysqli_real_escape_string($this->db->link, $data['ThoiGianDongCua']);
        $LoiGioiThieu = mysqli_real_escape_string($this->db->link, $data['LoiGioiThieu']);
        $HinhAnhMinhHoa = mysqli_real_escape_string($this->db->link, $data['HinhAnhMinhHoa']);

        if (empty($TenCuaHang)||empty($SDT)||empty($Email)||empty($DiaChi)||empty($NgayThanhLap)||empty($ThoiGianMoCua)||empty($ThoiGianDongCua)||empty($LoiGioiThieu)||empty($HinhAnhMinhHoa)) {
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
            $query = "UPDATE thongtincuahang SET 
            TenCuaHang = '$TenCuaHang',
            SDT = '$SDT',
            Email = '$Email',
            DiaChi = '$DiaChi',
            NgayThanhLap = '$NgayThanhLap',
            ThoiGianMoCua = '$ThoiGianMoCua',
            ThoiGianDongCua = '$ThoiGianDongCua',
            LoiGioiThieu = '$LoiGioiThieu',
            HinhAnhMinhHoa = '$HinhAnhMinhHoa'
            WHERE MaCuaHang = 1
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