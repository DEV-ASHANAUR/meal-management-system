<?php  
    session_start();
    $page = 'manage_prev_month';
    $sub_page = 'view_details';
    $page_title = 'Dashboard - View Details';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $HistoryData = $obj->getHistory($messId);
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
                            <th>Month Name</th>
                            <th>Start - End</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Month Name</th>
                            <th>Start - End</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                            if($HistoryData->num_rows>0){
                                $si = 1;
                                while($row = $HistoryData->fetch_object()){
                                    $sd = strtotime($row->start_date);
                                    $ed = strtotime($row->end_date);
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php if($row->month_name === null){echo "Not Set";}else{echo $row->month_name;} ?></td>
                            <td><?php echo date("Y-M-d", $sd); ?> - <?php echo date("Y-M-d", $ed); ?></td>
                            <td>
                                <a class="btn btn-success" href="view-report.php?month-id=<?php echo $row->month_id; ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary" href="edit-month.php?month-id=<?php echo $row->month_id; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="#"><i class="fas fa-trash"></i></a>
                            </td>
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