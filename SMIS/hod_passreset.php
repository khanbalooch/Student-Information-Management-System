<?php

error_reporting(0);
session_start();
$user_id = $_SESSION['username'];
$old_pass = $_POST["old_pass"];
$new_pass = $_POST["new_pass"];
$new_pass1 = $_POST["new_pass1"];
$validate = 0;

echo "$old_pass";



echo "$user_id";

	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID 	= irshad) ) )"; 
   $db_user = "system"; 
   $db_pass = "786786allahtala";
   $con = oci_connect($db_user,$db_pass,$db_sid);

	$_select = "select es.passwd,e.emp_name 
				from emp_users es, employee e 
				where es.passwd = '".$old_pass."' 
				and es.usr_id = e.emp_id
				and e.emp_id = ".$user_id."";
				
	echo '<br/>';			
				
				 
	echo "$_select";			
   
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   if($runselectquery == 0 ){
		
		echo " query is not executed";
		
		}
		
	else {
		
		echo " query is executed";
		}
   
   
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			
        	echo $row["PASSWD"];
			echo $row["EMP_NAME"];
			
			$validate = 1;
			
			}
			
			if($validate = 1 and $new_pass = $new_pass1){
				
				
				
				
				$_select = "update emp_users
				set passwd = '".$new_pass1."'
				WHERE usr_id = ".$user_id.""; 
				
	echo '<br/>';			
	echo "$_select";			
   
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   if($runselectquery == 0 ){
	  echo " query is not executed";
				
				
		}
		
	else {
		
		echo " query is executed";
		}
       $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
			echo"<br/>";
			echo"your password has been updated";	
				
			}
			else{
				
				echo"Either Your old password is wrong ";
				echo"<br/>";
				echo"Or Please give both password same";
				
				}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Reset</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

	<div id = "content">
   	        	<form id = "form" action="ins_passreset.php" method="post" name="form1">
            	<table style="width:200px; padding:10px">
                	<tr>
                    	<td><input type="password" name="old_pass" placeholder="Existing Password"/></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="new_pass" placeholder="New Password"/></td>
                    </tr>
                    <tr>
                    	<td><input type="password" name="new_pass1" placeholder="Enter New Password Again"/></td>
                    </tr>

                    <tr>
                    	<td>
                        	<button type="submit" onclick="validate()">Regisrter</button> 
                            <button type="reset">Cancel</button>
                        </td>
                    </tr>
                </table>
            </form>

    <form action="hod.php" method="post" name="form15" >

<input type="submit" name ="Back" value="Back" >

</form>
    
    </div>
    
    
    
    
    
    

 </div>
<body>
</body>
</html>


<script>
function validate()
{
	
	if(form1.emp_id.value=='')
	{
		alert('Please enter id');
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
</script><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>