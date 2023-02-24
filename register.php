<?php
$con = mysqli_connect("localhost","root","","todo");
if(mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['uname']) && isset($_POST['password'])) {
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$check_query = "SELECT * FROM user WHERE uname = '$uname'";
$check_result = mysqli_query($con, $check_query);
if(mysqli_num_rows($check_result) > 0) {
echo '<script type="text/javascript">
alert("Username already exists");
window.location = "register.html";
</script>';
exit();
header("Location: register.html");
}
$query = "INSERT INTO user (uname, password) VALUES ('$uname', '$password')";
$result = mysqli_query($con, $query);
if($result) {
header("Location: login.html");
} else {
echo "Error: " . mysqli_error($con);
}
}
?>