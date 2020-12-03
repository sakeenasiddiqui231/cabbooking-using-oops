<?php
include "configg.php";
$data = new Config();
error_reporting(0);
if($_GET['submit']) 
{
    while( $row = mysqli_fetch_assoc( $selectRes ) ){
    if($row['status'] == 1){
        $row['status'] = 2;

    }
}
}
?>