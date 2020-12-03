<?php

include "configg.php";
$data = new Config();
error_reporting(0);

$ride_id = $_GET['id'];

$ride_date =$_GET['rd'];
$from = $_GET['from'];
$to = $_GET['to'];
$total_dist = $_GET['total_d'];

$luggage = $_GET['total_l'];
$total_fare = $_GET['total_f'];
$c_u_i = $_GET['cui'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style media="screen">
      .container{
        width: 35%;
        height:100%;
        padding: 4px;
        margin: 10px;
        width: 200px;
      }
      table, th, td {
  border: 2px solid black;
  border-collapse: 
}
th, td {
  padding: 15px;
}
    </style>
</head>
<body>
<table align="center" style="margin-top:90px;">
  <tr>
    <th>Ride Id</th>
    <th><?php echo $ride_id; ?></th>
    
  </tr>
  <tr>
    <td>Ride Date</td>
    <td><?php echo $ride_date ?></td>
   
  </tr>
  <tr>
    <td>From</td>
    <td><?php echo $from ?></td>
    
  </tr>
  <tr>
    <td>To</td>
    <td><?php echo $to ?></td>
    
  </tr>
  <tr>
    <td>Total Distance</td>
    <td><?php echo $total_dist ?></td>
   
  </tr>
  <tr>
    <td>Luggage</td>
    <td><?php echo $luggage ?></td>
    
  </tr>
  <tr>
    <td>Total Fare</td>
    <td><?php echo $total_fare ?></td>
    
  </tr>
  <tr>
    <td>Customer Usre Id</td>
    <td><?php echo $c_u_i ?></td>
    
  </tr>
</table>


    <div>

    
</body>
</html>