<?php
session_start();

//Connect to the database
$con = mysqli_connect("localhost","root","","todo");

//Check the connection
if(mysqli_connect_errno()) 
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

//Check if the form is submitted
if(isset($_POST['uname']) && isset($_POST['password'])) 
    {
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
   
 //Select the user from the database
 $query = "SELECT * FROM user WHERE uname='$uname' AND password='$password'";
 $result = mysqli_query($con, $query);    //Check if the user exists
 
   if(mysqli_num_rows($result) == 1) 
      {
      $row = mysqli_fetch_array($result);
      $_SESSION['uname'] = $row['uname'];
      header("Location: tasks.php");
      } 
      else
      {header("Location: register.html");}
    }
?>