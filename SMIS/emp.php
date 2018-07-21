<?php
	error_reporting(0);
	session_start();
$emp_id  = $_SESSION['username']; 
$emp_password = $_SESSION['password'];

echo "$emp_id";
echo "$emp_password"; 
 


	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	$sql_select="select emp_id from employee where emp_id=".$emp_id."";
	echo "$sql_select";
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	if($runselectquery == 0 ){
		
		echo " query is not executed";
		
		}
		
	else {
		
		echo " query is executed";
		}
		
		
		$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
		while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, ins

		{
					if($row["EMP_ID"]==$emp_id){
						
						
					echo'You are successfully login to your account';
					
					echo "hello you sre in else part";
					
					
					}
					
					else{
						
					
						
					echo' <a href = "index.php" title = "login failed" ></a>';

						
						
						
					echo'<p>login failed password or user id is wrong</p>';
						
					}	
			
			
			
			
			
			}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>

<body>

<div id = "wraper">
	<div id = "head">
    	
        
         
    	<h1 id = "title"> Employee Form </h1>
        
        
       
        
        
  	</div>
    <div id = "login">
   		<h1 id = "logintitle">emp Form</h1>

	<table width="300" height= "100" border="0">
  <tr>
    <td ><a id = "td" href="addcourse(1).php">Add Courses</a></td>
    <td ><a id = "td" href="stufee.php">Student Fee</a></td>
    <td><a id = "td" href="emp_passreset.php">Reset Password</a></td>
    <td><a id = "td" href="regstudent.php">Register student</a></td>

  </tr>
  <tr>
  	<td><a id = "td" href="script.php">Issue Marksheet</a></td>
    <td><a id = "td" href="index.php">LogOut</a></td>
    <td><a id = "td" href="index.php"> <?php 

?></a></td>
  </tr>
</table>

        </div>
        <div id = "footer">
        	<p id = "ftext">All rights reserved</p>
        </div>
 

 
 
 
 </div>
 
 
 
 
 
 
 
 
 
 
 
</body>
</html>