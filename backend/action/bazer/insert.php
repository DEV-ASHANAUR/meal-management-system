<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $created_by = $_POST['created_by'];
        $bazer_date = $_POST['bazer_date'];
        $bazer_amount = $_POST["bazer_amount"];
        $bazer_description = addslashes($_POST['bazer_description']);
        $messId = $_POST['mess_id'];

        //create mess
        $status = $obj->addBazer($user_id,$bazer_date,$bazer_amount,$bazer_description,$messId,$messId,$created_by);
        echo $status;
        if($status === true){
            Flass_data::addsuccess('Bazer Added Successfully!');
            header("location:../../add-bazer.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-bazer.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>