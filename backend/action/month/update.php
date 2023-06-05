<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $month_id = $_POST['month_id'];
        $month_name = $_POST['month_name'];
        

        //create mess
        $status = $obj->updateMonthName($month_id,$month_name);
        echo $status;
        if($status === true){
            Flass_data::addsuccess('Edit Successfully!');
            header("location:../../edit-month.php?month-id=$month_id"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../edit-month.php?month-id=$month_id"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>