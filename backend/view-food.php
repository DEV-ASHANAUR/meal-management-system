<?php  
    session_start();
    $page = 'manage_food';
    $sub_page = 'view_food';
    $page_title = 'Dashboard - View Food';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $foodData = $obj->viewfoodPreference($messId);
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
        <li class="breadcrumb-item active">View Food Preference</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View Food Preference</span>
            <!-- <small class="d-sm-block"><a href="add-bazer.php" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle mr-1"></i>Add Bazer</a></small> -->
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
                            <th>Member Name</th>
                            <th>Meal Type</th>
                            <th>Food List</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Member Name</th>
                            <th>Meal Type</th>
                            <th>Food List</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                            if($foodData->num_rows>0){
                                $si = 1;
                                while($row = $foodData->fetch_object()){
                                    $d = strtotime($row->created_at);
                                    $list = explode(",", $row->food_list);

                                    // print_r($array);
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php echo $row->user_name; ?></td>
                            <td class="text-capitalize"><?php echo $row->food_type; ?></td>
                            <td> <?php foreach ($list as $item): ?>
                                <li class="text-capitalize"><?php echo $item; ?></li>
                                <?php endforeach; ?></td>
                            <td><?php echo date("Y-M-d", $d); ?></td>
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