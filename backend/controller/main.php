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
        //create user
        public function createUser($user_name,$user_role,$user_email,$user_mobile,$messId,$password){
            $this->sql = "INSERT INTO `users`(`user_name`,`user_role`, `user_mobile`, `user_email`, `user_password`, `mess_id`) VALUES ('$user_name','$user_role','$user_mobile','$user_email','$password','$messId')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //get all user by mess id
        public function getAllUser($messId){
            $this->sql = "SELECT * FROM `users` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //retriveUserbyid
        public function retriveUserbyid($user_id){
            $this->sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //check any other same to me or not
        public function retrivewithoutme($id,$email){
            $this->sql = "SELECT * FROM `users` WHERE `user_id` != '$id' AND `user_email` = '$email'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //update user
        public function updateUser($id,$user_name,$user_email,$user_role,$password,$user_mobile){
            $this->sql = "UPDATE `users` SET `user_name`='$user_name',`user_role`='$user_role',`user_mobile`='$user_mobile',`user_email`='$user_email',`user_password`='$password' WHERE `user_id` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //user update without password
        public function updateUserwithoutpass($id,$user_name,$user_email,$user_role,$user_mobile){
            $this->sql = "UPDATE `users` SET `user_name`='$user_name',`user_role`='$user_role',`user_mobile`='$user_mobile',`user_email`='$user_email' WHERE `user_id` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        public function isMealExist($date,$mess_id){
            $this->sql = "SELECT * FROM `meals` WHERE `mess_id` = '$mess_id' AND `meal_date` = '$date'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
        //createMeal
        public function createMeal($user_id,$meal,$created_by,$mess_id,$date){
            $this->sql = "INSERT INTO `meals`(`user_id`, `mess_id`, `meal`, `meal_date`, `created_by`) VALUES ('$user_id','$mess_id','$meal','$date','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //update meal
        public function updateMeal($user_id,$meal,$created_by,$mess_id,$date){
            $this->sql = "UPDATE `meals` SET `meal`='$meal',`created_by`='$created_by' WHERE `user_id` = '$user_id' AND `mess_id` = '$mess_id' AND `meal_date` = '$date'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //getMealByGroupOfDate -
        //get regular meal list by mess id
        public function getMealByGroupOfDate($messId){
            $this->sql = "SELECT sum(meal) as total,`meal_date` FROM `meals` WHERE `mess_id` = '$messId' GROUP BY `meal_date`";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //get meal for view and edit 
        public function getMealByDate($messId,$date){
            $this->sql = "SELECT meals.*,users.user_name as username FROM meals INNER JOIN users ON users.user_id = meals.user_id WHERE meals.mess_id = '$messId' AND meals.meal_date = '$date'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //add bazer
        public function addBazer($user_id,$bazer_date,$bazer_amount,$bazer_description,$messId,$created_by){
            $this->sql = "INSERT INTO `bazer_cost`(`user_id`, `mess_id`, `bazer_amount`, `bazer_description`, `bazer_date`, `created_by`) VALUES ($user_id,'$messId','$bazer_amount','$bazer_description','$bazer_date','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //update bazer
        public function updateBazer($bazer_id,$user_id,$bazer_date,$bazer_amount,$bazer_description,$messId,$created_by){
            $this->sql = "UPDATE `bazer_cost` SET `user_id`='$user_id',`mess_id`='$messId',`bazer_amount`='$bazer_amount',`bazer_description`='$bazer_description',`bazer_date`='$bazer_date',`created_by`='$created_by' WHERE `bazer_id` = '$bazer_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //getBazer
        public function getBazer($messId){
            $this->sql = "SELECT bazer_cost.*,users.user_name as user_name FROM bazer_cost INNER JOIN users ON users.user_id = bazer_cost.user_id WHERE bazer_cost.mess_id = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //retriveBazerbyid
        public function retriveBazerbyid($bazerId){
            $this->sql = "SELECT * FROM bazer_cost  WHERE bazer_id = '$bazerId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
    }

?>