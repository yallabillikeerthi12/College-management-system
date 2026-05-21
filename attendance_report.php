<?php
error_reporting(0);
include "db_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Attendance Report</title>
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
border:none;
}
button
{
background-color:#e94560;
color:white;
cursor:pointer;
}
button:hover
{
backgrond-color:#c73652;
}
table
{
margin:20px auto;
width:80%;
}
th
{
background-color:#94560;
color:white;
padding:12px;
}
td
{
padding:10px;
border:1px solid #444;
color:white;
}
</style>
</head>
<body>
<h2>Attendance Report</h2>
<form method="GET">
<label>Branch:</label>
<select name="branch">
<option value="">--Select Branch--</option>
<option value="CME">CME</option>
<option value="ECE">ECE</option>
</select>
<label>Year:</label>
<select name="year">
<option value="">--Select Year--</option>
<option value="2024-2027">1st Year</option>
<option value="2023-2026">2nd Year</option>
<option value="2022-2025">3rd Year</option>
</select>
<button type="submit">View Report</button>
</form>
<?php
if(isset($_GET["branch"]) && $_GET["branch"]!=""){
$branch=$_GET["branch"];
$year=$_GET["year"];
$students=mysqli_query($conn,"SELECT * FROM students WHERE dept='$branch' AND year='$year'");
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Present</th><th>Total</th><th>Percentage</th><th>Status</th></tr>";
while($stu=mysqli_fetch_assoc($students)){
$sid=$stu["id"];
$total=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attendance WHERE student_id='$sid'"));
$present=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attendance WHERE student_id='$sid' AND status='Present'"));
$percentage=($total>0)?round(($present/$total)*100,2):0;
if($percentage<=75){
$alert="<font color='red'>LOW ATTENDANCE</font>";
}else{
$alert="<font color='green'>OK</font>";
}
echo "<tr><td>".$stu["name"]."</td><td>$present</td><td>$total</td><td>$percentage%</td><td>$alert</td></tr>";
}
echo "</table>";
}
?>
</body>
</html>