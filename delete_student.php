<?php
error_reporting(0);
include "db.php";
$sno=$GET["id"];
mysqli_query($conn,"delete from student where sno='$sno'");
echo "<script>window.location='add_students.php';</script>";
?>