<?php 
    session_start();
    $page = 'manage_user';
    $sub_page = 'add_user';
    $page_title = 'Dashboard - Add User';
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
        <li class="breadcrumb-item active">Add User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-plus-circle mr-1"></i>Add User</span>
            <small class="d-sm-block"><a href="view-user.php" class="btn btn-success btn-sm"><i
                        class="fas fa-list mr-1"></i>View User</a></small>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 m-auto">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="text-center">Add User
                                    </h4>
                                </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="date">User Name</label>
                                            <input type="text" class="form-control mb-2" name="username" value=""
                                                placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_id">Select role</label>
                                            <select class="form-control" name="name" id="user_id">
                                                <option value="">Select Name</option>
                                                <option value="">Manager</option>
                                                <option value="">Member</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date">User Email</label>
                                            <input type="Email" class="form-control mb-2" name="useremail" value=""
                                                placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="date">User Mobile</label>
                                            <input type="Email" class="form-control mb-2" name="usermobile" value=""
                                                placeholder="Mobile">
                                        </div>
                                        <div class="mb-3">
                                            <label for="date">User Password</label>
                                            <input type="password" class="form-control mb-2" name="password" value=""
                                                placeholder="password">
                                        </div>
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