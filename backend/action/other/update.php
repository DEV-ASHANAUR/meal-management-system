<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $other_id = $_POST['other_id'];
        $created_by = $_POST['created_by'];
        $other_date = $_POST['other_date'];
        $other_amount = $_POST["other_amount"];
        $other_description = addslashes($_POST['other_description']);
        $messId = $_POST['mess_id'];

        //create mess
        $status = $obj->updateOtherCost($other_id,$user_id,$other_date,$other_amount,$other_description,$messId,$created_by);
        if($status === true){
            Flass_data::addsuccess('Other Cost Edit Successfully!');
            header("location:../../add-other.php?other-id=$other_id"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-other.php?other-id=$other_id"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>