<html>
<head>
<title>Tasks</title>
<link rel="stylesheet" type="text/css" href="page.css">
</head>
<body><br>
<center><?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
if (isset($_POST['mark_incomplete'])) {
$tname = $_POST['tname'];
$query = "UPDATE list SET status='incomplete' WHERE uname='$uname' AND tname='$tname'";
mysqli_query($con, $query);
}
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND status = 'completed' ORDER BY date, time";
$result = mysqli_query($con, $query);
echo '<table>';
echo '<tr><th><br>Task</th><th><br>Date</th><th><br>Time</th><th><br>Status</th><th><br>Action</th></tr>';
while ($task = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $task['tname'] . '</td>';
echo '<td>' . $task['date'] . '</td>';
echo '<td>' . $task['time'] . '</td>';
echo '<td>' . $task['status'] . '</td>';
echo '<td>
<form action="" method="post">
<input type="hidden" name="tname" value="' . $task['tname'] . '">
<input type="submit" name="incomplete" value="Incomplete">
</form>
</td>';
echo '</tr>';
}
echo '<br><form method="post">';
echo '<a href="tasks.php"><input type="button" value="Home"></a>';
echo '<a href="incomplete.php"><input type="button" value="In-Complete"></a>';
echo '<a href="today.php"><input type="button" value="Day"></a>';
echo '<a href="month.php"><input type="button" value="Month"></a><br><br>';
echo '</form>';
echo '</table>';
?></center>