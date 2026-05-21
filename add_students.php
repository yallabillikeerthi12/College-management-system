<?php
error_reporting(0);
include "db_connect.php";

if(isset($_POST["add"])){
$name=$_POST["name"];
$id=$_POST["id"];
$dept=$_POST["dept"];
$year=$_POST["year"];
$phno=$_POST["phno"];

$insert="INSERT INTO students (name,id,dept,year,phno) VALUES ('$name','$id','$dept','$year','$phno')";
mysqli_query($conn,$insert);

$sync="INSERT INTO attendance (student_id,student_name,dept,year,date,status) VALUES ('$id','$name','$dept','$year',CURDATE(),'Absent')";
mysqli_query($conn,$sync);

echo "<p style='color:green;'>Student added successfully!</p>";
}

$students=mysqli_query($conn,"SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Module</title>
</head>
<body>
<h2>Add Student</h2>
<form method="POST">
Name: <input type="text" name="name" required/><br><br>
ID: <input type="text" name="id" required/><br><br>
Department:
<select name="dept">
<option value="CME">CME</option>
<option value="ECE">ECE</option>
</select><br><br>
Year:
<select name="year">
<option value="2024-2027">1st Year</option>
<option value="2023-2026">2nd Year</option>
<option value="2022-2025">3rd Year</option>
</select><br><br>
Phone: <input type="text" name="phno"/><br><br>
<button type="submit" name="add">Add Student</button>
</form>

<h2>Student List</h2>
<table border="1">
<tr><th>SNo</th><th>Name</th><th>ID</th><th>Dept</th><th>Year</th><th>Phone</th><th>Delete</th></tr>
<?php
 $sno=1;
while($row=mysqli_fetch_assoc($students)){ ?>
<tr>
<td><?php echo $row["sno"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["dept"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><?php echo $row["phno"]; ?></td>
<td><a href="delete_student?id=<?php echo $row['sno']"onclick="return confirm('are you sure?')">delete</a></td>
</tr>
<?php 
$sno++;
}
 ?>
</table>
</body>
</html>