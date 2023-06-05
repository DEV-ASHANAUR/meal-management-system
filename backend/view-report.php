<?php  
    session_start();
    $page = 'manage_prev_month';
    $sub_page = 'view_report';
    $page_title = 'Dashboard - View Report';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    if(isset($_GET['month-id'])){
        $m_id = $_GET['month-id'];
        $ReportData = $obj->getReport($m_id);
    }
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
        <li class="breadcrumb-item active">View History</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View History</span>
            <!-- <small class="d-sm-block"><a href="add-bazer.php" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle mr-1"></i>Add Bazer</a></small> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Si</th>
                            <th>Name</th>
                            <th>Meal Rate</th>
                            <th>Total Meal</th>
                            <th>Total Cost</th>
                            <th>Deposit Amount</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <?php 
                            if($user_role == 'Manager' || $user_role == 'Monitor'){
                                ?>
                            <th>Action</th>
                            <?php 
                            }
                            ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Name</th>
                            <th>Meal Rate</th>
                            <th>Total Meal</th>
                            <th>Total Cost</th>
                            <th>Deposit Amount</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <?php 
                            if($user_role == 'Manager' || $user_role == 'Monitor'){
                                ?>
                            <th>Action</th>
                            <?php 
                            }
                            ?>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                            if($ReportData->num_rows>0){
                                $si = 1;
                                while($row = $ReportData->fetch_object()){
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php echo $row->user_name;?></td>
                            <td><?php echo $row->meal_rate; ?></td>
                            <td><?php echo $row->total_meal; ?></td>
                            <td><?php echo $row->total_cost; ?></td>
                            <td><?php echo $row->deposit_amount; ?></td>
                            <td><?php echo $row->balance; ?></td>
                            <td><?php if($row->paid_status == 0){echo 'unpaid';}else{echo 'paid';} ?></td>
                            
                            <?php 
                            if($user_role == 'Manager' || $user_role == 'Monitor'){
                                ?>
                                <td>
                                <a class="btn btn-success" href="action/report/update.php?report-id=<?php echo $row->report_id; ?>&status=<?php echo $row->paid_status; ?>&month-id=<?php echo $row->month_id; ?>">change status</a>
                                </td>
                            <?php 
                                }
                            ?>
                            
                        </tr>

                        <?php
                            $si++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>