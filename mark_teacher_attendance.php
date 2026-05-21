<?php
include "db_connect.php";
$attendance = mysqli_query($conn, "SELECT * FROM teacher_attendance ORDER BY date DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Attendance</title>
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
select,input{
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
.present{color:#28a745;font-weight:bold;}
.absent{color:red;font-weight:bold;}
</style>
</head>
<body>
<h2>Mark Teacher Attendance</h2>

Department:
<select id="dept">
    <option value="">--Select Department--</option>
    <option value="CME">CME</option>
    <option value="ECE">ECE</option>
</select><br>

Date: <input type="date" id="date" required/><br>
<button onclick="loadTeachers()">Load Teachers</button>

<div id="teacher_list"></div>

<h2>Attendance Records</h2>
<table>
<tr>
    <th>SNo</th>
    <th>Teacher ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Date</th>
    <th>Status</th>
</tr>
<?php
$sno = 1;
while($row = mysqli_fetch_assoc($attendance)){ ?>
<tr>
    <td><?php echo $sno; ?></td>
    <td><?php echo $row['teacher_id']; ?></td>
    <td><?php echo $row['teacher_name']; ?></td>
    <td><?php echo $row['dept']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td class="<?php echo strtolower($row['status']); ?>">
        <?php echo $row['status']; ?>
    </td>
</tr>
<?php $sno++; } ?>
</table>
<br>
<a href="index.php">Back to Home</a>

<script>
function loadTeachers(){
    var dept = document.getElementById("dept").value;
    var date = document.getElementById("date").value;
    if(dept == "" || date == ""){
        alert("Please select Department and Date!");
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_teachers_by_dept.php?dept=" + dept, true);
    xhr.onload = function(){
        document.getElementById("teacher_list").innerHTML = this.responseText;
        document.getElementById("date_val").value = date;
    };
    xhr.send();
}
</script>
</body>
</html>