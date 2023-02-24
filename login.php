<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
if(mysqli_connect_errno()) 
echo "Failed to connect to MySQL: " . mysqli_connect_error();
if(isset($_POST['uname']) && isset($_POST['password'])) 
{
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$query = "SELECT * FROM user WHERE uname='$uname' AND password='$password'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) == 1) 
{
$row = mysqli_fetch_assoc($result);
$_SESSION['uname'] = $row['uname'];
header("Location: tasks.php");
} 
else
{header("Location: register.html");}
}
?>