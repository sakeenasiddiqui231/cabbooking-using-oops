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
     <heade>
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
             <h1 id="h1"> User Profile</h1>
             <div class="muser">

        <?php
 
                    include "configg.php";
                    $data = new Config();
                    // print_r($_SESSION);
                    // exit;
                    $q = "SELECT * FROM tbl_user where user_id='".$_SESSION['userdata']['user_id']."'";
                    $query  = mysqli_query( $data->con, $q );
        ?>
            
          <table>
                 <thead>
                            <tr>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Date of Signup</th>
                            <th>Mobile Number</th>
                            <th>Name</th>
                            </tr>
                   </thead>
               <tbody>  
                    <?php
                    
                        while( $row = mysqli_fetch_assoc( $query) ){
                            

                        echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>{$row['user_name']}</td> 
                                <td>{$row['date_signup']}</td> 
                                <td>{$row['mobile']}</td>   
                                <td>{$row['name']}</td>    
                            </tr>";
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