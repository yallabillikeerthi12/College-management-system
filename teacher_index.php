<?php
error_reporting(0);
include "db_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Module - Home</title>
<style>
body{
background:#1b4b6d;
color:white;
font-family:Arial;
text-align:center;
padding:50px;
min-height:100vh;
margin:0;
box-sizing:border-box;
}
h1{font-size:40px;color:white;margin-bottom:10px;}
p{font-size:18px;color:#ccc;margin-bottom:40px;}
.card{
display:inline-block;
background:#16405c;
border-radius:15px;
padding:30px 40px;
margin:15px;
width:200px;
text-decoration:none;
color:white;
font-size:18px;
transition:background 0.3s;
}
.card:hover{background:#28a745;}
</style>
</head>
<body>
<h1>Teacher Module</h1>
<p>College Management System</p>
<a href="add_teacher.php" class="card">Manage Teachers</a>
<a href="mark_teacher_attendance.php" class="card">Attendance</a>
<a href="assign_subject.php" class="card">Subjects</a>
<a href="teacher_login.php" class="card">Login</a>
</body>
</html>