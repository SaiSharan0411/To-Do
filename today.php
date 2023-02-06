<center><?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost","root","","todo");

// Get the current user's username
$uname = $_SESSION['uname'];

// Check if the form to mark task as complete has been submitted
if (isset($_POST['mark_complete'])) {
    // Get the task name
    $tname = $_POST['tname'];

    // Update the status of the task to "completed"
    $query = "UPDATE list SET status='completed' WHERE uname='$uname' AND tname='$tname'";
    mysqli_query($con, $query);
}

// Retrieve the to-do list for the current user
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND date='CURDATE()' AND status = 'incomplete'";
$result = mysqli_query($con, $query);

// Display the to-do list
echo '<table>';
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
            <input type="submit" name="mark_complete" value="Mark as Complete">
        </form>
    </td>';
    echo '</tr>';
}
echo '</table>';

?></center>