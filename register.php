<?php
  //Connect to the database
  $con = mysqli_connect("localhost","root","","todo");
  if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //Check if the form is submitted
  if(isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    //Check if the username already exists
    $check_query = "SELECT * FROM user WHERE uname = '$uname'";
    $check_result = mysqli_query($con, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
      echo '<script type="text/javascript">
       window.onload = function () { alert("Username already exists"); } 
       </script>'; 
      exit();
    }
    //Insert the user into the database
    $query = "INSERT INTO user (uname, password) VALUES ('$uname', '$password')";
    $result = mysqli_query($con, $query);

    //Check if the user is inserted
    if($result) {
      header("Location: tasks.php");
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
?>