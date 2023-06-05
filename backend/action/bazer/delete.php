<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $status = $obj->deleteBazar($id);
        if($status == true){
            Flass_data::addsuccess('Delete bazar SuccessFully!');
            header("location:../../view-bazer.php"); 
            exit();
        }else{
            Flass_data::addError('Can not delete this bazar!');
            header("location:../../view-bazer.php"); 
            exit();
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>