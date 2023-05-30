<?php
    session_start();
    $pageTitle = 'Login - Meal';
    include "inc/header.php";
?>
    
    <div class="home_bg">
    <?php
    if(isset($_SESSION['msg']['auth'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show message_alert" role="alert"">
        <strong class=" text-center d-block">
        <?php echo Flass_data::show_error();?>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php 
        }
    ?>
        <div class="container">
            <div class="login_area_box">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <div class="login_left_area"></div>
                    </div>
                    <div class="col-md-7">
                        <div class="login_right_area">
                            <div class="login_right_box">
                                <h3 class="mb_30">Welcome Back</h3>
                                <form action="auth/login.php" method="POST">
                                    <input type="email" name="email" placeholder="Email Address" />
                                    <input type="password" name="password" placeholder="Password" />
                                    <input type="hidden" name="submit" />
                                    <button class="button mt_10" type="submit">Login</button>
                                </form>
        
                                <div class="mt_30">
                                    <a href="register.php">Create an Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php
    include "inc/footer.php";
?>