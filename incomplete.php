<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost","root","","todo");

// Get the current user's username
$uname = $_SESSION['uname'];

// Retrieve the to-do list for the current user
$query = "SELECT tname, date, time, status FROM list WHERE uname = '$uname' AND status = 'incomplete' ORDER BY date, time";
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

?>