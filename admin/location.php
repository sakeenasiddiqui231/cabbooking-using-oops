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







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mystyle.css">
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
     <section class="img">
         <div>
         <img src="logo2.png" height="55px" width="75px" style="margin-left:630px;margin-top:20px;">
             <h1 id="h1"> Distance of Routes</h1>
             <div class="muser">

             <?php
 
                include "configg.php";
                $data = new Config();
                


                    if(isset($_GET['edid']))
                    {
                        $available =$_GET['action'];
                        $l_id = $_GET['edid'];
                        if($available == 'available')
                        {
                            
                           $query = mysqli_query($data->con,"Update tbl_location set is_available='0' where id='".$_GET['edid']."' ");
                           $data1 = mysqli_query($data->con, $query);
                        }
                        elseif($available == 'notavailable'){
                            $query = mysqli_query($data->con,"Update tbl_location set is_available='1' where id='".$_GET['edid']."' ");
                            $data1 = mysqli_query($data->con, $query);

                          }
    
                }

           ?>
            
             <table>
                <thead>
                    <tr>
                    <th>Route Name</th>
                        <th>Distance</th>
                    <th>Available</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                $selectSQL = 'SELECT * FROM `tbl_location`';
                if( !( $selectRes = mysqli_query( $data->con, $selectSQL ) ) ){
                echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
                }elseif( mysqli_num_rows( $selectRes )==0 ){
                        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                    }else{
                        while( $row = mysqli_fetch_assoc( $selectRes ) ){
                            if($row['is_available'] == '1')
                            {
                                $row['is_available'] = "available";
                            }
                            else if($row['is_available'] == '0')
                            {
                                $row['is_available'] = "notavailable";
                            }

                        echo "<tr>
                                <td>{$row['name']}</td> 
                                <td>{$row['distance']}</td> 
                                <td>{$row['is_available']}</td>
                                <td><a href='updatelocation.php?rn=".$row['id']." &n=".$row['name']." &ds=".$row['distance']." &iv=".$row['is_available']."'>
                                <input type='submit' value='Edit' id='editbtn'></a>
                                <a href='deletelocation.php?rn=".$row['id']."' ><input type='submit' value='Delete' id='editbtn'></a>
                                <a href='location.php?edid=".$row['id']."&action=".$row['is_available']."' ><input type='submit' value='Enabled/Disabled' id='editbtn1'></a>
                                </td>
                            </tr>";
                        }
                    }
                    ?>
  </tbody>
</table>
    <?php
 
?>
             <div>


         
         </div>
         <button onclick="location.href='addlocation.php'" id="adbtn" type="submit">
        Add Location</button>
     
     </section>



     <footer class="footer">
         <p><b>@CEDCabs Services<b></p>

     </footer>
    
</body>
</html>