<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['meal-date'])){
        $meal_date = $_GET['meal-date'];
        
        $status = $obj->deleteMeal($meal_date);
        if($status == true){
            Flass_data::addsuccess('Delete Meal SuccessFully!');
            header("location:../../view-meal.php"); 
            exit();
        }else{
            Flass_data::addError('Can not delete this meal!');
            header("location:../../view-meal.php"); 
            exit();
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>