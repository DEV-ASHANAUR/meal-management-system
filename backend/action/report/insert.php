<?php
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();


    if(isset($_POST['submit'])){

        $user_name = $_POST['user_name'];
        $meal_rate = $_POST['meal_rate'];
        $total_meal = $_POST['total_meal'];
        $total_cost = $_POST['total_cost'];
        $deposit_amount = $_POST['deposit_amount'];
        $balance = $_POST['balance'];
        $created_by = $_POST["created_by"];
        $mess_id = $_POST['mess_id'];
        $date = $_POST['today'];
        //get the month details by mess id and where status = 0
        $monthDetails = $obj->getMonthDetails($mess_id);
        if($monthDetails->num_rows>0){
            while($row = $monthDetails->fetch_object()){
                $monthId = $row->month_id;
            }
        }

        if($monthId > 0){
            //update month details table with end date and status = 1
            $updateStatus = $obj->updateMonthDetails($monthId,$date); 
            if($updateStatus == true){
                $reportStatus = false;
                for ($i=0; $i < count($user_name); $i++) { 
                    $reportStatus = $obj->createReport($user_name[$i],$meal_rate[$i],$total_meal[$i],$total_cost[$i],$deposit_amount[$i],$balance[$i],$monthId,$created_by);
                }
            } 

            if($reportStatus == true){
                $startStatus = $obj->start_month($date,$mess_id,$created_by);
                if($startStatus === true){
                    Flass_data::addsuccess('Successfully Store Present Month Report And Start New Month!');
                    header("location:../../member-details.php"); 
                    exit();
                }
                else{
                    Flass_data::addError('Something went wrong!');
                    header("location:../../member-details.php"); 
                    exit();
                }
            }

        }else{
            Flass_data::addError('Month id nai!');
            header("location:../../member-details.php"); 
            exit();
        }

        
        
    }else{
        header('location:../../index.php');
        exit();
    }

?>