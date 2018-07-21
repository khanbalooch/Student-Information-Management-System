<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fee Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title">Register Student </h1>
  	</div>

  <div id = "content">
    
<?php

$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim"; 
  
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); } 

      

	if($_POST['submit'] == 'register')
		{
 	$sql_insert="insert into student(stu_id,stu_name,stu_Father_name,stu_address,stu_phone_no,stu_mail,stu_cnic)
                            values ( '$_POST[stu_id]', '$_POST[stu_name]','$_POST[father]', '$_POST[address]', 
                            $_POST[phoneno] , '$_POST[mail]',$_POST[cnic])";
							echo $sql_insert;
	$query_id = oci_parse($con, $sql_insert);
           $run = oci_execute($query_id);
		}
?>    
    
<form id = "form" action="regstudent.php" method="post" name="form1">
            	<table style="width:200px; padding:10px">
                	<tr>
                    	<td><input type="text" name="stu_id" placeholder="Stu_id"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="stu_name" placeholder="Student Name"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="father" placeholder="Father name"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="address" placeholder="Address"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="phoneno" placeholder="Phone number"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="mail" placeholder="Mail"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="cnic" placeholder="CNIC"/></td>
                    </tr>
                    <tr>
                    	<td>
                        	<button type="submit"id="register" name="submit" value="register" onclick="validate()">Regisrter</button> 
                            <button type="reset">Cancel</button>
                        </td>
                    </tr>
                </table>
            </form>



  </div>

</div>
<body>

</body>
</html>