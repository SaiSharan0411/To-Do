<html>
<head>
<title>Tasks</title>
<link rel="stylesheet" type="text/css" href="tasks.css">
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
echo '<br><form method="post"><br>';
echo '<div class="button-row"><a href="addtask.php"><input type="button" value="Add Task"></a>';
echo '<a href="status.php"><input type="button" value="Status"></a>';
echo '<a href="login.html"><input type="button" value="Log-Out"></a></div><br>';
echo '</form>';
echo '<p>Our project main page is where you can manage all your tasks easily. 
You can add new tasks, edit existing ones, or delete them if they are no longer needed. 
You can also view your tasks in different filters, such as by date, week, month, year or status. 
This will help you keep track of your progress and stay organized. 
My project main page is user-friendly and intuitive, so you can get started right away!</p>';
?>
</center></body>
</html>