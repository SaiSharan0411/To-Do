<html>
<head>
<title>Incomplete Tasks</title>
<link rel="stylesheet" type="text/css" href="addtask.css">
</head>
<body><br><center>
<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
?>
<h1>Add Tasks to your To-Do List <?php echo $uname; ?></h1>
<?php
echo '<a href="tasks.php"><input type="button" value="Home"></a><br>';
echo '<br><form method="post"><br>';
echo '<br><div class="form-row"><div><input type="text" name="tname" placeholder="Task Name" required>';
echo '<input type="date" name="date" required>';
echo '<input type="time" name="time" required>';
echo '<input type="submit" value="Add Task"></div></div><br><br>';
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