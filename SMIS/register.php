<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script language="javascript" type="text/javascript">
function forAdd()
{
    //document.form1.flag.value = fflag;
    document.form10.submit();
}


</script>

<form  name="form10" method="Post" action="Register.php">
 <p>Enter User&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <input type="text" id="user"name ="user"<?php echo $user ?> /></p>
 <p>Enter Password
 <input type="text" id="pass" name="pass"/></p>
 <input type="submit" id="register" name="submit" value="register"onclick="foradd()"/>
 </form>
 <?php
 	if($_POST['submit'] == 'register')
		{
 		$user=$_POST[user];
		$pass=$_POST["pass"];
		echo $user ,"\n";
		echo $pass ,"\n";
		echo "khan";
		}
 ?>
</body>
</html>