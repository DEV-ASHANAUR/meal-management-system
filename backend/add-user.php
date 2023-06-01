<?php 
    session_start();
    $page = 'manage_user';
    $sub_page = 'add_user';
    $page_title = 'Dashboard - Add User';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
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
        <li class="breadcrumb-item active">Add User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i>Add User</span>
            <small class="d-sm-block"><a href="view-user.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View User</a></small>
        </div>
        <div class="card-body">
            <form action="action/user/insert.php" method="post">
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
                                    <h4 class="text-center">Add User
                                    </h4>
                                </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="date">User Name</label>
                                            <input type="text" class="form-control mb-2" name="user_name"
                                                placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id">Select role</label>
                                            <select class="form-control" name="user_role" id="user_role" required />
                                                <option value="">Select Name</option>
                                                <option value="Monitor">Monitor</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Member">Member</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">User Email</label>
                                            <input type="email" class="form-control mb-2" name="user_email"
                                                placeholder="Email" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile">User Mobile</label>
                                            <input type="text" class="form-control mb-2" name="user_mobile"
                                                placeholder="Mobile" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password">User Password</label>
                                            <input type="password" class="form-control mb-2" name="password"
                                                placeholder="password" required />
                                        </div>
                                        <input type="hidden" name="submit" />
                                        <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />

                                    </div>
                                    <div class="card-footer">
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