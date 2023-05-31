<?php 
    session_start();
    $page = 'manage_mess';
    $sub_page = 'view_mess';
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
        <li class="breadcrumb-item active">Add User</li>
    </ol>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="profile">
            <div class="user_box">
                <div class="user_img">
                    <img src="./img/undraw_rocket.svg" alt="" class="img-fluid" />
                </div>
                <div class="user_infomation">
                    <div>
                        <span>Mess Name :</span>
                        <p class="text-capitalize"><?php echo $messName; ?></p>
                    </div>
                    <div>
                        <span>Mess Type :</span>
                        <p class="text-capitalize"><?php if($messType === null){echo "Not Set";}else{echo $messType;} ?></p>
                    </div>
                    <div>
                        <span>Mess Address :</span>
                        <p class="text-capitalize"><?php if($messAdd === ""){echo "Not Set";}else{echo $messAdd;} ?></p>
                    </div>
                    <div><a href="edit-mess.php?mess-id=<?php echo $messId;?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

<!-- End of Content Wrapper -->

<?php include "inc/footer.php"; ?>