<?php 
    session_start();
    $page = 'manage_prev_month';
    $sub_page = 'edit_month';
    $page_title = 'Dashboard - Edit Month';
    include "inc/header.php"; 
    $obj = new Main();
    
    $messId = $_SESSION['mess_id'];
    $created_by = $_SESSION['user_id'];

    if(isset($_GET['month-id'])){
        $m_id = $_GET['month-id'];
        $find_month = $obj->retriveMonthById($m_id);

        if($find_month->num_rows>0){
            while($row = $find_month->fetch_object()){
                $month_name = $row->month_name;
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
            Edit Month  
        </li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i>Edit Month</span>
            <small class="d-sm-block"><a href="prev-month-detalis.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View Details</a></small>
        </div>
        <div class="card-body">
            <form action="action/month/update.php" method="post">
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
                                    <h4 class="text-center">Edit Month Name
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name">Month Name</label>
                                        <input type="text" class="form-control" name="month_name" value="<?php echo $month_name;?>" placeholder="Month Name" required />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="submit" />
                                    <input type="hidden" name="month_id" value="<?php echo $m_id;?>" />
                                    <button type="submit" class="btn btn-primary">Update</button>
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