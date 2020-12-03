<?php
session_start();

if(isset($_SESSION['userdata'])){
    if ($_SESSION['userdata']['is_admin'] == '1') {
        header('location: ../admin/admindashboard.php');
    }
    
} else{
    header('location: index.php');
}


?>



<?php

include "configg.php";
$data = new Config();
$id = $_SESSION['userdata']['user_id'];

        
$q = "SELECT * FROM `tbl_user` where `user_id`='$id'";

$query  = mysqli_query( $data->con, $q );
$row = mysqli_fetch_assoc($query);



       
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Location</title>
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
        <li  style="float:right;"><a href="upendingrides.php"><b>Pending Rides</b></a></li>
        <li  style="float:right;"><a href="userprerides.php"><b>Previous Rides</b></a></li>
        <li style="float:right;"><a href="cabbook.php"><b>Book Cab</b></a></li>
    </ul>
  
    
  <div class="container">
    
      <h2>Update Profile:</h2>
      <form action="" method="GET">
  
      <label>Username:</label>
        <input type="text" name="user_name" value="<?php echo $row['user_name'] ?>" required><br>
        <label>Mobile Number:</label>
        <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>" required><br>
        
        <input type="submit" name="submit" value="update">
        
      </form>
    </div>
  </body>
</html>
<?php
if(isset($_GET['submit'])) 
{
    $user_name = $_GET['user_name'];
    $mobile = $_GET['mobile'];
    
    $id =$_SESSION['userdata']['user_id'];
    
    $qy = "UPDATE tbl_user SET `user_name`='$user_name', `mobile`='$mobile' 
    WHERE `user_id`='$id'";
    
     $data1 = mysqli_query($data->con, $qy);
     
    
   if($data1 == true){
       echo "<script>alert('record updated Successfully')</script>";
      header("location:userdashboard.php");
   }
   else{
       echo "Error ".mysqli_error($data->con );
   }


}  


?>