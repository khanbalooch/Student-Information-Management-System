<?php
session_start();
echo $_SESSION['username'];
echo $_SESSION['password'];
echo $_SESSION['semester'];
echo $_SESSION['login'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>
    <div id = "login">
   		<h1 id = "logintitle">Student Form</h1>
        	<table width="300" height= "100" border="0">
  <tr>
    <td ><a id = "td" href="feeform.php">Fee Form</a></td>
    <td><a id = "td" href="marks.php">Marks</a></td>
    <td><a id = "td" href="courseregisstration.php">Courseregistration</a></td>
  </tr>
  <tr>
  <td><a id = "td" href="attendance.php">Attendance</a></td>
    <td><a id = "td" href="stu_passreset.php">Reset Password</a></td>
    <td><a id = "td" href="index.php">LogOut</a></td>
  </tr>
</table>

        </div>

        <div id = "footer">
        	<p id = "ftext">All rights reserved</p>
        </div>
 </div>
<body>
</body>
</html>