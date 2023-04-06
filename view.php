<html>
<head>
<link rel="stylesheet" type="text/css" href="view.css">
</head>
<body>
<center><br>
<?php
session_start();
$con = mysqli_connect("localhost","root","","to-do");
$uname = $_SESSION['uname'];
$view = isset($_POST['view']) ? $_POST['view'] : $_SESSION['selected_item'];
$_SESSION['selected_item'] = $view;
?>
<h1>Your Tasks View <?php echo $uname; ?></h1>
<form method="post">
<div class="view-row">
<select name="view">
<option value="today"<?php if ($view == "today") {echo " selected";}?>>Today</option>
<option value="week"<?php if ($view == "week") {echo " selected";}?>>Week</option>
<option value="month"<?php if ($view == "month") {echo " selected";}?>>Month</option>
<option value="year"<?php if ($view == "year") {echo " selected";}?>>Year</option>
</select>
<input type="submit" value="View">
<a href="tasks.php"><input type="button" value="Home"></a>
</div>
</form>
<br>
<?php
if(isset($_POST['view'])) {
$option = $_POST['view'];
switch($option) {
case 'today':
$query = "SELECT * FROM list WHERE uname='$uname' AND date = CURDATE()";
break;
case 'week':
$query = "SELECT * FROM list WHERE uname='$uname' AND WEEK(date) = WEEK(CURDATE())";
break;
case 'month':
$query = "SELECT * FROM list WHERE uname='$uname' AND MONTH(date) = MONTH(CURDATE())";
break;
case 'year':
$query = "SELECT * FROM list WHERE uname='$uname' AND YEAR(date) = YEAR(CURDATE())";
break;
}
$result = mysqli_query($con, $query);
echo '<table><tr><th>Task</th><th>Date</th><th>Time</th><th>Status</th><th>Action</th></tr>';
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
if (isset($_POST['completed'])) {
$tname = $_POST['tname'];
$query = "UPDATE list SET status='completed' WHERE uname='$uname' AND tname='$tname'";
mysqli_query($con, $query);
}
echo '</table>';
}
?></center>
</body>
</html>
