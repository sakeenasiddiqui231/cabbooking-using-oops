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
             <h1 id="h1"> All the Approved Users</h1>
             <div class="muser">

             <?php
               
                include "configg.php";
                $data = new Config();
                
                $selectSQL = "SELECT * FROM `tbl_user` WHERE isblock = '1'";
                if( !( $selectRes = mysqli_query( $data->con, $selectSQL ) ) ){
                  echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
                }else{
           ?>
            
             <table>
                <thead>
                    <tr>
                    <th>User Id</th>
                        <th>Username</th>
                    <th>Date of Signup</th>
                    <th>Mobile</th>
                    <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if( mysqli_num_rows( $selectRes )==0 ){
                        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                    }else{
                        while( $row = mysqli_fetch_assoc( $selectRes ) ){
                            

                        echo "<tr>
                                <td>{$row['user_id']}</td> 
                                <td>{$row['user_name']}</td> 
                                <td>{$row['date_signup']}</td>
                                <td>{$row['mobile']}</td>
                                <td>{$row['name']}</td>
                                
                                
                                
                            </tr>";
                        }
                    }
                    ?>
  </tbody>
</table>
    <?php
  }

?>
             <div>


         
         </div>
         
     
     </section>



     <footer class="footer">
         <p><b>@CEDCabs Services<b></p>

     </footer>
    
</body>
</html>