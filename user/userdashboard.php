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
         <img src="logo2.png" height="65px" width="85px" style="margin-left:630px;margin-top:60px;">
             <h1 id="h1"> Welcome to the User Dashboard</h1>
            
         
         </div>
     
     </section>



     <footer class="footer">
         <p><b>@CEDCabs Services<b></p>

     </footer>
    
</body>
</html>