<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $created_by = $_POST['created_by'];
        $other_date = $_POST['other_date'];
        $other_amount = $_POST["other_amount"];
        $other_description = addslashes($_POST['other_description']);
        $messId = $_POST['mess_id'];

        //create mess
        $status = $obj->addOther($user_id,$other_date,$other_amount,$other_description,$messId,$created_by);
        echo $status;
        if($status === true){
            Flass_data::addsuccess('Other Cost Added Successfully!');
            header("location:../../add-other.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-other.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>