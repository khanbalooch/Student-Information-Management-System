<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Regisstration</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<body>

	<div id = "head">
    	<h1 id = "title"> Course Registration </h1>
  	</div>
 	
 
<?php

    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	session_start();
	$sem=$_SESSION['semester'];
	$sql_select="select sum(course_crdhrs) sumcrd from course where course_id in(select course_id from stu_reg where stu_id='".$_SESSION['username']."'and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."'))";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
						$val0=$row["SUMCRD"];  
		  }
		  $sql_select="select course_crdhrs from course where course_name='".$_SESSION['selectcrs']."'";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
						$val01=$row["COURSE_CRDHRS"]; 
		  }
	$sql_select="select course_id from course where course_name='".$_SESSION['selectcrs']."'";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
					$courseid=$row["COURSE_ID"];  
		  }
		  $sql_select="select sem_id from semester where sem_name='".$_SESSION['semester']."'";
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
					$semid=$row["SEM_ID"];  
		  }
		  if($val0+$val01<=18)
		  {
	$sql_insert="insert into stu_reg values ('".$courseid."','".$semid."','".$_POST['selectsection']."','".$_SESSION['username']."','NULL','". date('d-M-Y') ."')";
	//echo $sql_insert;
	$query_id = oci_parse($con, $sql_insert);
           $run = oci_execute($query_id);
		  }
		  
		  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql_select="select course_name  from course where course_id in(select course_id from course_offer where approval='Approved' and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."'))and course_prereq in(select course_id from stu_reg where grade!='F' and stu_id='".$_SESSION['username']."')";
	//echo $sql_select;
	$selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	echo '<form id="form" name="form01" method="post" action="courseregisstration.php">
	<table style="width:200px; padding:10px">
            	<tr>
                <td><select  id="dropdown" name="selectcourse" style="width:200px; margin-left:0px;">';	
                  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
  							echo'<option >'.$row["COURSE_NAME"].'</option>';
	}

		echo ' 	</select>
                     </td>;
		</tr>
		 <tr>
		<tr>
		<tr>
		 <td><input type="submit" id="allow" name="add" value="Add" ></input></td>
		 </tr>
		 </tr>
		 </table>
	</form>';
	if($_POST['add']=='Add')
	{
	if (isset($_POST['selectcourse'])) {
	$coursename=$_POST["selectcourse"];
	}
	$sql_select="select sec_name from course_offer where course_id=(select course_id from course where course_name='".$coursename."')";
	$selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	echo '<form id="form" name="form0100" method="post" action="">
	<table style="width:200px; padding:10px">
            	<tr>
                <td><select  id="dropdown" name="selectsection" style="width:200px; margin-left:0px;">';	
                  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
  							echo'<option >'.$row["SEC_NAME"].'</option>';
	}

		echo ' 	</select>
                     </td>;
		</tr>
		<tr>
		<tr>
		<tr>
		 <td><input type="submit" id="allow" name="register" value="Register" ></input></td>
		 </tr>
		 </tr>
		 </tr>
		</table>';
	}
	
	$sql_select="select * from stu_reg where stu_id='".$_SESSION['username']."'and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
	$selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	echo '<table id="crstable" width="200" border="1" bgcolor="#FFFFFF">
	<tr>
    <th scope="col">COURSE_ID&nbsp;</th>
    <th scope="col">SEM_ID&nbsp;</th>
    <th scope="col">Section&nbsp;</th>
    <th scope="col">stu_ID&nbsp;</th>
    <th scope="col">Grade&nbsp;</th>
    <th scope="col">REG_Date&nbsp;</th>
    
	</tr>';
  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		echo '<tr>
		<td scope="col">'.$row["COURSE_ID"].'&nbsp;</td>
		<td scope="col">'.$row["SEM_ID"].'&nbsp;</td>
		<td scope="col">'.$row["SEC_NAME"].'&nbsp;</td>
		<td scope="col">'.$row["STU_ID"].'&nbsp;</td>
		<td scope="col">'.$row["GRADE"].'&nbsp;</td>
		<td scope="col">'.$row["REG_DATE"].'&nbsp;</td>
		</tr>';
		}
		echo '</table>';
		$_SESSION['selectcrs']=$coursename;
?>


</body>
</html>