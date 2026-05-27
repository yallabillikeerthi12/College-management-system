<?php
$con = mysqli_connect("localhost", "root", "", "college_management");

if(!$con){
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>