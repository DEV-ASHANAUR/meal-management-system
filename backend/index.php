<?php include "inc/header.php"; ?>


            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div
                    class="d-sm-flex align-items-center justify-content-between mb-4"
                >
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <!-- <a
                        href="#"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                        ><i
                            class="fas fa-download fa-sm text-white-50"
                        ></i>
                        Generate Report</a
                    > -->
                </div>

                <!-- Content Row -->
                <div class="all_cost_area">
                    <div class="row no-gutters">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p1">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p2">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p3">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p4">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p5">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p6">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p7">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>5600</span>tk</h3>
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="month_details_box p8">
                                <h4>Mess Balance</h4>
                                <div class="price">
                                    <h3><span>4</span></h3>
                                    <a href="#">View Details</a>
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
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                            >
                                <h6
                                    class="m-0 font-weight-bold text-primary"
                                >
                                    Earnings Overview
                                </h6>
                                <div class="dropdown no-arrow">
                                    <a
                                        class="dropdown-toggle"
                                        href="#"
                                        role="button"
                                        id="dropdownMenuLink"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <i
                                            class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                                        ></i>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink"
                                    >
                                        <div class="dropdown-header">
                                            Dropdown Header:
                                        </div>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Action</a
                                        >
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Another action</a
                                        >
                                        <div
                                            class="dropdown-divider"
                                        ></div>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Something else here</a
                                        >
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
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                            >
                                <h6
                                    class="m-0 font-weight-bold text-primary"
                                >
                                    Revenue Sources
                                </h6>
                                <div class="dropdown no-arrow">
                                    <a
                                        class="dropdown-toggle"
                                        href="#"
                                        role="button"
                                        id="dropdownMenuLink"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <i
                                            class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"
                                        ></i>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink"
                                    >
                                        <div class="dropdown-header">
                                            Dropdown Header:
                                        </div>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Action</a
                                        >
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Another action</a
                                        >
                                        <div
                                            class="dropdown-divider"
                                        ></div>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            >Something else here</a
                                        >
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
                                        <i
                                            class="fas fa-circle text-primary"
                                        ></i>
                                        Direct
                                    </span>
                                    <span class="mr-2">
                                        <i
                                            class="fas fa-circle text-success"
                                        ></i>
                                        Social
                                    </span>
                                    <span class="mr-2">
                                        <i
                                            class="fas fa-circle text-info"
                                        ></i>
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