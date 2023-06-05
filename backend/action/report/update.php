<?php 
    session_start();
    include "../../controller/main.php";
    include "../../Flash_data.php";
    $obj = new Main();
    if(isset($_GET['report-id']) && isset($_GET['status']) && isset($_GET['month-id'])){
        $report_id = $_GET['report-id'];
        $status = $_GET['status'];
        $monthId = $_GET['month-id'];
        if($status == 0){
            $status1 = $obj->updatePaidStatus($report_id,1);
            if($status1 == true){
                Flass_data::addsuccess('Status Updated!');
                header("location:../../view-report.php?month-id=$monthId"); 
                exit();
            }
        }else{
            $status1 = $obj->updatePaidStatus($report_id,0);
            if($status1 == true){
                Flass_data::addsuccess('Status Updated!');
                header("location:../../view-report.php?month-id=$monthId"); 
                exit();
            }
        }
    }else{
        header('location:../../index.php');
        exit();
    }
?>