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
        public function getOtherCost($messId){
            $this->sql = "SELECT other_cost.*,users.user_name as user_name FROM other_cost INNER JOIN users ON users.user_id = other_cost.user_id WHERE other_cost.mess_id = '$messId'";
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
        //add other
        public function addOther($user_id,$other_date,$other_amount,$other_description,$messId,$created_by){
            $this->sql = "INSERT INTO `other_cost`(`other_amount`, `user_id`, `mess_id`, `other_description`, `other_date`, `created_by`) VALUES ('$other_amount','$user_id','$messId','$other_description','$other_date','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //retriveOtherbyid
        public function retriveOtherbyid($other_id){
            $this->sql = "SELECT * FROM other_cost  WHERE other_id = '$other_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //update other cost
        public function updateOtherCost($other_id,$user_id,$other_date,$other_amount,$other_description,$messId,$created_by){
            $this->sql = "UPDATE `other_cost` SET `other_amount`='$other_amount',`user_id`='$user_id',`mess_id`='$messId',`other_description`='$other_description',`other_date`='$other_date',`created_by`='$created_by' WHERE `other_id` = '$other_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //get member deposit
        public function getMembersDeposit($messId){
            $this->sql = "SELECT member_money.*,users.user_name as user_name FROM member_money INNER JOIN users ON users.user_id = member_money.user_id WHERE member_money.mess_id = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //add deposit
        public function addDeposit($user_id,$pay_date,$member_money,$messId,$created_by){
            $this->sql = "INSERT INTO `member_money`(`user_id`, `mess_id`, `money`, `pay_date`, `created_by`) VALUES ('$user_id','$messId','$member_money','$pay_date','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //retriveDepositbyid
        public function retriveDepositbyid($depositId){
            $this->sql = "SELECT * FROM member_money WHERE `id` = '$depositId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //updateMemberDeposit
        public function updateMemberDeposit($deposit_id,$user_id,$pay_date,$member_money,$messId,$created_by){
            $this->sql = "UPDATE `member_money` SET `user_id`='$user_id',`mess_id`='$messId',`money`='$member_money',`pay_date`='$pay_date',`created_by`='$created_by' WHERE `id` = '$deposit_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        /**
         * caluculate total deposit
         */
        public function total_deposit($messId){
            $this->sql = "SELECT SUM(money) as total_deposit FROM `member_money` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows> 0 ){
                $row = $this->result->fetch_object();
                return $row->total_deposit;
            }else{
                return 0;
            }
        }
        /**
         * caluculate Bazer cost
         */
        public function total_bazer($messId){
            $this->sql = "SELECT SUM(bazer_amount) as total_bazer FROM `bazer_cost` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows> 0 ){
                $row = $this->result->fetch_object();
                return $row->total_bazer;
            }else{
                return 0;
            }
        }
        /**
         * caluculate others cost
         */
        public function total_others_cost($messId){
            $this->sql = "SELECT SUM(other_amount) as total FROM `other_cost` WHERE mess_id = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows> 0 ){
                $row = $this->result->fetch_object();
                return $row->total;
            }else{
                return 0;
            }
        }
        /**
         * caluculate toatl meal
         */
        public function total_meal($messId){
            $this->sql = "SELECT SUM(meal) as total FROM `meals` WHERE mess_id = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows> 0 ){
                $row = $this->result->fetch_object();
                return $row->total;
            }else{
                return 0;
            }
        }
        /**
         * caluculate toatl member
         */
        public function total_member($messId){
            $this->sql = "SELECT COUNT(*) as total FROM `users` WHERE mess_id = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result->num_rows > 0 ){
                $row = $this->result->fetch_object();
                return $row->total;
            }else{
                return 0;
            }
        }
        /**
         * get member deposit
         */
        public function member_deposit($messId){
            $this->sql = "SELECT SUM(member_money.money) as total, users.user_name as user_name,users.user_id FROM `member_money` INNER JOIN users ON users.user_id = member_money.user_id WHERE member_money.mess_id = '$messId' GROUP BY users.user_id";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        /**
         * get member wise total meal
         */
        public function member_meal($messId){
            $this->sql = "SELECT SUM(meals.meal) as total, users.user_name as user_name,users.user_id FROM `meals` INNER JOIN users ON users.user_id = meals.user_id WHERE meals.mess_id = '$messId' GROUP BY users.user_id";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //get the month details by mess id and where status = 0
        public function getMonthDetails($mess_id){
            $this->sql = "SELECT * FROM `month_details` WHERE `mess_id` = '$mess_id' AND status = 0";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            } 
        }
        //update month details table with end date and status = 1
        public function updateMonthDetails($monthId,$date){
            $this->sql = "UPDATE `month_details` SET `end_date`='$date',`status`= 1 WHERE `month_id` = '$monthId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            } 
        }
        //create month wise report
        public function createReport($user_name,$meal_rate,$total_meal,$total_cost,$deposit_amount,$balance,$monthId,$created_by){
            $this->sql = "INSERT INTO `month_report`(`user_name`, `meal_rate`, `total_meal`, `total_cost`, `deposit_amount`, `balance`, `month_id`, `created_by`) VALUES ('$user_name','$meal_rate','$total_meal','$total_cost','$deposit_amount','$balance','$monthId','$created_by')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
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
        //delete all bazer cost by messId
        public function deleteAllBazer($messId){
            $this->sql = "DELETE FROM `bazer_cost` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //delete all Others cost by messId
        public function deleteAllOthers($messId){
            $this->sql = "DELETE FROM `other_cost` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //delete all Meals cost by messId
        public function deleteAllMeals($messId){
            $this->sql = "DELETE FROM `meals` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //delete all Member's Money cost by messId
        public function deleteAllMembersMoney($messId){
            $this->sql = "DELETE FROM `member_money` WHERE `mess_id` = '$messId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //getHistory into the month details table
        public function getHistory($messId){
            $this->sql = "SELECT * FROM `month_details` WHERE `mess_id` =  '$messId' AND `status` = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //get report by month id
        public function getReport($monthId){
            $this->sql = "SELECT * FROM `month_report` WHERE `month_id` = '$monthId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //updatePaidStatus
        public function updatePaidStatus($reportId,$status){
            $this->sql = "UPDATE `month_report` SET `paid_status`='$status' WHERE `report_id` = '$reportId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //>retriveMonthById($m_id)
        public function retriveMonthById($m_id){
            $this->sql = "SELECT * FROM `month_details` WHERE `month_id` = '$m_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //updateMonthName($month_id,$month_id)
        public function updateMonthName($month_id,$month_name){
            $this->sql = "UPDATE `month_details` SET `month_name`='$month_name' WHERE `month_id` = '$month_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }


    }

?>