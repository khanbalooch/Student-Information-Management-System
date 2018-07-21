<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div id = "head">
    	<h1 id = "title"> ATTENDANCE FORM</h1>
  	</div>
    <?php
	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	session_start();
	 echo '<td><input name="Sund" tudentftype="text" value='.$_SESSION['semester'].' disabled> 
		  <td><input name="Sund" tudentftype="text" value='.$_SESSION['username'].' disabled></td></br>';
	$sql_select="select course_id from stu_reg where stu_id='".$_SESSION['username']."' and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			 while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			$courseid=$row['COURSE_ID'];
			echo '<td><input name="Sund" tudentftype="text" value='.$courseid.' disabled></td>';
			$sql_select1="select course_id,SEM_ID,SEC_NAME,STU_ID,TOTAL_PRESENTS,total_absents,total_percentage from stu_attendance where course_id='".$courseid."' and stu_id='".$_SESSION['username']."' and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
			//echo $sql_select;
			$query_id2 = oci_parse($con, $sql_select1);
        	$runselect1 = oci_execute($query_id2);
        	$rs_arr1 = oci_fetch($query_id2, OCI_BOTH+OCI_RETURN_NULLS);
			echo '<table width="200" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">COURSE&nbsp;</th>
    <th scope="col">SEMESTER&nbsp;</th>
    <th scope="col">SECTION&nbsp;</th>
    <th scope="col">STUDENT&nbsp;</th>
    <th scope="col">PRESENTS&nbsp;</th>
	<th scope="col">ABSENTS&nbsp;</th>
    <th scope="col">PERCENTAGE&nbsp;</th>
	</tr>';  
			while($row2 = oci_fetch_array($query_id2, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			echo '<tr>
		<td scope="col">'.$row2['COURSE_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['SEM_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['SEC_NAME'].'&nbsp;</td>
		<td scope="col">'.$row2['STU_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['TOTAL_PRESENTS'].'&nbsp;</td>
		<td scope="col">'.$row2['TOTAL_ABSENTS'].'&nbsp;</td>
		<td scope="col">'.$row2['TOTAL_PERCENTAGE'].'&nbsp;</td>
		</tr>';
		  }	
			
		  }
	?>

 

</body>
</html>