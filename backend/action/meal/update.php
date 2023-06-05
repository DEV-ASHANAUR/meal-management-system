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

        // print_r($user_id);
        // print_r($meal);

        //update meal
        $status = false;
        for ($i=0; $i < count($user_id); $i++) {
            $status = $obj->updateMeal($user_id[$i],$meal[$i],$created_by,$mess_id,$date);
        }
        // echo $status;
        if($status === true){
            Flass_data::addsuccess('Meal Edited Successfully!');
            header("location:../../add-meal.php?meal-date=$date"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-meal.php?meal-date=$date"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>