<?php 
if(isset($_REQUEST['msg'])) {
  
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup page</title>
    <style media="screen">
      .container{
        width: 40%;
        margin: auto;
        text-align: center;
        background:  #333;
        padding: 50px;
        margin-top: 150px;
        color:white;
      }
      body{
        font-size: 16px;
        background-image:url('abcd.jpg');
        font-family: Verdana;
      }
      input{
        padding: 4px;
        margin: 10px;
        width: 300px;
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
        
        
        <li style="float:right;"><a href="index.php"><b>Book Cab</b></a></li>
        <li style="float:right;"><a href="signup.php"><b>Sign Up</b></a></li>
    </ul>
    <div class="container">
      <?php if(isset($_REQUEST['msg'])){ echo '<p style="color:red;">'.$_REQUEST['msg'].'</p>';} ?>
      <h2>Fill User-login details:</h2>
      <form action="validate.php" method="post">
        <label>Username:</label>
        <input type="text" name="user_name" value=<?php if(isset($_COOKIE['member_login'])){echo $_COOKIE['member_login'];}?> required><br>
        <label>Password :</label>
        <input type="password" name="password" required><br>
        <input type="checkbox" id="check" name="remember" >Remember me..</input>
        <input type="submit" name="submit" value="Login">
        <a href="signup.php" style="color:white;">New user?</a>
      </form>
    </div>
    
  </body>
</html>

