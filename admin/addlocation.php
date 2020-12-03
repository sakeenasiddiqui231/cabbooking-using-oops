<?php
session_start();

if(isset($_SESSION['userdata'])){
    if ($_SESSION['userdata']['is_admin'] == '0') {
        header('location: ../user/userdashboard.php');
    }
    
} else{
    header('location: ../index.php');
}


?>






<?php
include "configg.php";
$data = new Config();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="mystyle.css">
    <meta charset="utf-8">
    <title>Add Location</title>
    <style media="screen">
      .container{
        width: 40%;
        margin: auto;
        text-align: center;
        background:#333 ;
        padding: 50px;
        margin-top: 90px;
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
    </style>
  </head>

  <body>
  <div class="navbar">
  <a href="admindashboard.php" style="margin-left:30px;">Admin Dasboard</a>
  <a href="logout.php" style="float:right;margin-right:50px;">Logout</a>
  <div class="dropdown" style="float:right;">
    <button class="dropbtn">Rides 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="pendingrides.php">Pending Rides</a>
      <a href="completedrides.php">Completed Rides</a>
      <a href="cancelledrides.php">Cancelled Rides</a>
      <a href="allrides.php">All Rides</a>
    </div>
  </div> 
  <div class="dropdown" style="float:right;" >
    <button class="dropbtn">Locations 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="location.php">All Locations</a>
      <a href="addlocation.php">Add NewLocation</a>
      
    </div>
  </div> 
  <div class="dropdown" style="float:right;">
    <button class="dropbtn">Users 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="pendinguser.php">Pending User</a>
      <a href="approveuser.php">Approved User</a>
      <a href="alluser.php">All User</a>
    </div>
  </div> 
</div>
  
  <div class="container">
      <h2>Add Location:</h2>
      <form action="" method="GET">
        <label>RouteName:</label>
        <input type="text" name="name" value="" required><br>
        <label>Distance :</label>
        <input type="text" name="distance" value="" required><br>
        <label>Available :</label>
        <input type="text" name="is_available" value="" required><br>
        <input type="submit" name="submit" value="ADD">
        
      </form>
    </div>
  </body>
</html>
<?php
if($_GET['submit']) 
{
    
    $name = $_GET['name'];
    $distance = $_GET['distance'];
    $avail = $_GET['is_available'];
    if($avail == 'yes') {
      $available = '1';
    } else {
      $available = '0';
    }
    $query = "INSERT into tbl_location (name, distance, is_available)
    VALUES ('$name', '$distance', '$avail')";
     $data1 = mysqli_query($data->con, $query);
    // print_r($data1);
    // die();
   if($data1 == true){
       echo "<script>alert('record inserted')</script>";
       header("location:location.php");
   }
   else{
       echo "Error ".mysqli_error($data->con );
   }


}  


?>