<?php  
    session_start();
    $page = 'manage_meal';
    $sub_page = 'view_meal';
    $page_title = 'Dashboard - View Meal';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $mealData = $obj->getMealByGroupOfDate($messId);
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
        <li class="breadcrumb-item active">View Meal</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View Meal</span>
            <small class="d-sm-block"><a href="add-meal.php" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle mr-1"></i>Add Meal</a></small>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Si</th>
                            <th>Date</th>
                            <th>Total Meal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Date</th>
                            <th>Total Meal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            if($mealData->num_rows>0){
                                $si = 1;
                                while($row = $mealData->fetch_object()){
                                    $d = strtotime($row->meal_date);
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php echo date("Y-M-d", $d); ?></td>
                            <td><?php echo $row->total; ?></td>
                            <td>
                                <a class="btn btn-primary"
                                    href="add-meal.php?meal-date=<?php echo $row->meal_date; ?>"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this meal?');" href="action/meal/delete.php?meal-date=<?php echo $row->meal_date; ?>" ><i class="fas fa-trash"></i></a>
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