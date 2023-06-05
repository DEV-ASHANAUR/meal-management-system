<?php
    include "controller/main.php";
    include "Flash_data.php";
    if(!isset($_SESSION['user_id'])){
        header('location:../login.php');
    }
    $user_role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo $page_title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/main.css" rel="stylesheet" />
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <link href="css/profile.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/toastr.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/toastr.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Meal Face</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($page == 'dashboard'){echo 'active';}?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
                if($user_role == 'Monitor'){
                    ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMess"
                    aria-expanded="true" aria-controls="collapseMess">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Mess</span>
                </a>
                <div id="collapseMess" class="collapse <?php if($page == 'manage_mess'){echo 'show';}?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'view_mess'){echo 'active';}?>"
                            href="view-mess.php">View Mess</a>
                    </div>
                </div>
            </li>
            <?php
                }
            ?>
            <?php 
                if($user_role == 'Manager' || $user_role == 'Monitor'){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Manage User</span>
                        </a>
                        <div id="collapseTwo" class="collapse <?php if($page == 'manage_user'){echo 'show';}?>"
                            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?php if($sub_page == 'add_user'){echo 'active';}?>"
                                    href="add-user.php">Add User</a>
                                <a class="collapse-item <?php if($sub_page == 'view_user'){echo 'active';}?>"
                                    href="view-user.php">View User</a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            ?>
            <?php 
                if($user_role == 'Manager' || $user_role == 'Monitor'){
                    ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Manage_meal"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Meal</span>
                </a>
                <div id="Manage_meal" class="collapse <?php if($page == 'manage_meal'){echo 'show';}?>"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'add_meal'){echo 'active';}?>"
                            href="add-meal.php">Add Meal</a>
                        <a class="collapse-item <?php if($sub_page == 'view_meal'){echo 'active';}?>"
                            href="view-meal.php">View Meal</a>
                    </div>
                </div>
            </li>
            <?php
                }
            ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php 
                if($user_role == 'Manager' || $user_role == 'Monitor'){
                    ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Cost</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if($page == 'manage_bazer'){echo 'show';}?>"
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'view_bazer'){echo 'active';}?>"
                            href="view-bazer.php">Bazer Cost</a>
                        <a class="collapse-item <?php if($sub_page == 'view_others'){echo 'active';}?>"
                            href="view-others.php">Others Cost</a>
                    </div>
                </div>
            </li>
            <?php
                }
            ?>
            <?php 
                if($user_role == 'Manager' || $user_role == 'Monitor'){
                    ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember"
                    aria-expanded="true" aria-controls="collapseMember">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Member's Money</span>
                </a>
                <div id="collapseMember" class="collapse <?php if($page == 'manage_money'){echo 'show';}?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'view_deposit'){echo 'active';}?>" href="view-deposit.php">View Deposit</a>
                    </div>
                </div>
            </li>
            <?php
                }
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePresentMonth"
                    aria-expanded="true" aria-controls="collapsePresentMonth">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Present Month</span>
                </a>
                <div id="collapsePresentMonth" class="collapse <?php if($page == 'manage_member_details'){echo 'show';}?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'view_member_details'){echo 'active';}?>" href="member-details.php">Member Details</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePrevMonth"
                    aria-expanded="true" aria-controls="collapsePrevMonth">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Previous Month</span>
                </a>
                <div id="collapsePrevMonth" class="collapse <?php if($page == 'manage_prev_month'){echo 'show';}?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if($sub_page == 'view_details'){echo 'active';}?>" href="prev-month-detalis.php">view Details</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                        echo $_SESSION['user_name'];
                                    ?>
                                    </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>