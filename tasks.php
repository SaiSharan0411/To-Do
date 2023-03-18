<html>
<head>
<link rel="stylesheet" type="text/css" href="tas.css">
</head>
<body><br><center>
<?php
session_start();
$con = mysqli_connect("localhost","root","","todo");
$uname = $_SESSION['uname'];
?>
<h1>Welcome to your To-Do List <?php echo $uname; ?></h1><br>
<?php
echo '<h2>Tasks Operations</h2>';
echo '<form method="post"><br>';
echo '<div class="button-row"><a href="addtask.php"><input type="button" value="Add Task"></a>';
echo '<a href="view.php"><input type="button" value="View"></a>';
echo '<a href="status.php"><input type="button" value="Status"></a>';
echo '<a href="login.html"><input type="button" value="Log-Out"></a></div><br>';
echo '</form><br>';
echo '<h2>About Tasks</h2>';
echo '<p>Our project main page is where you can manage all your tasks easily. 
You can add new tasks, edit existing ones, or delete them if they are no longer needed. 
You can also view your tasks in different filters, such as by date, week, month, year or status. 
This will help you keep track of your progress and stay organized. 
My project main page is user-friendly and intuitive, so you can get started right away!</p>';
$_SESSION['selected_item'] = isset($_GET['selected_item']) ? $_GET['selected_item'] : '';
?>
</center></body>
</html>