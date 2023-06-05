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
        $deposit_id = $_POST['deposit_id'];

        //create mess
        $status = $obj->updateMemberDeposit($deposit_id,$user_id,$pay_date,$member_money,$messId,$created_by);
        if($status === true){
            Flass_data::addsuccess('Deposit Edit Successfully!');
            header("location:../../add-deposit.php?deposit-id=$deposit_id"); 
            exit();
        }
        else{
            Flass_data::addError('Something went wrong!');
            header("location:../../add-deposit.php?deposit-id=$deposit_id"); 
            exit();
        }
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>