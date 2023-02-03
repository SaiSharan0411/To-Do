<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost","root","","todo");

// Get the current user's username
$uname = $_SESSION['uname'];

// Retrieve the to-do list for the current user
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' ORDER BY date, time";
$result = mysqli_query($con, $query);

// Display the to-do list
echo '<table>';
echo '<tr><th>Task</th><th>Date</th><th>Time</th><th>Status</th></tr>';
while ($task = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $task['tname'] . '</td>';
    echo '<td>' . $task['date'] . '</td>';
    echo '<td>' . $task['time'] . '</td>';
    echo '<td>' . $task['status'] . '</td>';
    echo '</tr>';
}
echo '</table>';

// Display the form for creating new tasks
echo '<form method="post">';
echo '<input type="text" name="tname" placeholder="Task Name">';
echo '<input type="date" name="date">';
echo '<input type="time" name="time">';
echo '<input type="submit" value="Add Task">';
echo '<a href="incomplete.php"><input type="button" value="Go to In-Complete Tasks Page"></a>';
echo '</form>';

// Handle the form submission for creating new tasks
if (!empty($_POST['tname'])) {
    $tname = $_POST['tname'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert the new task into the database
    $query = "INSERT INTO list (uname, tname, date, time) VALUES ('$uname', '$tname', '$date', '$time')";
    mysqli_query($con, $query);
}

?>