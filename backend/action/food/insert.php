<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $food_type = $_POST['food_type'];
        $food_list = addslashes($_POST["food_list"]);
        $messId = $_POST['mess_id'];

        //create mess
        $status = $obj->addFood($user_id,$food_type,$food_list,$messId);
        if($status === true){
            Flass_data::addsuccess('Food Preference Added Successfully!');
            header("location:../../add-food.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-food.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>