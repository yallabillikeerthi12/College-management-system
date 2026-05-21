<?php
session_start();
if(isset($_SESSION["teacher_logged_in"])){
    header("Location: teacher_dashboard.php");
    exit();
}
include "db_connect.php";

$error = "";
if(isset($_POST["login"])){
    $teacher_id = $_POST["teacher_id"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM teachers WHERE teacher_id='$teacher_id'");
    $row = mysqli_fetch_assoc($result);

if($row){
    if(trim($password)== trim($row["password"])){

        $_SESSION["teacher_logged_in"] = true;
        $_SESSION["teacher_id"] = $row["teacher_id"];
        $_SESSION["teacher_name"] = $row["name"];
        $_SESSION["teacher_dept"] = $row["dept"];
        header("Location: teacher_dashboard.php");
        exit();
    } else {
        $error = "Password wrong";
    }
} else {
    $error = "Teacher ID not found";
}
    if($row && $password == $row["password"]){
        $_SESSION["teacher_logged_in"] = true;
        $_SESSION["teacher_id"] = $row["teacher_id"];
        $_SESSION["teacher_name"] = $row["name"];
        $_SESSION["teacher_dept"] = $row["dept"];
        header("Location: teacher_dashboard.php");
        exit();
    } else {
        $error = "Invalid Teacher ID or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher Login</title>
<style>
body{
    background:linear-gradient(to right,#4facfe,#00f2fe);
    color:white;
    font-family:Arial;
    text-align:center;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:80px 30px;
    min-height:100vh;
    margin:0;
    box-sizing:border-box;
}
h2{font-size:35px;color:#333;}
input{
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
button:hover{background:#0056b3;}
.error{color:red;font-size:16px;}
</style>
</head>
<body>
<h2>Teacher Login</h2>
<?php if($error != ""){ echo "<p class='error'>$error</p>"; } ?>
<form method="POST">
Teacher ID: <input type="text" name="teacher_id" required/><br>
Password: <input type="password" name="password" required/><br>
<button type="submit" name="login">Login</button>
</form>
</body>
</html>