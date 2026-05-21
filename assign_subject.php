<?php
error_reporting(0);
include "db_connect.php";

if(isset($_POST["assign"])){
$teacher_id=$_POST["teacher_id"];
$teacher_name=$_POST["teacher_name"];
$dept=$_POST["dept"];
$year=$_POST["year"];
$subject_name=$_POST["subject_name"];

$insert="INSERT INTO subjects (teacher_id,teacher_name,dept,year,subject_name) VALUES ('$teacher_id','$teacher_name','$dept','$year','$subject_name')";
mysqli_query($conn,$insert);
echo "<p style='color:green;'>Subject assigned successfully!</p>";
}

$teachers=mysqli_query($conn,"SELECT * FROM teachers");
$subjects=mysqli_query($conn,"SELECT * FROM subjects");
?>
<!DOCTYPE html>
<html>
<head>
<title>Assign Subjects</title>
<style>
body{
background:#1b4b6d;
color:white;
font-family:Arial;
text-align:center;
padding:30px;
min-height:100vh;
margin:0;
box-sizing:border-box;
}
h2{font-size:35px;color:white;}
input,select{
padding:10px;
margin:8px;
border-radius:8px;
border:none;
font-size:16px;
width:250px;
}
button{
padding:10px 25px;
background:#28a745;
color:white;
border:none;
border-radius:25px;
font-size:16px;
cursor:pointer;
margin-top:10px;
}
button:hover{background:#218838;}
table{
margin:20px auto;
border-collapse:collapse;
width:90%;
}
th{
background:#28a745;
color:white;
padding:12px;
}
td{
padding:10px;
border:1px solid #444;
color:white;
}
tr:nth-child(even){background-color:#16405c;}
a{color:#28a745;text-decoration:none;}
</style>
</head>
<body>
<h2>Assign Subject</h2>
<form method="POST">
Teacher:
<select name="teacher_id" id="teacher_select" onchange="fillTeacher()">
<option value="">--Select Teacher--</option>
<?php while($t=mysqli_fetch_assoc($teachers)){ ?>
<option value="<?php echo $t['teacher_id']; ?>" data-name="<?php echo $t['name']; ?>" data-dept="<?php echo $t['dept']; ?>">
<?php echo $t['name']; ?>
</option>
<?php } ?>
</select><br>
<input type="hidden" name="teacher_name" id="teacher_name"/>
<input type="hidden" name="dept" id="dept"/>
Year:
<select name="year">
<option value="sem1">1st Year</option>
<option value="sem3">2nd Year-3rd sem</option>
<option value="sem4">2nd Year-4th sem</option>
<option value="sem5">3rd Year-5th sem</option>
<option value="sem6">3rd Year-6th sem</option>
</select><br>
Subject: <input type="text" name="subject_name" placeholder="Enter subject name" required/><br>
<button type="submit" name="assign">Assign Subject</button>
</form>

<h2>Subject List</h2>
<table>
<tr><th>SNo</th><th>Teacher</th><th>Dept</th><th>Year</th><th>Subject</th><th>Action</th></tr>
<?php
$sno=1;
while($row=mysqli_fetch_assoc($subjects)){
?>
<tr>
<td><?php echo $sno; ?></td>
<td><?php echo $row["teacher_name"]; ?></td>
<td><?php echo $row["dept"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><?php echo $row["subject_name"]; ?></td>
<td><a href="delete_subject.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
</tr>
<?php $sno++; } ?>
</table>
<br>
<a href="index.php">Back to Home</a>

<script>
function fillTeacher(){
var select=document.getElementById("teacher_select");
var option=select.options[select.selectedIndex];
document.getElementById("teacher_name").value=option.getAttribute("data-name");
document.getElementById("dept").value=option.getAttribute("data-dept");
}
</script>
</body>
</html>