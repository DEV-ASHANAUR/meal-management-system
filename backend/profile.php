<?php 
    session_start();
    $page = 'manage_profile';
    $sub_page = 'view_profile';
    $page_title = 'Dashboard - view Mess';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];
    $user_id = $_SESSION['user_id'];
    $data = $obj->retriveUserbyid($user_id);
    if($data->num_rows > 0){
        while($row = $data->fetch_object()){
            $user_name = $row->user_name;
            $user_role = $row->user_role;
            $user_mobile = $row->user_mobile;
            $user_email = $row->user_email;
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
        <li class="breadcrumb-item active">View Profile</li>
    </ol>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="profile">
            <div class="user_box">
                <div class="user_img">
                    <img src="./img/undraw_profile.svg" alt="" class="img-fluid" />
                </div>
                <div class="user_infomation">
                    <div>
                        <span>User Name :</span>
                        <p class="text-capitalize"><?php echo $user_name; ?></p>
                    </div>
                    <div>
                        <span>User Email :</span>
                        <p><?php echo $user_email; ?></p>
                    </div>
                    <div>
                        <span>User Mobile :</span>
                        <p><?php echo $user_mobile; ?></p>
                    </div>
                    <div>
                        <span>User Role :</span>
                        <p><?php echo $user_role; ?></p>
                    </div>
                    <div><a href="edit-profile.php?user-id=<?php echo $user_id;?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>