<?php  
    session_start();
    $page = 'manage_member_details';
    $sub_page = 'view_member_details';
    $page_title = 'Dashboard - View Member Details';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    //today 
    $today = date('Y-m-d');
    //all calculation 
    $total_deposit = $obj->total_deposit($messId);
    $total_bazer = $obj->total_bazer($messId);
    $total_others_cost = $obj->total_others_cost($messId);
    $total_meal = $obj->total_meal($messId);
    $total_member = $obj->total_member($messId);
    $total_cost = ($total_bazer + $total_others_cost);
    if($total_meal == 0){
        $meal_rate = 0;
    }else{
        $meal_rate = ($total_cost/$total_meal);
    }
    $mess_balance = ($total_deposit - $total_cost);
    //calculation end

    
    
    $member_meal = $obj->member_meal($messId);

    ?>

<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-gray-800">Meal System</h3>

    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">View Details</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View Details</span>
        </div>
        <div class="card-body">
            <?php
                if(isset($_SESSION['msg']['addsuccesss'])){
                    ?>
            <script type="text/javascript">
            toastr.success("<?php echo Flass_data::show_error();?>");
            </script>
            <?php 
                    }
                ?>
            <?php
                if(isset($_SESSION['msg']['add_error'])){
                    ?>
            <script type="text/javascript">
            toastr.error("<?php echo Flass_data::show_error();?>");
            </script>
            <?php 
                }
            ?>
            <form action="action/report/insert.php" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Meal Rate</th>
                                <th>Total Meal</th>
                                <th>Total Cost</th>
                                <th>Total Deposit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($member_meal->num_rows > 0){
                                    $si = 1;
                                    while($row = $member_meal->fetch_object()){
                                        ?>
                            <tr id="">
                                <td><?php echo $si;?></td>
                                <td>
                                    <?php echo $row->user_name;?>
                                    <input type="hidden" name="user_name[]" value="<?php echo $row->user_name;?>">
                                </td>
                                <td>
                                    <?php echo number_format($meal_rate,2)." Tk" ?>
                                    <input type="hidden" name="meal_rate[]" value="<?php echo $meal_rate;?>">
                                </td>
                                <td>
                                    <?php echo $row->total;?>
                                    <input type="hidden" name="total_meal[]" value="<?php echo $row->total;?>">
                                </td>
                                <td>
                                    <?php echo number_format($meal_rate*$row->total,2) ?> Tk
                                    <input type="hidden" name="total_cost[]"
                                        value="<?php echo round($meal_rate*$row->total,2) ?>">
                                </td>

                                <td>
                                    <span>
                                        <?php $bal = ''; ?>
                                        <?php
                                            $member_deposit = $obj->member_deposit($messId);
                                            if($member_deposit->num_rows>0){
                                                while($deposit = $member_deposit->fetch_object()){
                                        
                                                   if($deposit->user_id == $row->user_id){
                                                      echo (number_format($deposit->total,2))." Tk"; 
                                                        ?>

                                        <input type="hidden" name="deposit_amount[]"
                                            value="<?php echo round($deposit->total,2) ?>">
                                        <?php
                                                        $bal = 0;
                                                   }
                                                }
                                            }
                                        ?>
                                    </span>
                                    <?php
                                        if($bal !== 0){
                                            ?>
                                    0.00 Tk
                                    <input type="hidden" name="deposit_amount[]" value="0">
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <span>
                                        <?php $bal = ''; ?>
                                        <?php
                                            $member_deposit1 = $obj->member_deposit($messId);
                                            if($member_deposit1->num_rows>0){
                                                while($deposit1 = $member_deposit1->fetch_object()){
                                                    if($deposit1->user_id == $row->user_id){
                                                       echo (number_format(($deposit1->total - ($meal_rate*$row->total)),2)). " Tk";
                                                       ?>
                                        <input type="hidden" name="balance[]"
                                            value="<?php echo round($deposit1->total - ($meal_rate*$row->total),2) ?>">
                                        <?php
                                                       $bal = 0;
                                                    }
                                                }
                                            }
                                        ?>
                                    </span>
                                    <?php
                                        if($bal !== 0){
                                            echo - number_format($meal_rate*$row->total,2)." Tk"
                                            ?>
                                    <input type="hidden" name="balance[]"
                                        value="<?php echo -(round($meal_rate*$row->total,2)) ?>">
                                        
                                    <?php
                                        }
                                    ?>
                                    <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_name']; ?>" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId; ?>" />
                                    <input type="hidden" name="today" value="<?php echo $today; ?>" />
                                    <input type="hidden" name="submit" />
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-right" colspan="7">
                                    <?php if($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Monitor'){
                                        if($member_meal->num_rows > 0){
                                            ?>
                                    <button onclick="return confirm('Are you sure you want to start new month?');"
                                        class="btn btn-info w-100 d-block">Save Present Data & Start New
                                        Month</button>
                                    <?php
                                        }
                                    } ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <form>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>