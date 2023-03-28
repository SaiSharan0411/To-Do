<html>
<head>
<link rel="stylesheet" type="text/css" href="addtask.css">
</head>
<body><br><center>
<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
?>
<h1>Edit Tasks in your To-Do List <?php echo $uname; ?></h1>
<?php
echo '<a href="tasks.php"><input type="button" value="Home"></a><br>';
echo '<br><form method="post">';
echo '<br><div class="form-row"><div>';
$query = "SELECT tname FROM list WHERE uname='$uname'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
echo '<select name="task_name">';
while ($row = mysqli_fetch_assoc($result)) {
echo '<option value="' . $row['tname'] . '">' . $row['tname'] . '</option>';
}
echo '</select>';
}
echo '<input type="text" name="new_task_name" placeholder="New Task Name">';
echo '<input type="date" name="date" required>';
echo '<input type="time" name="time" required>';
echo '<input type="submit" value="Edit Task"></div></div><br>';
echo '</form>';
if (!empty($_POST['task_name'])) {
$task_name = $_POST['task_name'];
} else if (!empty($_POST['new_task_name'])) {
$new_task_name = $_POST['new_task_name'];
}
if (!empty($task_name)) {
if (!empty($_POST['new_task_name'])) {
$new_task_name = $_POST['new_task_name'];
$date = $_POST['date'];
$time = $_POST['time'];
$query = "UPDATE list SET date='$date', time='$time', tname='$new_task_name' WHERE tname='$task_name' AND uname='$uname'";
mysqli_query($con, $query);
}
else {
$date = $_POST['date'];
$time = $_POST['time'];
$query = "UPDATE list SET date='$date', time='$time' WHERE tname='$task_name' AND uname='$uname'";
mysqli_query($con, $query);
}
}
?>
</center></body>
</html>