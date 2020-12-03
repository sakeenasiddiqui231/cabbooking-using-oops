<?php
session_start();

if(isset($_SESSION['userdata'])){
    if ($_SESSION['userdata']['is_admin'] == '1') {
        header('location: ../admin/admindashboard.php');
    }
    
} else{
    header('location: index.php');
}
include "configg.php";
$data = new Config();


$message='';

$id = $_SESSION['userdata']['user_id'];

$user = mysqli_query($data->con, "SELECT * FROM tbl_user WHERE user_id='$id'");
$userData = mysqli_fetch_assoc($user);

if(isset($_REQUEST['submit'])) {
  $oldPassword = $_REQUEST['password'];
  $newPassword = $_REQUEST['newpassword'];
  $confirmPassword = $_REQUEST['confirmpassword'];
  
  if($userData['password'] == md5($oldPassword)) {
    if ($newPassword == $confirmPassword) {
      $password = md5($newPassword);
      $query = mysqli_query($data->con,"UPDATE tbl_user SET password='$password' WHERE user_id='$id'");
      if($query)
      {
        $message = "Password Changed Sucessfully";
      } else {
        $message = "Password changing failed!";
      }
  } else {
    $message = "Password Didn't match";
  } 
} else {
  $message = "Old Password didn't match!";
}
  

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password:</title>
    <style media="screen">
      .container{
        width: 40%;
        margin: auto;
        text-align: center;
        background:#333 ;
        padding: 50px;
        margin-top: 150px;
        color:white;
      }
      body{
        font-size: 16px;
        background-image:url('abcd.jpg');
        font-family: Verdana;
        height:100%;
      }
      input{
        padding: 4px;
        margin: 10px;
        width: 200px;
      }
      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  margin-top:0px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
    </style>
  </head>

  <body>
  <ul>
        <li style="float:left;"><a class="active" href="#home">USER DASHBOARD</a></li>
        <li  style="float:right;"><a href="#news"></a></li>
        <li  style="float:right;"><a href="userlogout.php"><b>Logout</b></a></li>
        <li  style="float:right;"><a href="cpass.php"><b>Change Password</b></a></li>
        <li  style="float:right;"><a href="updateprofile.php"><b>Update Profile</b></a></li>
        <li  style="float:right;"><a href="uprofile.php"><b>User Profile</b></a></li>
        <li  style="float:right;"><a href="userprerides.php"><b>Previous Rides</b></a></li>
        <li style="float:right;"><a href="cabbook.php"><b>Book Cab</b></a></li>
    </ul>
  
  <div class="container">
  <div><?php if(isset($message)) { echo $message; } ?></div>
      <h2>Change Password:</h2>
      
      <form action="" method="POST">
  
      <label>Current Password:</label>
        <input type="password" name="password" required><br>
        <label>New Password:</label>
        <input type="password" name="newpassword" required><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirmpassword" required><br>
       
        <input type="submit" name="submit" value="update">
        
      </form>
    </div>
  </body>
</html>
<?php


/*
if(count($_POST)>0) {
$result = mysqli_query($data->con,"SELECT *from tbl_user WHERE user_id='" . $id . "'");
$row=mysqli_fetch_array($result);
if(isset($_POST['submit']))
{
if($_POST["password"] == $row["password"] && $_POST["newpassword"] == $row["confirmpassword"] ) {
mysqli_query($data->con,"UPDATE tbl_user set password='" . $_POST["newpassword"] . "' WHERE user_id='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
}
*/

?>