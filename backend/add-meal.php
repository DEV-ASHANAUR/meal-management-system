<?php 
    session_start();
    $page = 'manage_meal';
    $sub_page = 'add_meal';
    $page_title = 'Dashboard - Add meal';
    include "inc/header.php"; 
    $obj = new Main();

    $today = date('Y-m-d');

    $messId = $_SESSION['mess_id'];
    $created_by = $_SESSION['user_id'];
    $members = $obj->getAllUser($messId);
    $shuter = false;
    if(isset($_GET['meal-date'])){
        $shuter = true;
        $meal_date = $_GET['meal-date'];
        $MealData = $obj->getMealByDate($messId,$meal_date);
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
        <li class="breadcrumb-item active">
            <?php
            if($shuter == true){
                echo "Edit Meal";
            }else{
                echo "Add Meal";
            }
        ?>
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i><?php
            if($shuter == true){
                echo "Edit Meal";
            }else{
                echo "Add Meal";
            }
        ?></span>
            <small class="d-sm-block"><a href="view-meal.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View Meal</a></small>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
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
                    <div class="col-md-8 col-sm-12 m-auto">
                        <?php
                            if($shuter == true){
                                ?>
                        <form action="action/meal/update.php" method="POST">
                            <table class="table table-bordered">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Member Name</th>
                                        <th class="text-center">Meal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($MealData->num_rows>0){
                                            $si = 1;
                                            while($row = $MealData->fetch_object()){
                                                ?>
                                    <tr>
                                        <th><?php echo $si; ?></th>
                                        <th class="text-capitalize">
                                            <?php echo $row->username; ?>
                                            <input type="hidden" name="user_id[]" value="<?php echo $row->user_id; ?>">
                                            <input type="hidden" name="created_by" value="<?php echo $created_by; ?>">
                                            <input type="hidden" name="mess_id" value="<?php echo $messId; ?>">
                                        </th>
                                        <th class="text-center" style="width: 200px">
                                            <input class="spiner" name="meal[]" type="number"
                                                value="<?php echo $row->meal;?>" min="0" max="50" step="0.5"
                                                data-decimals="1">
                                        </th>
                                    </tr>
                                    <?php
                                            $si++;
                                            }
                                        }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="date" name="date" class="form-control"
                                                value="<?php echo $meal_date;?>" readonly />
                                            <input type="hidden" name="submit">
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-success w-100 d-block" type="submit">Update</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        <?php
                            }else{
                                ?>
                        <form action="action/meal/insert.php" method="POST">
                            <table class="table table-bordered">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Member Name</th>
                                        <th class="text-center">Meal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($members->num_rows>0){
                                            $si = 1;
                                            while($row = $members->fetch_object()){
                                                ?>
                                    <tr>
                                        <th><?php echo $si; ?></th>
                                        <th class="text-capitalize">
                                            <?php echo $row->user_name; ?>
                                            <input type="hidden" name="user_id[]" value="<?php echo $row->user_id; ?>">
                                            <input type="hidden" name="created_by" value="<?php echo $created_by; ?>">
                                            <input type="hidden" name="mess_id" value="<?php echo $messId; ?>">
                                        </th>
                                        <th class="text-center" style="width: 200px">
                                            <input class="spiner" name="meal[]" type="number" value="0" min="0" max="50"
                                                step="0.5" data-decimals="1">
                                        </th>
                                    </tr>
                                    <?php
                                            $si++;
                                            }
                                        }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="date" name="date" class="form-control"
                                                value="<?php echo $today;?>" />
                                            <input type="hidden" name="submit">
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-success w-100 d-block" type="submit">Submit</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>