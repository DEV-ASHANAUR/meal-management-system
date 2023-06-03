<?php 
    session_start();
    $page = 'manage_meal';
    $sub_page = 'add_meal';
    $page_title = 'Dashboard - Add meal';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];

    $shuter = false;
    if(isset($_GET['user-id'])){
        $shuter = true;
        $u_id = $_GET['user-id'];
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
                echo "Edit User";
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
                        <form action="">
                            <table class="table table-bordered">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Member Name</th>
                                        <th class="text-center">Meal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>
                                            Md Ashanaur Rahman
                                            <!-- <input type="hidden" name="user_id[]" value="{{ $user->id }}"> -->
                                        </th>
                                        <th class="text-center" style="width: 200px">
                                            <input class="spiner" name="meal[]" type="number" value="0" min="0" max="50"
                                                step="0.5" data-decimals="1">
                                        </th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="date" name="date" class="form-control" value="{{ $date }}" />
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-success w-100 d-block">Submit</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
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