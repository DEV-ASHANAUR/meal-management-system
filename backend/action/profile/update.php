<?php
    session_start();
    include "../../Flash_data.php";
    include "../../controller/main.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST["user_email"];
        $user_mobile = $_POST['user_mobile'];
        $password = $_POST['password'];
        $messId = $_POST['mess_id'];
        $con_password = $_POST['con_password1'];

       if(isset($_POST['check'])){
        if($password === $con_password){
            $check_user = $obj->retrivewithoutme($id,trim($user_email));
            if($check_user->num_rows > 0){
                Flass_data::addError('Dublicate Already Exist!');
                header("location:../../edit-profile.php?user-id=$id"); 
                exit();
            }else{
                // echo "thik ace";
                if(trim($user_name) !== "" && trim($user_email) !== ""){
                    $status = $obj->updateUser($id,trim($user_name),trim($user_email),$user_role,md5($password),$user_mobile);
                    if($status == true){
                        Flass_data::addsuccess('User update SuccessFully!');
                        header("location:../../edit-profile.php?user-id=$id"); 
                    }else{
                        Flass_data::addError('Something went worng!');
                        header("location:../../edit-profile.php?user-id=$id"); 
                    }
                }else{
                    Flass_data::addError('Please enter valid info!');
                    header("location:../../edit-profile.php?user-id=$id"); 
                }
            }
            
        }else{
            Flass_data::addError('Confirm Password Does not match!');
            header("location:../../edit-profile.php?user-id=$id"); 
            exit();
        }
       }else{
            if(trim($user_name) !== "" && trim($user_email) !== ""){
                $check_user = $obj->retrivewithoutme($id,trim($user_email));
                if($check_user->num_rows > 0){
                    Flass_data::addError('Dublicate Already Exist!');
                    header("location:../../edit-profile.php?user-id=$id"); 
                    exit();
                }else{
                    $status = $obj->updateUserwithoutpass($id,trim($user_name),trim($user_email),$user_role,$user_mobile);
                    if($status == true){
                        Flass_data::addsuccess('User update SuccessFully!');
                        header("location:../../edit-profile.php?user-id=$id"); 
                    }else{
                        Flass_data::addError('Something went worng!');
                        header("location:../../edit-profile.php?user-id=$id"); 
                    }
                }
                
            }else{
                Flass_data::addError('Please enter valid info!');
                header("location:../../edit-profile.php?user-id=$id"); 
            }
       }
    
    }


?>