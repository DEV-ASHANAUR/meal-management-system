<?php
    session_start();
    include "../controller/main.php";
    include "../Flash_data.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $username = $_POST['user_name'];
        $messname = $_POST['mess_name'];
        $useremail = $_POST['user_email'];
        $usermobile = $_POST['user_mobile'];
        $password = $_POST['password'];
        if($username === "" || $messname === "" || $useremail === "" || $usermobile === "" || $password === ""){
            Flass_data::auth('All field Are Required!');
            header("location:../register.php"); 
            exit();
        }
        
        $isUser = $obj->isUserExist($useremail);
        if($isUser === true){
            Flass_data::auth('You have already an account!');
            header("location:../register.php"); 
            exit();
        }
        $isMess = $obj->isMessExist($messname);
        if($isMess === true){
            Flass_data::auth('Mess name already exist!');
            header("location:../register.php"); 
            exit();
        }
        //create mess
        $messId = $obj->createMess($messname);
        if($messId > 0){
            $status = $obj->createUser($username,$useremail,md5($password),$usermobile,$messId);
            if($status === true){
                Flass_data::auth('Success - please Login!');
                header("location:../login.php"); 
                exit();
            }
        }else{
            Flass_data::auth('Something went wrong!');
            header("location:../register.php"); 
            exit();
        }
        
    }else{
        header('location:../index.php');
        exit();
    }

?>