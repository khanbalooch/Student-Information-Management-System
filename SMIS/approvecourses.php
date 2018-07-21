<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Approve Courses</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
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
	$sql_select="select course_id from course where course_name='".$_POST["selectcourse"]."'";
	//echo $sql_select;
			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
				$courseid=$row["COURSE_ID"];  
		  }
	if($_POST["allowed"]=="Allowed")
	{
		$sql_update="update course_offer set approval='Approved' where sec_name='".$_POST['selectsection']."' and course_id='".$courseid."'";
		echo $sql_update;
		$query_id2 = oci_parse($con, $sql_update);
           $runupdate = oci_execute($query_id2);
	}
	
	session_start();
	if($con)
	{ echo "Oracle Connection Successful."; }
	else
	{ die('Could not connect to Oracle: '); }
	//$sql_select="select course_name from course where course_id=(select course_id from course_offer where course_id='".$_courseid."' and sem_id='".$_SESSION['semester']."')";
	$sql_select="select course_name from course where course_id in (select course_id from course_offer where sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."'))";
	//echo $sql_select;
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	echo '<form  name="form01" method="post" action="approvecourses.php">
	<table style="width:200px; padding:10px">
            	<tr>
                <td><select  id="dropdown" name="selectcourse" style="width:200px; margin-left:590px;">';	
                  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
  							echo'<option >'.$row["COURSE_NAME"].'</option>';
  							
	}

		echo ' 	</select>
                     </td>;
		</tr>';


			$sql_select="select sec_name from section";
				$selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
				 echo  '
            	<tr>
                <td><select  id="dropdown" name="selectsection" style="width:200px; margin-left:590px;">';	
                  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //ourseparse or execute for update, insert
	{
		
  							echo'<option >'.$row["SEC_NAME"].'</option>';
  							
	}
		echo ' 	</select>
                     </td>;
		</tr>
				   </table>
				   <input type="submit" id="allow" name="allowed" value="Allowed" ></input>
				    <input type="submit" id="notallow" name="notallowed" value="NotAllowed" ></input>;
</form>';
		oci_close($con);	
 ?>
 

    </div>

 </div>
<body>
</body>
</html>