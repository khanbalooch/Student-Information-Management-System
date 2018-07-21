<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>student script</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div id = "head">
    	<h1 id = "title"> STUDENT MARK SHEET ISSUUING </h1>
  	</div>
<?php
	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	session_start();
	$get=$_POST['allowed'];
	//echo $get;
		//if($get=="FIND")
		{
			//echo "zain";
			$variable=$_POST['selectstudent'];
			$sql_select="select min(total_percentage) minpres from stu_attendance where stu_id='".$variable."'";
			//echo $sql_select;
			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
		
  							$yesno=$row['MINPRES'];
							//echo $row['MINPRES'];			
			}
			if($yesno>80)
			{
					//echo "zain";
					$sql_select="select COURSE_ID , TOTAL_PERCENTAGE from stu_attendance where stu_id='".$_POST['selectstudent']."' and sem_id =(select sem_id from semester where sem_name='".$_SESSION['semester']."')";	
				//echo $sql_select;
					$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			echo '<p>&nbspSEMESTER<td><input name="Sund" tudentftype="text" value='.$_SESSION['semester'].' disabled> 
		  <td>STUDENTID&nbsp&nbsp<input name="Sund" tudentftype="text" value='.$_SESSION['username'].' disabled></td></br>';
		  echo '</br></br></br>';
			echo '<table width="500" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">COURSE&nbsp;</th>
    <th scope="col">Attendance&nbsp;</th>
	</tr>';  
			while($row2 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			echo '<tr>
		<td scope="col">'.$row2['COURSE_ID'].'%&nbsp;</td>
		<td scope="col">'.$row2['TOTAL_PERCENTAGE'].'%&nbsp;</td>
		</tr>';
		  }	
			}
			else
			{
					echo "                                      DOESNOT MEET REQIREMENT                            ";	
			}
		}
	$sql_select="select distinct stu_id from stu_reg where sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."')";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			echo '<form  name="form01" method="post" action="script.php">
	<table style="width:200px; padding:10px">
            	<tr>
                <td><select  id="dropdown" name="selectstudent" style="width:200px; margin-left:590px;">';	
                  
	while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
  							echo'<option >'.$row["STU_ID"].'</option>';
  							
	}

		echo ' 	</select>
                     </td>;
		</tr>
		<td><input type="submit" id="allow" name="allowed" value="Find" ></input></td>
		</form>'; 
		
	?>
  




</body>
</html>