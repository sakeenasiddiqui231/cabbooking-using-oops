<?php
// error_reporting(0);
session_start();

$username = "";
$errors = array();
$_SESSION['success'] = "";
include "configg.php";
$data = new Config();
if (isset($_POST['submit']))
{

    $checkbox =  isset($_POST['remember'])?$_POST['remember']:'';
    $username =  $_POST['user_name'];
    $password =  $_POST['password'];

      $enc_password=md5($password);
        $query = "SELECT * FROM tbl_user WHERE user_name = 
                '$username' AND password = '$enc_password'";
               
        $results = mysqli_query($data->con, $query);
        if (mysqli_num_rows($results) > 0)
        {
          $row=mysqli_fetch_assoc($results);
          
            $_SESSION['userdata'] = array(
                'user_name' => $row['user_name'],
                'user_id' => $row['user_id'],
                'mobile' => $row['mobile'],
                'is_block' => $row['isblock'],
                'password' => $row['password'],
                'is_admin' => $row['is_admin'],
                'name' => $row['name']
            );
           
            if ($row['isblock'] == '0')
            {
                echo '<script>alert("Please wait for Admin Approval")</script>';
            }
            else
            {
                if ($row['isblock'] == '1')
                {

                    setcookie("member_login", $username, time() + (10 * 365 * 24 * 60 * 60));
                   
                }
            
              else
               {
                if (isset($_COOKIE["member_login"]))
                {
                    setcookie("member_login", "");
                }
                }
               if($row['is_admin'] == '1')
               {
                header('location: ../admin/admindashboard.php');
               } else {
                    header('location: userdashboard.php');
                }
            }
           
    }
    
    else
    {
        // array_push($errors, "Username or password incorrect");
        $msg = "Username or password is incorrect";
        header("location: login.php?msg=$msg");

    }
}



?>