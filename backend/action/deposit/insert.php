<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $created_by = $_POST['created_by'];
        $pay_date = $_POST['pay_date'];
        $member_money = $_POST["member_money"];
        $messId = $_POST['mess_id'];

        //create mess
        $status = $obj->addDeposit($user_id,$pay_date,$member_money,$messId,$created_by);
        if($status === true){
            Flass_data::addsuccess('Deposit Added Successfully!');
            header("location:../../add-deposit.php"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-deposit.php"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>