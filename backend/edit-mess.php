<?php 
    session_start();
    $page = 'manage_mess';
    // $sub_page = 'view_mess';
    $page_title = 'Dashboard - view Mess';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $data = $obj->viewMessById($messId);
    if($data->num_rows > 0){
        while($row = $data->fetch_object()){
            $messName = $row->mess_name;
            $messAdd = $row->mess_address;
            $messType = $row->mess_type;
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
        <li class="breadcrumb-item active">Edit Mess</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-edit mr-1"></i>Edit Mess</span>
            <small class="d-sm-block"><a href="view-mess.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View Mess</a></small>
        </div>
        <div class="card-body">
            <form action="action/mess/edit.php" method="POST">
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
                                    <h4 class="text-center">Edit Mess
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="date">Mess Name</label>
                                        <input type="text" class="form-control mb-2" name="mess_name"
                                            value="<?php echo $messName;?>" placeholder="Mess Name" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="date">Mess Type</label>
                                        <input type="text" class="form-control mb-2" name="mess_type"
                                            value="<?php echo $messType;?>" placeholder="Boys / Girls" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="date">Mess Address</label>
                                        <textarea name="mess_address" class="form-control"
                                             placeholder="Mess Address"
                                            required><?php echo $messAdd;?></textarea>
                                    </div>
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="mess_id" value="<?php echo $messId;?>" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <a href="view-mess.php" class="btn btn-danger">Cancle</a>
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