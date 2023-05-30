<?php
    session_start();
    $pageTitle = 'Create an Account - Meal';
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
                    <div class="Reg_left_area"></div>
                </div>
                <div class="col-md-7">
                    <div class="login_right_area">
                        <div class="login_right_box">
                            <h3 class="mb_30">
                                Create an Account!
                            </h3>
                            <form action="auth/create.php" method="POST">
                                <div class="Name_div">
                                    <div>
                                        <input type="text" name="user_name" placeholder="Your Name" />
                                    </div>
                                    <div>
                                        <input type="text" name="mess_name" placeholder="Mess Name" />
                                    </div>
                                </div>

                                <input type="email" name="user_email" placeholder="Email Address" />
                                <input type="text" name="user_mobile" placeholder="Mobile" />
                                <input type="password" name="password" placeholder="Password" />
                                <input type="hidden" name="submit" />
                                <button class="button mt_10"  type="submit">
                                    Register
                                </button>
                            </form>

                            <div class="mt_30">
                                <a href="login.php">Login</a>
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