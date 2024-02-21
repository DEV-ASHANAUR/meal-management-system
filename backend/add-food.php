<?php 
    session_start();
    $page = 'manage_food';
    $sub_page = 'add_food';
    $page_title = 'Dashboard - Add Food';
    include "inc/header.php"; 
        
    $obj = new Main();

    $today = date('Y-m-d');
    
    $messId = $_SESSION['mess_id'];
    $created_by = $_SESSION['user_id'];

    $users = $obj->getAllUser($messId);

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
            Add Food
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i>Add Food</span>
            <!-- <small class="d-sm-block"><a href="view-bazer.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View Food</a></small> -->
        </div>
        <div class="card-body">

            <form action="action/food/insert.php" method="post">
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
                        <div class="col-md-6 col-sm-12 m-auto">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="text-center">Add Food Preference
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="category_id">Select Type</label>
                                        <select class="form-control text-capitalize" name="food_type" id="user_id"
                                            required>
                                            <option value="">Select Type</option>

                                            <option value="breakfast">Breakfast</option>
                                            <option value="lunch">Lunch</option>
                                            <option value="dinner">Dinner</option>

                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="name">Add Food List</label>
                                        <textarea name="food_list" class="form-control" id="" cols="3" rows="3" placeholder="Enter Food List (comma separate)" required></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />
                                    <input type="hidden" name="user_id" value="<?php echo $created_by;?>" />

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>