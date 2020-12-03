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
if(isset($_GET['ride_d'])){
    if($_GET['ride_d']=="ASC") {
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(ride_date as unsigned) ASC");
    } elseif($_GET['ride_d']=="DESC") {
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(ride_date as unsigned) DESC");
    } 
    $results = mysqli_num_rows($alist);
}
if(isset($_GET['distance'])){
    if($_GET['distance']=="ASC") {
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(total_distance as unsigned) ASC");
    } elseif($_GET['distance']=="DESC") {
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(total_distance as unsigned) DESC");
    }
    $results = mysqli_num_rows($alist);
}
if(isset($_GET['fare'])){
    if($_GET['fare']=="ASC"){
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(total_fare as unsigned) ASC");
    } elseif($_GET['fare']=="DESC") {
        $alist = mysqli_query($data->con, "SELECT * FROM tbl_ride ORDER BY cast(total_fare as unsigned) DESC");
    }
    $results = mysqli_num_rows($alist);

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
         <img src="logo2.png" height="55px" width="75px" style="margin-left:630px;margin-top:40px;">
             <h1 id="h1"> All the Cancelled Rides</h1>
             <div class="muser">

             <?php
 
                
                $selectSQL = 'SELECT * FROM `tbl_ride`';
                if( !( $selectRes = mysqli_query( $data->con, $selectSQL ) ) ){
                  echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
                }else{
           ?>
            
             <table>
                <thead>
                    <tr>
                    <th>Ride Id</th>
                    <th>Ride Date</th>
                    <th>
                        <a href="cancelledrides.php?ride_d=ASC" style="color:white;">Asc</a>
                        <a href="cancelledrides.php?ride_d=DESC" style="color:white;">DESC</a>
                    </th>
                    <th>To</th>
                    <th>From</th>
                    <th>Total Distance</th>
                    <th>
                        <a href="cancelledrides.php?distance=ASC" style="color:white;">Asc</a>
                        <a href="cancelledrides.php?distance=DESC" style="color:white;">DESC</a>
                    </th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                    <th>
                        <a href="cancelledrides.php?fare=ASC" style="color:white;">Asc</a>
                        <a href="cancelledrides.php?fare=DESC" style="color:white;">DESC</a>
                    </th>
                    <th>Cus_User_Id</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if( mysqli_num_rows( $selectRes )==0 ){
                        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                    }elseif(isset($alist)) {
                        while( $row = mysqli_fetch_assoc( $alist ) ){
                            if($row['status'] == 0)
                            {

                        echo "<tr>
                                <td>{$row['ride_id']}</td> 
                                <td>{$row['ride_date']}</td>
                                <td></td> 
                                <td>{$row['from']}</td>
                                <td>{$row['to']}</td>
                                <td>{$row['total_distance']}</td>
                                <td></td>
                                <td>{$row['luggage']}</td>
                                <td>{$row['total_fare']}</td>
                                <td></td>
                                <td>{$row['cus_user_id']}</td>
                                
                            </tr>";
                        }
                    }
                    }else{
                    while( $row = mysqli_fetch_assoc( $selectRes ) ){
                        if($row['status'] == 0)
                        {

                    echo "<tr>
                            <td>{$row['ride_id']}</td> 
                            <td>{$row['ride_date']}</td>
                            
                            <td>{$row['from']}</td>
                            <td>{$row['to']}</td>
                            <td>{$row['total_distance']}</td>
                            
                            <td>{$row['luggage']}</td>
                            <td>{$row['total_fare']}</td>
                            
                            <td>{$row['cus_user_id']}</td>
                            
                        </tr>";
                    }
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