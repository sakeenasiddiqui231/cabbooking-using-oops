<?php
session_start();
include "configg.php";
$data = new Config();

$c_city = $_GET['ccity'];
$d_city = $_GET['dcity'];
$c_type = $_GET['cabtype'];
$weight = $_GET['lweight'];
$fare = $_GET['fare'];
$total_dist = $_GET['total_dist'];


$query = "INSERT INTO tbl_ride (`ride_date`,`from`, `to`, `total_distance`, `cab_type`, `luggage`, `total_fare`,`status`,`cus_user_id`) 
  			  VALUES(NOW(),'$c_city', '$d_city', '$total_dist', '$c_type', '$weight', '$fare','1','".$_SESSION['userdata']['user_id']."')";
	  $data1 = mysqli_query($data->con, $query);
	  if($data1 == true){
		echo "<script>alert('Your ride booked succcessfully')</script>";
		header('location:userdashboard.php');
		
	}
	else{
		echo "Error ".mysqli_error($data->con );
	}
?>