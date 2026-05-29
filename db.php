<?php
 //connecting to the database
    $con=mysqli_connect("localhost","root","","college_management");
    if(!$con)
        {
            die("connection failed". mysqli_connect_error());
        }
       ?>