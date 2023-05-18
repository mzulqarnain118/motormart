<?php
// $con = mysqli_connect("sdb-51.hosting.stackcp.net","motor_mart-353030331ee5","36yo5zgvdw","motor_mart-353030331ee5");
$con = mysqli_connect("localhost:3306","root","12345","motor");
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
@session_start();
?>