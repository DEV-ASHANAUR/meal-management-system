<?php 
    session_start();
    $page = 'dashboard';
    $page_title = 'Dashboard - Meal System';
    include "inc/header.php"; 
    $obj = new Main();
    $messId = $_SESSION['mess_id'];

    $total_deposit = $obj->total_deposit($messId);
    $total_bazer = $obj->total_bazer($messId);
    $total_others_cost = $obj->total_others_cost($messId);
    $total_meal = $obj->total_meal($messId);
    $total_member = $obj->total_member($messId);
    $total_cost = ($total_bazer + $total_others_cost);
    if($total_meal == 0){
        $meal_rate = 0;
    }else{
        $meal_rate = ($total_cost/$total_meal);
    }
    $mess_balance = ($total_deposit - $total_cost);

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="all_cost_area">
        <div class="row no-gutters">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p1">
                    <h4>Mess Balance</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($mess_balance,2)?> tk</span></h3>
                        <a href="view-deposit.php">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p2">
                    <h4>Bazer Cost</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($total_bazer,2)?> tk</span></h3>
                        <a href="view-bazer.php">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p3">
                    <h4>Others Cost</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($total_others_cost,2)?> tk</span></h3>
                        <a href="view-others.php">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p4">
                    <h4>Total Deposit</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($total_deposit,2)?> tk</span></h3>
                        <a href="view-deposit.php">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p5">
                    <h4>Total Meal</h4>
                    <div class="price">
                        <h3><span><?php echo $total_meal;?></span></h3>
                        <a href="view-meal.php">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p6">
                    <h4>Total Cost</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($total_cost,2)?> tk</span></h3>
                        <a href="view-bazer">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p7">
                    <h4>Meal Rate</h4>
                    <div class="price">
                        <h3><span><?php echo number_format($meal_rate,2)?> tk</span></h3>
                        <a href="#">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="month_details_box p8">
                    <h4>Total Member</h4>
                    <div class="price">
                        <h3><span><?php echo $total_member;?></span></h3>
                        <a href="view-user.php">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Earnings Overview
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">
                                Dropdown Header:
                            </div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Revenue Sources
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">
                                Dropdown Header:
                            </div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i>
                            Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i>
                            Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i>
                            Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->




<?php include "inc/footer.php"; ?>