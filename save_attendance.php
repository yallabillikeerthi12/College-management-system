<?php
include "db_connect.php";
error_reporting(0);
$branch=$_POST["branch"];
$year=$_POST["year"];
$date=$_POST["date"];
$status=$_POST["status"];

foreach($status as $student_id =>$att_status)
{
$name_query="SELECT * FROM attendance WHERE student_id='$student_id";
$name_result=mysqli_query($conn,$name_query);
$name_row=mysqli_fetch_assoc($name_result);
$student_name=$name_row["name"];
$check="SELECT * FROM attendance WHERE student_id='student_id";
$check_result=mysqli_query($conn,$check);
if(mysqli_num_rows($check_result)==0)
{
$insert="INSERT INTO attendance(student_id,student_name,dept,year,date,status) VALUES ('$student_id','$student_name','$branch','$year','$date','$att_status')";

mysqli_query($conn,$insert);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>attendance saved</title>
<style>
body
{
background:#1b4b6d;
color:white;
font-family:arial;
text-align:center;
padding:100px;
}
h2
{
font-size:35px;
color:#6bff6b;
}
a
{
display:inline-block;
margin:15px;
padding:15px 35px;
background-color:#e94560;
color:white;
border-radius:25px;
font-size:18px;
}
a:hover
{
background-color:#c73652;
}
</style>
</head>
<body>
<h2>Attendance saved successfully!</h2><br>
<a href ="mark_attendance.php">mark again</a>
<a href="attendance_report.php">view report</a>
</body>
</html>

