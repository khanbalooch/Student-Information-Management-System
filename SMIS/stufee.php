<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Fee</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<body>



<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

	<div id = "content">
<?php        
        
   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	session_start();
	
	$sql_update="update fee_sub  set submitted_amount=".$_POST['subfee']." where stu_id='".$_POST['selectstuid']."' and  sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
		echo $sql_update;
		$query_id2 = oci_parse($con, $sql_update);
           $runupdate = oci_execute($query_id2);
	
	
	$sql_select="select distinct stu_id from stu_reg where sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	echo '<form  name="form0100" method="post" action="stufee.php">
	<table style="width:200px; padding:10px">
	
            	<tr>
				<td>Select Student</td>		
           <td><select  id="dropdown" name="selectstuid" style="width:110px;">';	
           		while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
				{
  					echo'<option >'.$row['STU_ID'].'</option>';		
				}
				echo ' 	</select>;
				           </td>;
		</tr>
		<tr>
		<td>Submitted fee</td>
		<td><input name="subfee" type="text" /></td>
		</tr>
		<tr>
  	  <td></td>
  	  <td><input name="Back" type="submit" value="Add Record" /></td>
  	</tr>
		</form>';
?>
    </div>

 </div>
</body>
</html>


