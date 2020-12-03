<?php
require('configg.php');
$data = new Config();
// $val = $_GET['val'];
$query = mysqli_query($data->con,"Update tbl_user set isblock='".$_POST['val']."' where user_id='".$_POST['user_id']."' ");

if($query)
{
    $q = mysqli_query($data->con, "Select * from tbl_user where user_id='".$_POST['user_id']."' ");
   while($data=mysqli_fetch_assoc($q)){
       $status=$data['isblock'];
       echo $status;
   }
}
?>