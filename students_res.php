<?php

$con = new mysqli("localhost", "root", "", "college_management");

if($con->connect_error)
{
    die("Connection Failed : " . $con->connect_error);
}

$result = null;

if(isset($_POST['search'])) 
{
    $pin = $_POST['pin'];
    $semester = $_POST['semester'];

    $stmt = $con->prepare("
        SELECT * FROM result
        WHERE pin=? AND semester=?
    ");

    $stmt->bind_param("ss", $pin, $semester);

    $stmt->execute();

    $result = $stmt->get_result();
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Marksheet</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(135deg,#0d47a1,#42a5f5);
    padding:30px;
}

.container{
    max-width:950px;
    margin:auto;
}

.search-box{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0px 5px 20px rgba(0,0,0,0.3);
    margin-bottom:25px;
    text-align:center;
}

h1{
    text-align:center;
    color:#0d47a1;
    margin-bottom:25px;
}

input,select{
    padding:14px;
    margin:8px;
    width:250px;
    font-size:16px;
    border:2px solid #90caf9;
    border-radius:8px;
    outline:none;
}

button{
    background:linear-gradient(to right,#1565c0,#1e88e5);
    color:white;
    border:none;
    padding:14px 25px;
    font-size:17px;
    border-radius:8px;
    cursor:pointer;
}

button:hover{
    transform:scale(1.03);
}

.marksheet{
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0px 5px 20px rgba(0,0,0,0.3);
}

.title{
    text-align:center;
    font-size:34px;
    color:#1565c0;
    margin-bottom:25px;
    font-weight:bold;
}

.details{
    width:100%;
    margin-bottom:25px;
}

.details td{
    padding:10px;
    font-size:17px;
}

.subject-table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

.subject-table th{
    background:#1565c0;
    color:white;
    padding:15px;
    font-size:17px;
}

.subject-table td{
    border:1px solid #ddd;
    padding:14px;
    text-align:center;
    font-size:16px;
}

.total-box{
    margin-top:25px;
    font-size:18px;
    line-height:35px;
}

.pass{
    color:green;
    font-weight:bold;
}

.fail{
    color:red;
    font-weight:bold;
}

.print-btn{
    margin-top:30px;
    text-align:center;
}

.print-btn button{
    background:linear-gradient(to right,#2e7d32,#43a047);
}

@media print
{
    body{
        background:white;
        padding:0;
    }

    .search-box{
        display:none;
    }

    .print-btn{
        display:none;
    }

    .marksheet{
        box-shadow:none;
        border:none;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="search-box">

<h1>Check Your Result</h1>

<form method="POST">

<input type="text"
name="pin"
placeholder="Enter Student PIN"
required>

<select name="semester" required>

<option value="">Select Semester</option>

<option value="1st Year">
1st Year
</option>

<option value="2nd Year - 3rd Sem">
2nd Year - 3rd Sem
</option>

<option value="2nd Year - 4th Sem">
2nd Year - 4th Sem
</option>

<option value="3rd Year - 5th Sem">
3rd Year - 5th Sem
</option>

<option value="3rd Year - 6th Sem">
3rd Year - 6th Sem
</option>

</select>

<button type="submit" name="search">
Search
</button>

</form>

</div>

<?php

if($result && $result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {

?>

<div class="marksheet">

<div class="title">
STUDENT MARKSHEET
</div>

<table class="details">

<tr>
<td><b>Name :</b> <?php echo $row['student_name']; ?></td>
<td><b>PIN No :</b> <?php echo $row['pin']; ?></td>
</tr>

<tr>
<td><b>Branch :</b> <?php echo $row['branch']; ?></td>
<td><b>Year :</b> <?php echo $row['year']; ?></td>
</tr>

<tr>
<td><b>Semester :</b> <?php echo $row['semester']; ?></td>

<td>
<b>Status :</b>

<span class="<?php echo strtolower($row['result']); ?>">

<?php echo $row['result']; ?>

</span>

</td>
</tr>

</table>

<table class="subject-table">

<tr>

<th>Subject Name</th>

<th>Marks</th>

</tr>

<tr>
<td><?php echo $row['sub1_name']; ?></td>
<td><?php echo $row['sub1']; ?></td>
</tr>

<tr>
<td><?php echo $row['sub2_name']; ?></td>
<td><?php echo $row['sub2']; ?></td>
</tr>

<tr>
<td><?php echo $row['sub3_name']; ?></td>
<td><?php echo $row['sub3']; ?></td>
</tr>

<tr>
<td><?php echo $row['sub4_name']; ?></td>
<td><?php echo $row['sub4']; ?></td>
</tr>

<tr>
<td><?php echo $row['sub5_name']; ?></td>
<td><?php echo $row['sub5']; ?></td>
</tr>

</table>

<div class="total-box">

<b>Total Marks :</b>

<?php echo $row['total']; ?>

<br>

<b>Percentage :</b>

<?php echo round($row['percentage'],1); ?>%

<br>

<b>Grade :</b>

<?php echo $row['grade']; ?>

<br>

<b>Final Result :</b>

<span class="<?php echo strtolower($row['result']); ?>">

<?php echo $row['result']; ?>

</span>

</div>

<div class="print-btn">

<button onclick="window.print()">
Print Marksheet
</button>

</div>

</div>

<?php

    }
}
elseif(isset($_POST['search']))
{
    echo "
    <div class='marksheet'>

    <h2 style='color:red;text-align:center;'>

    No Result Found

    </h2>

    </div>
    ";
}

?>

</div>

</body>

</html>