<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$email=$_POST['femail'];
	$password=$_POST['fpwd'];
	

$sql_ins=mysql_query("INSERT INTO faculty_login
						VALUES(
						NULL,
							'$email',
							'$password'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$fac_name=$_POST['fnametxt'];
	$fac_email=$_POST['femail'];
	$fac_mobile=$_POST['fmobile'];
	$fac_dob=$_POST['fdob'];
	$fac_role=$_POST['frole'];
	$fac_dept=$_POST['fdept'];
	$note=$_POST['notetxt'];	
	
	$sql_update=mysql_query("UPDATE facuties_tbl SET 
								faculties_name='$fac_name',
								faculties_email='$fac_email',
								faculty_mobile='$fac_mobile',
								faculty_dob='$fac_dob',
								faculty_role='$fac_role',
								Dept='$fac_dept',
								note='$note'
							WHERE
								faculties_email=$logged_email
							");
	if($sql_update==true)
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Management System</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script src="js/init.js"></script>
	<style type="text/css">
		form{
			color: #ffffff;
		}
		h5{
			color: #ffffff;
			text-align: center;
		}
		input[type=submit],input[type=reset],input[type=radio]{
			background-color: #ffffff;
			color: #000000;
		}
		select{
			background-color: #ffffff;
			color: #000000;
		}
	</style>
</head>
<body>
	
	<div class="container">

	<center><h5>Enter Faculty</h5></center>
  	<form method="POST">
  	<input type="email" name="femail" placeholder='Enter Faculty E-Mail' required>
  	<input type="password" name="fpwd" placeholder='Password' required>
  	<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />
  	<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />

  	</form>
  </div>

</body>
</html>