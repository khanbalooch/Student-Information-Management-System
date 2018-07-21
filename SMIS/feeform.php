<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fee Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	session_start();
	$student_id=$_SESSION['username'];
	$sql_select="select sum(course_crdhrs) sumcrd from course where course_id in(select course_id from stu_reg where stu_id='".$student_id."'and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."'))";
	echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
						$val=$row["SUMCRD"]; 
						echo $val; 
		  }
		  $val=($val * 6500);
		  $sql_select="select stu_fun_fee,stu_sport_fee from semester where sem_name='".$_SESSION['semester']."'";
	echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
						$val2=$row["STU_FUN_FEE"];
						echo $val2;  
						$val3=$row["STU_SPORT_FEE"];
						echo $val3; 
		  }
		  $sql_select="select submitted_amount from fee_sub where stu_id='".$student_id."'and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";;
	echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
						$val4=$row["SUBMITTED_AMOUNT"];
						echo $val4;
		  }
?>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

  <div id = "content">
    <h1 id = "feehead">Fee Form</h1>
	
	<table id="feetab" width="300" border="0">
	  <tr>
	    <td>Tution Fee:</td>
	    <td><input name="Tutionfee" type="text" value=<?php echo $val;?> disabled></td>
	  </tr>
	  <tr>
	    <td>Sports Fund:</td>
	    <td><input name="Sportsfund" type="text"value=<?php echo $val3;?> disabled></td>
	  </tr>
	  <tr>
	    <td>Student Fund:</td>
	    <td><input name="Sund" tudentftype="text" value=<?php echo $val2;?> disabled></td>
	  </tr>
	  <tr>
	    <td>Submitted Fee:</td>
	    <td><input name="Submittedfee" type="text" value=<?php echo $val4;?> disabled></td>
	  </tr>
  	<tr>
  	  <td>Remaining Fee:</td>
  	  <td><input name="Remainingfee" type="text" value=<?php echo $val2+$val+$val3-$val4;?> disabled></td>
  	</tr>
    <tr>
  	  <td>Total Fee:</td>
  	  <td><input name="Totalfee" type="text" value=<?php echo $val2+$val+$val3;?> disabled></td>
  	</tr>
  	<tr>
  	  <td></td>
  	  <td><input name="Back" type="submit" value="Back" /></td>
  	</tr>

	</table>


  </div>

</div>


</body>
</html>