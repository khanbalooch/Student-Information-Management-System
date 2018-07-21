<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marks Form</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<body>


	<div id = "head">
    	<h1 id = "title"> Marks</h1>
  	</div>
	<?php
	$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Zain)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
   $db_user = "system"; 
   $db_pass = "saim";
	$con = oci_connect($db_user,$db_pass,$db_sid);
	if($con)
	{
		//echo "Oracle connection succcessful";	
	}
	echo '</br>';
	session_start();
	$sql_select="select sem_id from semester where sem_name='".$_SESSION['semester']."'";
	//echo $sql_select;
	$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			$semid=$row['SEM_ID'];  
		  }
	$sql_select1="select course_name from course where course_id in(select course_id from stu_reg where stu_id='".$_SESSION['username']."' and sem_id=(select sem_id from semester where sem_name='".$_SESSION['semester']."'))";
	//echo $sql_select;
	$query_id31 = oci_parse($con, $sql_select1);
        	$runselect1 = oci_execute($query_id31);
        	$rs_arr1 = oci_fetch($query_id31, OCI_BOTH+OCI_RETURN_NULLS);
        echo '<p>&nbsp&nbsp&nbspSEMESTER<td><input name="Sund" tudentftype="text" value='.$semid.' disabled>&nbsp&nbsp&nbspSTUDENT 
		  <td><input name="Sund" tudentftype="text" value='.$_SESSION['username'].' disabled></td><p></br>';
		  echo '</br>';
      	  while($row1 = oci_fetch_array($query_id31, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			$coursename= $row1['COURSE_NAME'];
			$sql_select2="select course_id from course where course_name='".$coursename."'";
	//echo $sql_select;
	$query_id32 = oci_parse($con, $sql_select2);
        	$runselect2 = oci_execute($query_id32);
        	$rs_arr2 = oci_fetch($query_id32, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row2 = oci_fetch_array($query_id32, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
			$courseid=$row2['COURSE_ID'];  
		  }  
		   echo '<p>&nbsp&nbsp&nbspCourse&nbsp<td><input name="Sund" tudentftype="text" value='.$courseid.' disabled> </br><p>';
		echo '</br>';
		
		  $sql_select="select aa.ass_id, aa.ass_marks, aa.ass_wtg, bb.obtained_marks, bb.obtained_weightage from assignment aa ,stu_ass bb where aa.ass_id=bb.ass_id and aa.course_id='".$courseid."' and bb.course_id='".$courseid."' and aa.sec_name=bb.sec_name and aa.sem_id='".$semid."' and bb.sem_id='".$semid."' and bb.stu_id='".$_SESSION['username']."'";
		  //echo $sql_select;
		  $query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        echo '<table width="200" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">ASSG_ID&nbsp;</th>
    <th scope="col">ASSG_MARKS&nbsp;</th>
    <th scope="col">ASSG_WTG&nbsp;</th>
    <th scope="col">OBTAINED MARS&nbsp;</th>
    <th scope="col">Obtained Weightage&nbsp;</th>
	</tr>';
      	  while($row2 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {  
			echo '<tr>
		<td scope="col">'.$row2['ASS_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['ASS_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['ASS_WTG'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_WEIGHTAGE'].'&nbsp;</td>
		</tr>';
		  }  
		  echo '</table>';
		  echo '</br>';
		  
		  $sql_select="select aa.quiz_id, aa.quiz_marks, aa.quiz_wtg, bb.obtained_marks, bb.obtained_weightage from quiz aa ,stu_quiz bb where aa.quiz_id=bb.quiz_id and aa.course_id='".$courseid."' and bb.course_id='".$courseid."' and aa.sec_name=bb.sec_name and aa.sem_id='".$semid."' and bb.sem_id='".$semid."' and bb.stu_id='".$_SESSION['username']."'";
		  //echo $sql_select;
		  $query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        echo '<table width="200" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">QUIZ_ID&nbsp;</th>
    <th scope="col">QUIZ_MARKS&nbsp;</th>
    <th scope="col">QUIZ_WTG&nbsp;</th>
    <th scope="col">OBTAINED MARS&nbsp;</th>
    <th scope="col">Obtained Weightage&nbsp;</th>
	</tr>';
      	  while($row2 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {  
			echo '<tr>
		<td scope="col">'.$row2['QUIZ_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['QUIZ_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['QUIZ_WTG'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_WEIGHTAGE'].'&nbsp;</td>
		</tr>';
		  }  
		  echo '</table>';
		  echo '</br>';
		  $sql_select="select aa.proj_id, aa.proj_marks, aa.proj_wtg, bb.obtained_marks, bb.obtained_weightage from c_project aa ,stu_proj bb where aa.proj_id=bb.proj_id and aa.course_id='".$courseid."' and bb.course_id='".$courseid."' and aa.sec_name=bb.sec_name and aa.sem_id='".$semid."' and bb.sem_id='".$semid."' and bb.stu_id='".$_SESSION['username']."'";
		   $query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        echo '<table width="200" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">PROJ_ID&nbsp;</th>
    <th scope="col">PROJ_MARKS&nbsp;</th>
    <th scope="col">PROJ_WTG&nbsp;</th>
    <th scope="col">OBTAINED MARS&nbsp;</th>
    <th scope="col">Obtained Weightage&nbsp;</th>
	</tr>';
      	  while($row2 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {  
			echo '<tr>
		<td scope="col">'.$row2['PROJ_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['PROJ_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['PROJ_WTG'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_WEIGHTAGE'].'&nbsp;</td>
		</tr>';
		  }  
		  echo '</table>';
		  echo '</br>';
		  $sql_select="select aa.exam_id, aa.exam_marks, aa.exam_wtg, bb.obtained_marks, bb.obtained_weightage from exam aa ,stu_exam bb where aa.exam_id=bb.exam_id and aa.course_id='".$courseid."' and bb.course_id='".$courseid."' and aa.sec_name=bb.sec_name and aa.sem_id='".$semid."' and bb.sem_id='".$semid."' and bb.stu_id='".$_SESSION['username']."'";
		   $query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        echo '<table width="200" border="1" bgcolor=#FFFFF>
	<tr>
    <th scope="col">EXAM_ID&nbsp;</th>
    <th scope="col">EXAM_MARKS&nbsp;</th>
    <th scope="col">EXAM_WTG&nbsp;</th>
    <th scope="col">OBTAINED MARS&nbsp;</th>
    <th scope="col">Obtained Weightage&nbsp;</th>
	</tr>';
      	  while($row2 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {  
			echo '<tr>
		<td scope="col">'.$row2['EXAM_ID'].'&nbsp;</td>
		<td scope="col">'.$row2['EXAM_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['EXAM_WTG'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_MARKS'].'&nbsp;</td>
		<td scope="col">'.$row2['OBTAINED_WEIGHTAGE'].'&nbsp;</td>
		</tr>';
		  }
		  echo '</table>';
		  echo '</br>';  
		  }
	?>

</body>
</html>