<?php
    session_start();
    include "../controller/main.php";
    include "../Flash_data.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $useremail = $_POST['email'];
        $password = $_POST['password'];
        if($useremail === "" || $password === ""){
            Flass_data::auth('All field Are Required!');
            header("location:../login.php"); 
            exit();
        }
        $data = $obj->retriveUser($useremail);
        if($data->num_rows > 0){
            while($row = $data->fetch_object()){
                $uid = $row->user_id;
                $user_name = $row->user_name;
                $dbemail = $row->user_email;
                $pass = $row->user_password;
                $role = $row->user_role;
                $messId = $row->mess_id;
            }
            $e_pw = md5($password);
            if($e_pw === $pass){
                $_SESSION['user_id'] = $uid;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $dbemail;
                $_SESSION['role'] = $role;
                $_SESSION['mess_id'] = $messId;
                header('location:../backend/index.php');
            }else{
                Flass_data::auth('Your Given information is not Correct!');
                header("location:../login.php"); 
            }
        }else{
            Flass_data::auth('Your Given information is not Correct!');
            header('location:../login.php');
        }
    }else{
        header('location: ../login.php');
        exit();
    }

?>