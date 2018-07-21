<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Instructor</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<body>
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
</script>
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
 	$sql_insert="insert into employee(emp_id,emp_name,SAL,MGRID,emp_type,address,phno,emp_CNICno,emp_email)
                            values ( '$_POST[emp_id]', '$_POST[emp_name]','$_POST[sal]', '$_POST[mgr_id]', 
                            '$_POST[emp_type]' , '$_POST[address]','$_POST[ph_no]', '$_POST[cnic]', '$_POST[emp_email]')";
	$query_id = oci_parse($con, $sql_insert);
           $run = oci_execute($query_id);
		}
?>







<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

	<div id = "content">
            	<form id = "form" action="reginstructor.php" method="post" name="form1">
            	<table style="width:200px; padding:10px">
                	<tr>
                    	<td><input type="text" name="emp_id" placeholder="Emp_id"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="emp_name" placeholder="Employee Name"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="sal" placeholder="Salery"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="mgr_id" placeholder="Manager ID"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="emp_type" placeholder="Employee Type"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="address" placeholder="Address"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="ph_no" placeholder="Phone"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="cnic" placeholder="CNIC"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="emp_email" placeholder="Email"/></td>
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
</body>
</html>


