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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
     <header>
     <div class="container">
     <ul>
        <li style="float:left;"><a class="active" href="#home">USER DASHBOARD</a></li>
        <li><a href="#news"></a></li>
        <li><a href="userlogout.php"><b>Logout</b></a></li>
        <li><a href="cpass.php"><b>Change Password</b></a></li>
        <li><a href="updateprofile.php"><b>Update Profile</b></a></li>
        <li><a href="uprofile.php"><b>User Profile</b></a></li>
        <li><a href="upendingrides.php"><b>Pending Rides</b></a></li>
        <li><a href="userprerides.php"><b>Previous Rides</b></a></li>
        <li><a href="cabbook.php"><b>Book Cab</b></a></li>
    </ul>
     
     </div>
     <header>
     <section class="img">
         <div>
         <img src="logo2.png" height="55px" width="75px" style="margin-left:630px;margin-top:40px;">
             <h1 id="h1"> All the Pending Rides of User</h1>
             <div class="muser">

        <?php
 
                    include "configg.php";
                    $data = new Config();
                    // print_r($_SESSION);
                    // exit;
                    $q = "SELECT * FROM tbl_ride where cus_user_id='".$_SESSION['userdata']['user_id']."'";
                    $query  = mysqli_query( $data->con, $q );
        ?>
            
          <table>
                 <thead>
                            <tr>
                            <th>Ride Id</th>
                            <th>Ride Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Total Distance</th>
                            <th>Luggage</th>
                            <th>Total Fare</th>
                            <th>Status</th>
                            <th>Cus_User_Id</th>
                            </tr>
                   </thead>
               <tbody>
                    <?php
                    
                        while( $row = mysqli_fetch_assoc( $query ) ){
                           
                             if($row['status'] == 1)
                            {
                                
                            
                            

                        echo "<tr>
                                <td>{$row['ride_id']}</td>
                                <td>{$row['ride_date']}</td> 
                                <td>{$row['from']}</td> 
                                <td>{$row['to']}</td>   
                                <td>{$row['total_distance']}</td>
                                <td>{$row['luggage']}</td>
                                <td>{$row['total_fare']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['cus_user_id']}
                                
                                
                            </tr>";
                       }
                     }
                
                    ?>
              </tbody>
         </table>
    <?php

   ?>      
     </section>
     <footer class="footer">
         <p><b>@CEDCabs Services<b></p>

     </footer>
    
</body>
</html>