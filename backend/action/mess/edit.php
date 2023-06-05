<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        echo $messId = $_POST['mess_id'];
        echo $messname = $_POST['mess_name'];
        echo $messtype = $_POST["mess_type"];
        echo $messaddress = $_POST['mess_address'];

        $isMess = $obj->isMessExist($messname,$messId);
        // echo $isMess;
        if($isMess === true){
            Flass_data::addError('Mess name already exist!');
            header("location:../../edit-mess.php"); 
            exit();
        }
        //create mess
        $status = $obj->editMess($messId,$messname,$messtype,$messaddress);
        if($status === true){
            Flass_data::addsuccess('Edit Success!');
            header("location:../../edit-mess.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../edit-mess.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>