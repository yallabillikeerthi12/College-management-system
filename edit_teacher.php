<?php
error_reporting(0);
include "db_connect.php";

if(isset($_POST["update"])){
$id=$_POST["id"];
$teacher_id=$_POST["teacher_id"];
$name=$_POST["name"];
$dept=$_POST["dept"];
$qualification=$_POST["qualification"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$update="UPDATE teachers SET teacher_id='$teacher_id',name='$name',dept='$dept',qualification='$qualification',phone='$phone',email='$email' WHERE id='$id'";
mysqli_query($conn,$update);
echo "<script>window.location='add_teacher.php';</script>";
}

$id=$_GET["id"];
$result=mysqli_query($conn,"SELECT * FROM teachers WHERE id='$id'");
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Teacher</title>
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
a{color:#28a745;text-decoration:none;}
</style>
</head>
<body>
<h2>Edit Teacher</h2>
<form method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
Teacher ID: <input type="text" name="teacher_id" value="<?php echo $row['teacher_id']; ?>" required/><br>
Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required/><br>
Department:
<select name="dept">
<option value="CME" <?php if($row['dept']=='CME') echo 'selected'; ?>>CME</option>
<option value="ECE" <?php if($row['dept']=='ECE') echo 'selected'; ?>>ECE</option>
</select><br>
Qualification: <input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"/><br>
Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"/><br>
Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"/><br>
<button type="submit" name="update">Update Teacher</button>
</form>
<br>
<a href="add_teacher.php">Back to Teacher List</a>
</body>
</html>