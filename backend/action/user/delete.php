<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['user-id'])){
        $user_id = $_GET['user-id'];
        
        $status = $obj->deleteUser($user_id);
        if($status == true){
            Flass_data::addsuccess('Delete User SuccessFully!');
            header("location:../../view-user.php"); 
            exit();
        }else{
            Flass_data::addError('Can not delete this user!');
            header("location:../../view-user.php"); 
            exit();
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>