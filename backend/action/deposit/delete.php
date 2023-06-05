<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $status = $obj->deleteDeposit($id);
        if($status == true){
            Flass_data::addsuccess('Delete Deposit SuccessFully!');
            header("location:../../view-deposit.php"); 
            exit();
        }else{
            Flass_data::addError('Can not delete this!');
            header("location:../../view-deposit.php"); 
            exit();
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>