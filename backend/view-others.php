<?php  
    session_start();
    $page = 'manage_bazer';
    $sub_page = 'view_others';
    $page_title = 'Dashboard - View Others';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $OthersData = $obj->getOtherCost($messId);
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
        <li class="breadcrumb-item active">View Others</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View Others</span>
            <small class="d-sm-block"><a href="add-other.php" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle mr-1"></i>Add Others</a></small>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Si</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Shopper's Name</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                            if($OthersData->num_rows>0){
                                $si = 1;
                                while($row = $OthersData->fetch_object()){
                                    $d = strtotime($row->other_date);
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php echo $row->user_name; ?></td>
                            <td><?php echo number_format($row->other_amount,2) ?> Tk</td>
                            <td><?php echo $row->other_description; ?></td>
                            <td><?php echo date("Y-M-d", $d); ?></td>
                            <td>
                                <a class="btn btn-primary" href="add-other.php?other-id=<?php echo $row->other_id; ?>"><i class="fas fa-edit"></i></a>
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