<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Project</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

  <div id = "content">
    <h1 id = "coursehead">New Project</h1>
    
    
    <?php
error_reporting(0);
session_start();
$empname=$_SESSION['username'];
$semester = $_SESSION['semester'];



$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SID 	= irshad) ) )"; 
   $db_user = "system"; 
   $db_pass = "786786allahtala";
   $con = oci_connect($db_user,$db_pass,$db_sid);
   
   	$semester = $_SESSION['semester'];
	
	$_select = "select sem_id from semester where sem_name = '".$semester."'";
   
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			
        	$semester_id=$row["SEM_ID"];
			
			
				
		  }
		  
		  
		  $_select = "select course_id from course where course_name = '".$_POST["select_course_name"]."'";
   //echo "$_select";
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   
   
  while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			//echo $row["EMP_ID"];
        	$course_id=$row["COURSE_ID"];
				
		  }
		  ?>

Semester
<input type "text" name "semester" value = "<?php echo $semester?>"/>



<form action="add_project.php" method="post" name="form10"><br />


<?php 

if($_POST["update"]=='Update')
   {
	   
	//echo "updated";
	'<br/>';
//	  echo $_POST[ass_id];  echo '<br/>';
	   //echo $course_id; '<br/>';
		//echo $semester_id;	    '<br/>';
	   //echo $_POST[selectsection]; '<br/>';
	   
	 
	$sql_insert="INSERT INTO c_project (proj_id,course_id,sem_id,sec_name,proj_marks,proj_wtg,proj_open_date,proj_due_date,proj_desc) VALUES($_POST[ass_id],'".$course_id."','".$semester_id."','$_POST[selectsection]',$_POST[ass_mk],$_POST[ass_wt],'".date('d-M-Y')."','$_POST[ass_d_date]','$_POST[ass_desc]')";
	
	//echo "$sql_insert";
	
		$query_id = oci_parse($con, $sql_insert);
		$run = oci_execute($query_id);
		 

 						  			}
									
									
									
									
$sql_select="select cs.course_name
	from course cs
	where cs.course_id in (select co.course_id 
        from course_offer co
        where co.course_id = cs.course_id
        and co.sem_id = '".$semester_id."'
		and co.approval = 'approved')";
		//echo "$sql_select";
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
echo '		<p>Course
           <select  id="dropdown" name="select_course_name" style="width:85px;">';	
           		while($row = oci_fetch_array($selectquery  ,OCI_BOTH+OCI_RETURN_NULLS ))  //parse or execute for update, insert
				{
  					echo'<option >'.$row["COURSE_NAME"].'</option>';		
				}
				echo ' 	</select></p>';




$sql_select="select s.sec_name
			from section s
			where s.sec_name in (select co.sec_name
                     from course_offer co
                     where co.sec_name = s.sec_name
                     and co.sem_id = '".$semester_id."'
					 and co.approval = 'approved')";
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
echo '    <p>Section
           <select  id="dropdown" name="selectsection"  style="width:85px;">';	
           		while($row = oci_fetch_array($selectquery  ,OCI_BOTH+OCI_RETURN_NULLS ))  //parse or execute for update, insert
				{
  					echo'<option >'.$row["SEC_NAME"].'</option>';		
				}
				echo ' 	</select></p>';
?>

Project No<input type="number" name="ass_id" value=""/><br/>
Marks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="ass_mk" value=""/><br/>
Waitage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="ass_wt" value=""/><br/>
<!--Open Date&nbsp;&nbsp;&nbsp;<input type="text" name="ass_o_date" value="DD-MON-YYYY"/><br/>-->
Due Date&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ass_d_date" value="DD-MON-YYYY"/><br/>
Description  <input type="text" name="ass_desc" value=""/><br/>
<input type="submit" name="update" value="Update"/>
</form>



<form action="add_new_things.php" method="post" name="form15" >

<input type="submit" name ="Back" value="Back" >

</form>


<form action="add_project.php" method="post" name="form15" >


<?php

	//echo "$semester_id";
	
if($_POST["show_all"]=='Show All'){
	
	$sql_select="select q.proj_id,c.course_name,s.sem_id,q.sec_name,q.proj_marks,q.proj_wtg,q.proj_due_date,q.proj_open_date
	 from c_project q,course c,semester s,section sc
	 where q.course_id = c.course_id
	 and q.sec_name = sc.sec_name
	 and q.sem_id = s.sem_id 
	 and q.sem_id = '".$semester_id."'";
	 
	 																					
	//echo "$semester_id";
	//echo "$sql_select";
		  
	$selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	if($runselectquery == 0 ){
		
		echo " query is not executed";
		
		}
		
	else {
		
		echo "query is executed";
		}
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
	
	echo '<table width="200" border="1">
	<tr>
    <th scope="col">PROJ_ID&nbsp;</th>
    <th scope="col">COURSE_NAME&nbsp;</th>
	<th scope="col">SEM_ID&nbsp;</th>
    <th scope="col">SEC_NAME&nbsp;</th>
    <th scope="col">PROJ_MARKS&nbsp;</th>
    <th scope="col">PROJ_WTG&nbsp;</th>
    <th scope="col">PROJ_DUE_DATE&nbsp;</th>
	<th scope="col">PROJ_OPEN_DATE&nbsp;</th>
    </tr>';
  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
		//echo 'fetching_array';
		echo '<tr>
		<td scope="col">'.$row["PROJ_ID"].'&nbsp;</td>
		<td scope="col">'.$row["COURSE_NAME"].'&nbsp;</td>
		<td scope="col">'.$row["SEM_ID"].'&nbsp;</td>
		<td scope="col">'.$row["SEC_NAME"].'&nbsp;</td>
		<td scope="col">'.$row["PROJ_MARKS"].'&nbsp;</td>
		<td scope="col">'.$row["PROJ_WTG"].'&nbsp;</td>
		<td scope="col">'.$row["PROJ_DUE_DATE"].'&nbsp;</td>
		<td scope="col">'.$row["PROJ_OPEN_DATE"].'&nbsp;</td>
		</tr>';
		}
		echo '</table>';

		oci_close($con);
	}
			
?>
<input type="submit" name ="show_all" value="Show All" >

</form>






