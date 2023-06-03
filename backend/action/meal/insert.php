<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $meal = $_POST['meal'];
        $created_by = $_POST["created_by"];
        $mess_id = $_POST['mess_id'];
        $date = $_POST['date'];


        $isMealAdded = $obj->isMealExist($date,$mess_id);
        // echo $isMess;
        if($isMealAdded === true){
            Flass_data::addError('This Date already Taken!');
            header("location:../../add-meal.php"); 
            exit();
        }
        //create mess
        $status = false;
        for ($i=0; $i < count($user_id); $i++) { 
            $status = $obj->createMeal($user_id[$i],$meal[$i],$created_by,$mess_id,$date);
        }
        // echo $status;
        if($status === true){
            Flass_data::addsuccess('Meal Added Successfully!');
            header("location:../../add-meal.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-meal.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>