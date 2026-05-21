<?php
error_reporting(0);
include "db_connect.php";

if(isset($_POST["add"])){
$teacher_id=$_POST["teacher_id"];
$name=$_POST["name"];
$dept=$_POST["dept"];
$qualification=$_POST["qualification"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$insert="INSERT INTO teachers (teacher_id,name,dept,qualification,phone,email) VALUES ('$teacher_id','$name','$dept','$qualification','$phone','$email')";
mysqli_query($conn,$insert);

echo "<p style='color:green;'>Teacher added successfully!</p>";
}

$teachers=mysqli_query($conn,"SELECT * FROM teachers");
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Module</title>
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
<h2>Add Teacher</h2>
<form method="POST">
Teacher ID: <input type="text" name="teacher_id" required/><br>
Name: <input type="text" name="name" required/><br>
Department:
<select name="dept">
<option value="CME">CME</option>
<option value="ECE">ECE</option>
</select><br>
Qualification: <input type="text" name="qualification"/><br>
Phone: <input type="text" name="phone"/><br>
Email: <input type="text" name="email"/><br>
<button type="submit" name="add">Add Teacher</button>
</form>

<h2>Teacher List</h2>
<table>
<tr><th>SNo</th><th>Teacher ID</th><th>Name</th><th>Dept</th><th>Qualification</th><th>Phone</th><th>Email</th><th>Action</th></tr>
<?php
$sno=1;
while($row=mysqli_fetch_assoc($teachers)){
?>
<tr>
<td><?php echo $sno; ?></td>
<td><?php echo $row["teacher_id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["dept"]; ?></td>
<td><?php echo $row["qualification"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td>
<a href="edit_teacher.php?id=<?php echo $row['id']; ?>">Edit</a> | 
<a href="delete_teacher.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php $sno++; } ?>
</table>
<br>
<a href="index.php">Back to Home</a>
</body>
</html>