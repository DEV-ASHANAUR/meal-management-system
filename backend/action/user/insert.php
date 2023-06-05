<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST["user_email"];
        $user_mobile = $_POST['user_mobile'];
        $password = $_POST['password'];
        $messId = $_POST['mess_id'];


        $isUser = $obj->isUserExist($user_email);
        // echo $isMess;
        if($isUser === true){
            Flass_data::addError('This user already exist!');
            header("location:../../add-user.php"); 
            exit();
        }
        //create mess
        $status = $obj->createUser($user_name,$user_role,$user_email,$user_mobile,$messId,md5($password));
        if($status === true){
            Flass_data::addsuccess('User created Successfully!');
            header("location:../../add-user.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-user.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>