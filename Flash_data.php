<?php
    class Flass_data
    {
        public static function show_error(){
            if(!isset($_SESSION['msg'])){
                return null;
            }
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
            return implode("<br>", $msg);
        }
        public static function auth($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['auth'] = $msg;
        }
        public static function addsuccess($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['addsuccesss'] = $msg;
        }
        public static function addError($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['add_error'] = $msg;
        }
    }
?>