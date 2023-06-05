<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $status = $obj->deleteOther($id);
        if($status == true){
            Flass_data::addsuccess('Delete Other Cost SuccessFully!');
            header("location:../../view-others.php"); 
            exit();
        }else{
            Flass_data::addError('Can not delete this Other Cost!');
            header("location:../../view-others.php"); 
            exit();
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>