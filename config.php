<?php
$con = mysqli_connect("localhost","root","","myshop");

if(!$con) {
   echo "Connection Failed" . mysqli_connect_error();
}
?>