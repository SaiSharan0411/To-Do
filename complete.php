<center><?php
session_start();
// Connect to the database
$con = mysqli_connect("localhost","root","","todo");

// Get the current user's username
$uname = $_SESSION['uname'];

// Check if the form to mark task as incomplete has been submitted
if (isset($_POST['mark_incomplete'])) {

// Get the task name
$tname = $_POST['tname'];

// Update the status of the task to "incomplete"
$query = "UPDATE list SET status='incomplete' WHERE uname='$uname' AND tname='$tname'";
mysqli_query($con, $query);
}

// Retrieve the to-do list for the current user
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND status = 'completed' ORDER BY date, time";
$result = mysqli_query($con, $query);

// Display the to-do list
echo '<table>';
echo '<tr><th><br>Task</th><th><br>Date</th><th><br>Time</th><th><br>Status</th><th><br>Action</th></tr>';
while ($task = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $task['tname'] . '</td>';
echo '<td>' . $task['date'] . '</td>';
echo '<td>' . $task['time'] . '</td>';
echo '<td>' . $task['status'] . '</td>';
echo '<td>
<form action="" method="post">;
<input type="hidden" name="tname" value="' . $task['tname'] . '">
<input type="submit" name="mark_incomplete" value="Mark as Incomplete">
</form>;
</td>';
echo '</tr>';
}
echo '<br><form method="post">';
echo '<a href="tasks.php"><input type="button" value="Go to Tasks List"></a>';
echo '<a href="incomplete.php"><input type="button" value="Go to In-Complete Tasks List"></a>';
echo '<a href="today.php"><input type="button" value="Go to This Day Task List"></a>';
echo '<a href="month.php"><input type="button" value="Go to This Month Task List"></a>';
echo '</form>';
echo '</table>';

?></center>