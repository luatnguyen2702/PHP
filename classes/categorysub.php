<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once  ($filepath.'/../lib/database.php');
    include_once  ($filepath.'/../helpers/format.php');
?>
<?php
    class categorysub{
        private $db;
        private $fm;

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function getdanhmuccon($iddanhmuc){
            $query = "SELECT * FROM danhmuccon WHERE MaDanhMuc = '$iddanhmuc'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getdanhmucconall(){
            $query = "SELECT * FROM danhmuccon";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcategorysublist(){
            $query = "SELECT * FROM danhmuccon";
            $result = $this->db->select($query);
            return $result;
        }

        
    }
?>