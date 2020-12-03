<?php

include "configg.php";
$data = new Config();
error_reporting(0);

$id = $_GET['rn'];
$query = "DELETE FROM tbl_location WHERE id = '$id' ";
$data1 = mysqli_query($data->con, $query);
if($data)
{
    echo "<script>alert('record deleted successfully')</script>";
    header("location:location.php");
}
else{
    echo "<script>alert('failed to delete record')</script>";
}



?>