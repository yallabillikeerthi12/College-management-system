<?php
session_start();
if (!isset($_SESSION["att_logged_in"])) {
    header("Location: attendance_login.php");
    exit();
}
include "db_connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Mark Attendance</title>
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
color:white;
}
select,button
{
padding:10px 15px;
margin:10px;
border-radius:8px;
font-size:16px;
}
button
{
background-color:#e94560;
color:white;
cursor:pointer;
}
button:hover
{
background-color:#c73652;
}
#student_list table
{
margin:20px auto;
width:90%;
}
#student_list th
{
background-color:#e94560;
color:white;
padding:12px;
}
#student_list td
{
padding:10px;
border:1px solid #444;
color:white;
}
</style>
</head>
<body>
<h2>Mark Attendance</h2>

<label>Branch:</label>
<select id="branch">
<option value="">--Select Branch--</option>
<option value="CME">CME</option>
<option value="ECE">ECE</option>
</select>

<label>Year:</label>
<select id="year">
<option value="">--Select Year--</option>
<option value="2024-2027">1st Year</option>
<option value="2023-2026">2nd Year</option>
<option value="2022-2025">3rd Year</option>
</select>

<button onclick="loadStudents()">Load Students</button>

<div id="student_list"></div>

<script>
function loadStudents() {
    var branch = document.getElementById("branch").value;
    var year = document.getElementById("year").value;
    if (branch == "" || year == "") {
        alert("Please select Branch and Year!");
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_students.php?branch=" + branch + "&year=" + year, true);
    xhr.onload = function () {
        document.getElementById("student_list").innerHTML = this.responseText;
    };
    xhr.send();
}
</script>
</body>
</html>


