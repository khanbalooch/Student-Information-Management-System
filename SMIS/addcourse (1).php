<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Course</title>
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
    <h1 id = "coursehead">Offer Courses</h1>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


    
    
    
    
<?php
error_reporting(0);
session_start();
$empname=$_SESSION['username'];



$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
   $con = oci_connect($db_user,$db_pass,$db_sid);
   
   	$semester = $_SESSION['semester'];
	
	//$semester = "Semester not defined";		
			
			
?>

Semester
<input type "text" name "semester" value = "<?php echo $semester?>"/>



<form action="addcourse.php" method="post" name="form10"><br />

<?php

$instructor_id;
$instructor_name=$_POST["select_instructor_name"];
$course_name=$_POST["select_course_name"];



	

	$_select = "select sem_id from semester where sem_name = '".$semester."'";
   
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			
        	$semester_id=$row["SEM_ID"];
			
			
				
		  }



   $_select = "select emp_id from employee where emp_name = '".$instructor_name."'";
   //echo "$_select";
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   
   
  while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			//echo $row["EMP_ID"];
        	$instructor_id=$row["EMP_ID"];
				
		  }
		  
		  
		  $_select = "select course_id from course where course_name = '".$course_name."'";
   //echo "$_select";
   $selectquery = oci_parse($con, $_select);
   $runselectquery = oci_execute($selectquery);
   $rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
   
   
   
  while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			//echo $row["EMP_ID"];
        	$course_id=$row["COURSE_ID"];
				
		  }
		  
		  
		  
   
   if($_POST["update"]=='Update')
   {
	   
	  
	   
	   
	   
	   
	 
	$sql_insert="INSERT INTO course_offer (course_id,sem_id,sec_name,instructor_id,offer_date,emp_id) VALUES('".$course_id."','".$semester_id."','$_POST[selectsection]',".$instructor_id.",'". date('d-M-Y') ."',".$empname.")";
	
		
	
	
	  
	$query_id = oci_parse($con, $sql_insert);
	
	
           $run = oci_execute($query_id);
		 

 						  			}
									
   
   
   

	

$sql_select="select course_name from course";
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
				
				
$sql_select="select sec_name from section";
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
				
				
				
	$sql_select="select emp_name from employee where emp_type ='INSTRUCTOR'";
   $selectquery = oci_parse($con, $sql_select);
	$runselectquery = oci_execute($selectquery);
	
	
	$rs_arr = oci_fetch($selectquery, OCI_BOTH+OCI_RETURN_NULLS);
echo '    <p>Instructor
           <select  id="dropdown" name="select_instructor_name"  style="width:85px;">';	
           		while($row = oci_fetch_array($selectquery  ,OCI_BOTH+OCI_RETURN_NULLS ))  //parse or execute for update, insert
				{	
  					echo'<option >'.$row["EMP_NAME"].'</option>';		
				}
				echo ' 	</select></p>';
			
   ?>


<input type="submit" name="update" value="Update"/>
</form>



<form  action="addcourse.php" method="post" name="form11"><br />
<?php

	//echo "$semester_id";
	
if($_POST["show"]=='show offer courses of this semester'){
	
	$sql_select="select co.course_id, c.course_name,co.sem_id,co.sec_name,co.emp_id,co.offer_date,co.approval,co.instructor_id
	 	from course_offer co,course c 
		where co.sem_id = '".$semester_id."'
		and co.course_id = c.course_id";
		
		  
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
    <th scope="col">COURSE_ID&nbsp;</th>
    <th scope="col">COURSE_NAME&nbsp;</th>
	<th scope="col">SEM_ID&nbsp;</th>
    <th scope="col">SEC_NAME&nbsp;</th>
    <th scope="col">EMP_ID&nbsp;</th>
    <th scope="col">OFFER_DATE&nbsp;</th>
    <th scope="col">APPROVAL&nbsp;</th>
    <th scope="col">INSTRUCTOR_ID&nbsp;</th>
    </tr>';
  
	while($row = oci_fetch_array($selectquery, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
	{
		
		//echo 'fetching_array';
		echo '<tr>
		<td scope="col">'.$row["COURSE_ID"].'&nbsp;</td>
		<td scope="col">'.$row["COURSE_NAME"].'&nbsp;</td>
		<td scope="col">'.$row["SEM_ID"].'&nbsp;</td>
		<td scope="col">'.$row["SEC_NAME"].'&nbsp;</td>
		<td scope="col">'.$row["EMP_ID"].'&nbsp;</td>
		<td scope="col">'.$row["OFFER_DATE"].'&nbsp;</td>
		<td scope="col">'.$row["APPROVAL"].'&nbsp;</td>
		<td scope="col">'.$row["INSTRUCTOR_ID"].'&nbsp;</td>
		</tr>';
		}
		echo '</table>';

		oci_close($con);
	}
			
?>

<input type="submit" name="show" value="show offer courses of this semester"/>
</form>

<form action ="emp.php" method="post" name = "form13" /><br/>
<input type="submit" name="Go" value="Go Back"/>
</form>





<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->		

  </div>

</div>

</body>
</html>