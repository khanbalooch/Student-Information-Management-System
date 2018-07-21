<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Reset</title>
<link rel="stylesheet" type="text/css" href="indexs.css">
</head>
<div id = "wraper">
	<div id = "head">
    	<h1 id = "title"> Name of project </h1>
  	</div>

	<div id = "content">
   	        	<form id = "form" action="" method="post" name="form1">
            	<table style="width:200px; padding:10px">
                	<tr>
                    	<td><input type="text" name="old_pass" placeholder="Existing Password"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="new_pass" placeholder="New Password"/></td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="new_pass1" placeholder="Enter New Password Again"/></td>
                    </tr>

                    <tr>
                    	<td>
                        	<button type="submit" onclick="validate()">Regisrter</button> 
                            <button type="reset">Cancel</button>
                        </td>
                    </tr>
                </table>
            </form>

    </div>

 </div>
<body>
</body>
</html>


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
</script><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>