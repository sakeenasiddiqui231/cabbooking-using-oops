<?php

  class Config {
    public $con;

      function __construct(){
          $this->con = mysqli_connect('localhost', 'root', '', 'taxi_boking');
          if($this->con->connect_error){
              die("Connection failed:" . $this->con->connect_error);
          }
        //   echo "Connected Sucessfully";
      }
  }
  $data = new Config();
  
?>