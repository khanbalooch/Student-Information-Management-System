


		<?php
		
		error_reporting(0);
		$username=$_POST['username'];
		$password=$_POST['password'];
		$semester=$_POST['selectget'];
		$login=$_POST['logintype'];
		
		echo $login;
		echo $semester;
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['semester']= $semester; // You can set the value however you like.	
		$_SESSION['login'] = $login;
		
		
		if($login=="student")
		{
			header('Location:student.php');
		}
		if($login=="employee")
		{
			header('Location:emp.php');
		}
		if($login=="hod")
		{
			header('Location:hod.php');
		}
		if($login=="instructor")
		{
			header('Location:instructor.php');
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LogIn</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Student Fee Form </h1>
  	</div>
    <div id = "login">
   		<h1 id = "logintitle">LogIn</h1>
        <form action="" method="post" name="form1">
        	<table style="width:200px; padding:10px">
            	<tr>
                	<td><select id = "logintype" name = "logintype">
  							<option value="student">Student</option>
  							<option value="employee">Employee</option>
							<option value="hod">HOD</option>
							<option value="instructor">Instructor</option>
							</select>
                     </td>
                     <td >
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php        
        
   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	$sql_select='select sem_name from semester';
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
echo '
           <select  id="dropdown" name="selectget" style="width:110px;">';	
           		while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
				{
  					echo'<option >'.$row['SEM_NAME'].'</option>';		
				}
				echo ' 	</select>';
?>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->                    
                     </td>
                   </tr>

                	<tr>
                    	<td><input type="text" name="username" placeholder="Username"/></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="password" placeholder="Password"/></td>
                    </tr>
                    <tr>
                    	<td>
                        	<button type="submit" onclick="validate()">Login</button> 
                            <button type="reset"->Cancel</button>
                        </td>
                    </tr>
                </table>     
                </form>
        </div>
        <div id = "footer">
        	<p id = "ftext">All rights reserved</p>
        </div>
 </div>
<body>
</body>
</html>

<script>
function validate()
{
	
	if(form1.username.value=='')
	{
		alert('Please enter username');
	}
	else if(form1.password.value=='')
	{
		alert('Please enter Password');
	}
	else
	{
		form1.submit();	
	}
}
</script>