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
        //isUserExist check
        public function isUserExist($useremail){
            $this->sql = "SELECT * FROM `users` WHERE `user_email` = '$useremail'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
        //isMessExist check
        public function isMessExist($messname){
            $this->sql = "SELECT * FROM `mess` WHERE `mess_name` = '$messname'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
        //create mess
        public function createMess($messname){
            $this->sql = "INSERT INTO `mess`(`mess_name`) VALUES ('$messname')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->con->insert_id;
            }else{
                return false;
            }
        }
        //create user
        public function createUser($username,$useremail,$password,$usermobile,$messId){
            $this->sql = "INSERT INTO `users`(`user_name`,`user_role`, `user_mobile`, `user_email`, `user_password`, `mess_id`) VALUES ('$username','Monitor','$usermobile','$useremail','$password','$messId')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->con->insert_id;
            }else{
                return false;
            }
        }
        //retriveUser by email
        public function retriveUser($email){
            $this->sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //start a new month
        public function start_month($start_date,$messId,$created_by){
            $this->sql = "INSERT INTO `month_details`(`mess_id`, `start_date`, `created_by`) VALUES ('$messId','$start_date','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
    }

?>