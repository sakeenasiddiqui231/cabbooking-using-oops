<?php
include "configg.php";
$data = new Config();
error_reporting(0);

$rn = $_GET['rn'];
$n = $_GET['n'];
$ds = $_GET['ds'];
$dv = $_GET['iv'];



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
        margin-top: 90px;
        color:white;
      }
      body{
        font-size: 16px;
        background-image:linear-gradient(rgba(10, 2, 7, 0.288), rgba(50, 50, 100, 0.7)),url('abcd.jpg');
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
  <div class="container">
      <h2>Update Location:</h2>
      <form action="" method="GET">
  
      <label>Id:</label>
        <input type="text" name="id" value="<?php echo "$rn" ?>" required><br>
        <label>RouteName:</label>
        <input type="text" name="name" value="<?php echo "$n" ?>" required><br>
        <label>Distance :</label>
        <input type="text" name="distance" value="<?php echo "$ds" ?>" required><br>
        <label>Available :</label>
        <input type="text" name="is_available" value="<?php echo "$dv" ?>" required><br>
        <input type="submit" name="submit" value="update">
        
      </form>
    </div>
  </body>
</html>
<?php
if($_GET['submit']) 
{
    $id = $_GET['id'];
    $name = $_GET['name'];
    $distance = $_GET['distance'];
    $avail = $_GET['is_available'];
    if($avail == 'available') {
      $available = '1';
    } else {
      $available = '0';
    }
    $query = "UPDATE tbl_location SET `name`='".$name."', `distance`='".$distance."', `is_available`='".$available."'
    WHERE `id`='".$id."'";
     $data1 = mysqli_query($data->con, $query);
    // print_r($data1);
    // die();
   if($data1 == true){
       echo "<script>alert('record updated')</script>";
       header("location:location.php");
   }
   else{
       echo "Error ".mysqli_error($data->con );
   }


}  


?>