<html>
<head>
<title>Tasks</title>
<link rel="stylesheet" type="text/css" href="taskspage.css">
</head>
<body><br><center>
<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
?>
<h1>Welcome to your To-Do List <?php echo $uname; ?></h1>
<?php
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' ORDER BY date, time";
$result = mysqli_query($con, $query);
echo '<br><form method="post">';
echo '<br><div class="form-row"><div><input type="text" name="tname" placeholder="Task Name">';
echo '<input type="date" name="date">';
echo '<input type="time" name="time">';
echo '<input type="submit" value="Add Task"></div></div><br>';
echo '<div class="button-row"><a href="incomplete.php"><input type="button" value="In-Complete"></a>';
echo '<a href="today.php"><input type="button" value="Day"></a>';
echo '<a href="month.php"><input type="button" value="Month"></a>';
echo '<a href="complete.php"><input type="button" value="Completed"></a></div><br><br><br>';
echo '</form>';
if (!empty($_POST['tname'])) {
$tname = $_POST['tname'];
$date = $_POST['date'];
$time = $_POST['time'];
$query = "INSERT INTO list (uname, tname, date, time) VALUES ('$uname', '$tname', '$date', '$time')";
mysqli_query($con, $query);
}
?>
</center></body>
</html>
