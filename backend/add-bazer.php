<?php 
    session_start();
    $page = 'manage_bazer';
    $sub_page = 'add_bazer';
    $page_title = 'Dashboard - Add Bazer';
    include "inc/header.php"; 
    $obj = new Main();

    $today = date('Y-m-d');
    
    $messId = $_SESSION['mess_id'];
    $created_by = $_SESSION['user_id'];

    $users = $obj->getAllUser($messId);

    $shuter = false;
    if(isset($_GET['bazer-id'])){
        $shuter = true;
        $u_id = $_GET['bazer-id'];
        $find_user = $obj->retriveUserbyid($u_id);

        if($find_user->num_rows>0){
            while($row = $find_user->fetch_object()){
                $user_id = $row->user_id;
                $user_name = $row->user_name;
                $user_email = $row->user_email;
                $user_mobile = $row->user_mobile;
                $user_role = $row->user_role;
            }
        }

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
                echo "Edit User";
            }else{
                echo "Add User";
            }
        ?>
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i><?php
            if($shuter == true){
                echo "Edit User";
            }else{
                echo "Add User";
            }
        ?></span>
            <small class="d-sm-block"><a href="view-user.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View User</a></small>
        </div>
        <div class="card-body">
            <?php
            if($shuter == true){
                ?>
            <form action="action/user/update.php" method="post">
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
                                    <h4 class="text-center">Edit User
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="date">User Name</label>
                                        <input type="text" class="form-control mb-2" value="<?php echo $user_name;?>"
                                            name="user_name" placeholder="Full Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id">Select role</label>
                                        <select class="form-control" name="user_role" id="user_role" required />
                                        <option value="">Select Name</option>
                                        <option <?php if($user_role == "Monitor"){echo "selected";} ?> value="Monitor">
                                            Monitor</option>
                                        <option <?php if($user_role == "Manager"){echo "selected";} ?> value="Manager">
                                            Manager</option>
                                        <option <?php if($user_role == "Member"){echo "selected";} ?> value="Member">
                                            Member</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">User Email</label>
                                        <input type="email" class="form-control mb-2" value="<?php echo $user_email;?>"
                                            name="user_email" placeholder="Email" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="mobile">User Mobile</label>
                                        <input type="text" class="form-control mb-2" value="<?php echo $user_mobile;?>"
                                            name="user_mobile" placeholder="Mobile" required />
                                    </div>
                                    <input type="checkbox" id="check" name="check" class="mt-2" value="yes">
                                    <label for="check">Change Password?</label>
                                    <div class="mb-3">
                                        <label for="password">User Password</label>
                                        <input type="password" class="form-control mb-2" name="password"
                                            placeholder="password" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="form-control mb-2" name="con_password1"
                                            placeholder="confirm password" />
                                    </div>
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />
                                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <a class="btn btn-danger" href="view-user.php">Cancle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            }else{
            ?>
            <form action="action/bazer/insert.php" method="post">
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
                                    <h4 class="text-center">Add Bazer Cost
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="date">Select Date</label>
                                        <input type="date" class="form-control mb-2" name="bazer_date" id="date" value="<?php echo $today;?>" placeholder="yyyy-mm-dd" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id">Shopper's Name</label>
                                        <select class="form-control text-capitalize" name="user_id" id="user_id">
                                            <option value="">Select Name</option>
                                            <?php if($users->num_rows>0){
                                                while($row = $users->fetch_object()){
                                                    ?>
                                                        <option value="<?php echo $row->user_id ?>"><?php echo $row->user_name; ?></option>
                                                    <?php
                                                }
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                    <label for="amount">Bazer Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">৳</span>
                                        </div>
                                        <input type="number" class="form-control" name="bazer_amount"
                                            placeholder="Enter Amount" aria-label="Amount (to the nearest dollar)" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Bazer Description</label>
                                        <textarea name="bazer_description" class="form-control" id="" cols="3" rows="3"
                                            placeholder="Enter Description"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />
                                    <input type="hidden" name="created_by" value="<?php echo $created_by;?>" />

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            }
                ?>

        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>