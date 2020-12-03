<?php
session_start();
include "configg.php";
$data = new Config();


$username = "";
$mobile   = "";
$errors = array(); 

if (isset($_POST['submit'])) {
  
  $username = mysqli_real_escape_string($data->con, $_POST['user_name']);
  $mobile = mysqli_real_escape_string($data->con, $_POST['mobile']);
  $password_1 = mysqli_real_escape_string($data->con, $_POST['password']);
  $password_2 = mysqli_real_escape_string($data->con, $_POST['password1']);
  $name = mysqli_real_escape_string($data->con, $_POST['name']);

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($mobile)) { array_push($errors, "Mobile number is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  
 $user_check_query = "SELECT * FROM tbl_user WHERE 'user_name' ='$username' OR 'mobile' ='$mobile' ";
  $result = mysqli_query($data->con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['mobile'] === $mobile) {
      array_push($errors, "mobile already exists");
    }
  }

  if (sizeof($errors) == 0) {
  	$password = md5($password_1);
   
  	$query = "INSERT INTO tbl_user (user_name, mobile,isblock,password, is_admin,date_signup,name) 
          VALUES('$username', '$mobile','0','$password','0',NOW(),'$name')";
        if (mysqli_query($data->con, $query)) {
          echo "New record created successfully";
          $_SESSION['user_name'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($data->con);
        }


    
    }
  	
  }
?>

