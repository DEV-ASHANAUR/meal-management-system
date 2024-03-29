<?php  
    session_start();
    $page = 'manage_user';
    $sub_page = 'view_user';
    $page_title = 'Dashboard - Add User';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $userId = $_SESSION['user_id'];
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
        <li class="breadcrumb-item active">View User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list mr-1"></i>View User</span>
            <small class="d-sm-block"><a href="add-user.php" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-circle mr-1"></i>Add User</a></small>
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
                            <th>Name</th>
                            <th>User Role</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Si</th>
                            <th>Name</th>
                            <th>User Role</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            if($users->num_rows>0){
                                $si = 1;
                                while($row = $users->fetch_object()){
                                    
                                    ?>
                        <tr>
                            <td><?php echo $si; ?></td>
                            <td class="text-capitalize"><?php echo $row->user_name; ?></td>
                            <td><?php echo $row->user_role; ?></td>
                            <td><?php echo $row->user_mobile; ?></td>
                            <td><?php echo $row->user_email; ?></td>
                            <td>
                                <a class="btn btn-primary" href="add-user.php?user-id=<?php echo $row->user_id; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger <?php if($row->user_id == $userId){echo 'disabled';} ?>" onclick="return confirm('Are you sure you want to delete this user?');" href="action/user/delete.php?user-id=<?php echo $row->user_id;?>"><i class="fas fa-trash"></i></a>
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