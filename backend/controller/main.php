<?php
    class Main{
        protected $host = "localhost";
        protected $user = "root";
        protected $pass = "";
        protected $db = "php_meal";
        protected $con;
        protected $result;


        //database conection
        public function __construct(){
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if(!$this->con){
                    $_SESSION['error'] = "Can not Connect Database";
                }
            }
            return $this->con;
        }
        //create mess
        public function viewMessById($messId){
            $this->sql = "SELECT * FROM `mess` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //isMessExist
        public function isMessExist($messName,$messId){
            $this->sql = "SELECT * FROM `mess` WHERE `mess_id` != '$messId' AND `mess_name` = '$messName'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
        //editMess
        public function editMess($messId,$messname,$messtype,$messaddress){
            $this->sql = "UPDATE `mess` SET `mess_name`='$messname',`mess_address`='$messaddress',`mess_type`='$messtype' WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
    }

?>