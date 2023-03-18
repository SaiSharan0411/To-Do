<html>
<head>
<link rel="stylesheet" type="text/css" href="statu.css">
</head>
<body><center><br>
<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
?>
<h1>Your Tasks Status <?php echo $uname; ?></h1>
<?php
echo '<a href="tasks.php"><input type="button" value="Home"></a>';
?>
<?php
if (isset($_POST['completed'])) {
$tname = $_POST['tname'];
$query = "UPDATE list SET status='completed' WHERE uname='$uname' AND tname='$tname'";
mysqli_query($con, $query);
}
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND status = 'incomplete' ORDER BY date, time";
$result = mysqli_query($con, $query);
echo '<table class="form-left">';
echo '<h2 class="hl">In-Complete Tasks</h2>';
echo '<tr><th>Task</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>';
while ($task = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $task['tname'] . '</td>';
echo '<td>' . $task['date'] . '</td>';
echo '<td>' . $task['time'] . '</td>';
echo '<td>' . $task['status'] . '</td>';
echo '<td>
<form action="" method="post">
<input type="hidden" name="tname" value="' . $task['tname'] . '">
<input type="submit" name="completed" value="Complete">
</form>
</td>';
echo '</tr>';
}
echo '</table>';
if (isset($_POST['incompleted'])) {
$tname = $_POST['tname'];
$query = "UPDATE list SET status='incomplete' WHERE uname='$uname' AND tname='$tname'";
mysqli_query($con, $query);
header("Location: status.php");
}
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND status = 'completed' ORDER BY date, time";
$result = mysqli_query($con, $query);
echo '<table class="form-right">';
echo '<h2 class="h2">Completed Tasks</h2>';
echo '<tr><th>Task</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>';
while ($task = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $task['tname'] . '</td>';
echo '<td>' . $task['date'] . '</td>';
echo '<td>' . $task['time'] . '</td>';
echo '<td>' . $task['status'] . '</td>';
echo '<td>
<form action="" method="post">
<input type="hidden" name="tname" value="' . $task['tname'] . '">
<input type="submit" name="incompleted" value="Incomplete">
</form>
</td>';
echo '</tr>';
}
echo '</table>';
?></center>
</body>
</html>