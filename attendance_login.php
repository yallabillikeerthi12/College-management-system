<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$pass=$_POST["password"];
if($pass=="attendance"){
$_SESSION["att_logged_in"]=true;
echo "<script>window.location.href='mark_attendance.php';</script>";
exit();
}else{
//$error="Wrong password!";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Attendance Login</title>
<style>
body
{
background:linear-gradient(right,#4facfe,#00f2fe);;
color:white;
font-family:arial,sans-serif;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
margin:0;
padding:0;
}
.box
{
background:white;
padding:30px;
border-radius:15px;
text-align:center;
width:400px;
box-shadow:0px 0px 20px rgba(0,0,0,0.3);
}
h2
{
font-size:28px;
color:white;
margin-bottom:20px;
}
input
{
padding:12px;
width:100%;
margin:10px 0;
border:none;
border-radius:8px;
font-size:16px;
box-sizing:border-box;
}
button
{
padding:12px 30px;
background:#007bff;
color:white;
border:none;
border-radius:25px;
font-size:16px;
cursor:pointer;
margin-top:10px;
width:100px;
}
button:hover
{
background-color:#0056b3;
}
.error
{
color:#ff6b6b;
font-size:14px;
}
a
{
color:#e94560;
font-size:14px;
}
</style>
</head>
<body>
<div class="box">
<h2>Attendance Login</h2>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
<input type="password" name="password" placeholder="Enter Password" required/><br>
<button type="submit">Login</button>
</form>
</div>
</body>
</html>