<?php
session_start();
if(!isset($_SESSION["teacher_logged_in"])){
    header("Location: teacher_login.php");
    exit();
}
include "db_connect.php";

$teacher_id = $_SESSION["teacher_id"];
$result = mysqli_query($conn, "SELECT * FROM teachers WHERE teacher_id='$teacher_id'");
$teacher = mysqli_fetch_assoc($result);

$attendance = mysqli_query($conn, "SELECT * FROM teacher_attendance WHERE teacher_id='$teacher_id' ORDER BY date DESC");
$subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE teacher_id='$teacher_id'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Dashboard</title>
<style>
body{
    background:#f2f2f2;
    color:white;
    font-family:Arial;
    text-align:center;
    padding:30px;
    min-height:100vh;
    margin:0;
    box-sizing:border-box;
}
h2{font-size:35px;color:white;}
h3{font-size:25px;color:#28a745;}
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
.info-box{
    background:#16405c;
    padding:20px;
    border-radius:10px;
    width:50%;
    margin:20px auto;
    text-align:left;
}
.info-box p{font-size:16px;margin:8px 0;}
a{color:#28a745;text-decoration:none;}
button{
    padding:10px 25px;
    background:red;
    color:white;
    border:none;
    border-radius:25px;
    font-size:16px;
    cursor:pointer;
    margin-top:10px;
}
button:hover{background:#cc0000;}
.present{color:#28a745;font-weight:bold;}
.absent{color:red;font-weight:bold;}
</style>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION["teacher_name"]; ?>!</h2>

<div class="info-box">
    <p><strong>Teacher ID:</strong> <?php echo $teacher["teacher_id"]; ?></p>
    <p><strong>Name:</strong> <?php echo $teacher["name"]; ?></p>
    <p><strong>Department:</strong> <?php echo $teacher["dept"]; ?></p>
    <p><strong>Qualification:</strong> <?php echo $teacher["qualification"]; ?></p>
    <p><strong>Phone:</strong> <?php echo $teacher["phone"]; ?></p>
    <p><strong>Email:</strong> <?php echo $teacher["email"]; ?></p>
</div>

<h3>My Subjects</h3>
<table>
<tr>
    <th>SNo</th>
    <th>Subject</th>
    <th>Year</th>
    <th>Department</th>
</tr>
<?php $sno=1; while($row = mysqli_fetch_assoc($subjects)){ ?>
<tr>
    <td><?php echo $sno; ?></td>
    <td><?php echo $row["subject_name"]; ?></td>
    <td><?php echo $row["year"]; ?></td>
    <td><?php echo $row["dept"]; ?></td>
</tr>
<?php $sno++; } ?>
</table>

<h3>My Attendance</h3>
<table>
<tr>
    <th>SNo</th>
    <th>Date</th>
    <th>Status</th>
</tr>
<?php $sno=1; while($row = mysqli_fetch_assoc($attendance)){ ?>
<tr>
    <td><?php echo $sno; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td class="<?php echo strtolower($row["status"]); ?>">
        <?php echo $row["status"]; ?>
    </td>
</tr>
<?php $sno++; } ?>
</table>

<form method="POST" action="teacher_logout.php">
    <button type="submit">Logout</button>
</form>
</body>
</html>