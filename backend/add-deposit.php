<?php 
    session_start();
    $page = 'manage_money';
    $sub_page = 'add_deposit';
    $page_title = 'Dashboard - Add Deposit';
    include "inc/header.php"; 
    $obj = new Main();

    $today = date('Y-m-d');
    
    $messId = $_SESSION['mess_id'];
    $created_by = $_SESSION['user_id'];

    $users = $obj->getAllUser($messId);

    $shuter = false;
    if(isset($_GET['deposit-id'])){
        $shuter = true;
        $dep_id = $_GET['deposit-id'];
        $find_money = $obj->retriveDepositbyid($dep_id);

        if($find_money->num_rows>0){
            while($row = $find_money->fetch_object()){
                $user_id = $row->user_id;
                $deposit_id = $row->id;
                $member_money = $row->money;
                $pay_date = $row->pay_date;
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
                echo "Edit Member Deposit";
            }else{
                echo "Add Member Deposit";
            }
        ?>
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i><?php
            if($shuter == true){
                echo "Edit Member Deposit";
            }else{
                echo "Add Member Deposit";
            }
        ?></span>
            <small class="d-sm-block"><a href="view-deposit.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View Deposit</a></small>
        </div>
        <div class="card-body">
            <?php
            if($shuter == true){
                ?>
            <form action="action/deposit/update.php" method="post">
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
                                    <h4 class="text-center">Edit Member Deposit
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="date">Select Date</label>
                                        <input type="date" class="form-control mb-2" name="pay_date" id="date" value="<?php echo $pay_date;?>" placeholder="yyyy-mm-dd" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id">Member Name</label>
                                        <select class="form-control text-capitalize" name="user_id" id="user_id" required>
                                            <option value="">Select Name</option>
                                            <?php if($users->num_rows>0){
                                                while($row = $users->fetch_object()){
                                                    ?>
                                                        <option <?php if($row->user_id == $user_id){echo "selected";} ?> value="<?php echo $row->user_id ?>"><?php echo $row->user_name; ?></option>
                                                    <?php
                                                }
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                    <label for="amount">Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">৳</span>
                                        </div>
                                        <input type="number" class="form-control" name="member_money"
                                            placeholder="Enter Amount" value="<?php echo $member_money;?>" aria-label="Amount (to the nearest dollar)" required />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />
                                    <input type="hidden" name="deposit_id" value="<?php echo $dep_id;?>" />
                                    <input type="hidden" name="created_by" value="<?php echo $created_by;?>" />

                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            }else{
            ?>
            <form action="action/deposit/insert.php" method="post">
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
                                    <h4 class="text-center">Add Member Deposit
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="date">Select Date</label>
                                        <input type="date" class="form-control mb-2" name="pay_date" id="date" value="<?php echo $today;?>" placeholder="yyyy-mm-dd" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id">Member Name</label>
                                        <select class="form-control text-capitalize" name="user_id" id="user_id" required>
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
                                    <label for="amount">Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">৳</span>
                                        </div>
                                        <input type="number" class="form-control" name="member_money"
                                            placeholder="Enter Amount" aria-label="Amount (to the nearest dollar)" required />
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