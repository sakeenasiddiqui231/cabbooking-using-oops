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
          <img src="logo2.png" height="55px" width="75px" style="margin-left:630px;margin-top:30px;">
          <h1 id="h1"> Manage all the Users</h1>
          <div class="muser">

            <?php
 
                include "configg.php";
                $data = new Config();
                $selectSQL = 'SELECT * FROM `tbl_user`';
                if( !( $selectRes = mysqli_query( $data->con, $selectSQL ) ) ){
                  echo 'Retrieval of data from Database Failed - #'.mysqli_errno().': '.mysqli_error();
                }else{
           ?>
              <table>
              <tr>
                <th>Username</th>
                <th>Block/Unblock</th>
                <th>Actions</th>
              </tr>
              <tbody>

            <?php
                  if( mysqli_num_rows( $selectRes )==0 ){
                    echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                  }else{
                    while( $row = mysqli_fetch_assoc( $selectRes ) ){
                    
                      ?>
                       <tr>
                       <td id="uname"><?php echo $row['user_name'];?></td>
                      <td>
                              <?php
                                    if($row['isblock']== 1)
                                    {
                                      echo "<p id=str".$row['user_id'].">Unblock</p>";
                                    }
                                    else{
                                      echo "<p id=str".$row['user_id'].">Block</p>";
                                    }

                              ?>
                      </td>
                      <td>
                      <select onchange="unblock_block_user(this.value,<?php echo $row['user_id'];?>)">
                      <option value="1">Unblock</option>
                      <option value="0">Block</option>
                      </select>
                      </td>
                    </tr>
                    
                  
                      <?php
                  }
                }
              }
                
            ?>
              </tbody>
              </table>
             
           

      </section>
      <footer class="footer">
        <p><b>@CEDCabs Services<b></p>

      </footer>

</body>
        
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>

              function unblock_block_user(val, user_id)
              {

                 $.ajax({
                    type: "POST",
                    url:'change.php',
                    data: {val:val,user_id:user_id},
                    success: function(result){
                      console.log(result);
                      if(result == 1){
                        $('#str'+user_id).html('Unblock');
                      } else {
                        $('#str'+user_id).html('Block');
                      }
                      
                    }
                 });
              }




            </script>
          
</body>

</html>