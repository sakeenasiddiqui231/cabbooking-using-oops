<?php

include "configg.php";
$data = new Config();
error_reporting(0);

$rideid = $_GET['edid'];
$query = "DELETE FROM tbl_ride WHERE ride_id = '$rideid' ";
$data1 = mysqli_query($data->con, $query);
if($data)
{
    echo "<script>alert('record deleted successfully')</script>";
    header("location:allrides.php");
}
else{
    echo "<script>alert('failed to delete record')</script>";
}



?>