<?php
$logged_email=$_SESSION['email'];
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$facuties_name=$_POST['fnametxt'];
	$faculty_email=$_POST['femail'];
	$faculty_mobile=$_POST['fmobile'];
	$faculty_dob=$_POST['fdob'];
	$role=$_POST['frole'];
	$dept=$_POST['fdept'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO facuties_tbl 
						VALUES(
							'$facuties_name',
							'$faculty_email',
							'$faculty_mobile',
							'$faculty_dob',
							'$role',
							'$dept',
							'$note'
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
			color: #ffffff
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

	<center><h5>My Profile</h5></center>
  	<form method="POST">
  	<input type="text" name="fnametxt" placeholder='Enter Your Name' required>
  	<input type="email" name="femail" placeholder="<?php echo $logged_email;?>" required>
  	<input type="text" name="fmobile" placeholder='Enter Your Mobile Number' maxlength="10" required>
  	<input type="date" name="fdob" placeholder="DOB (01-01-1988)" required>
  	Designation: <select class="browser-default" name="frole" required>
		<option disabled>Designation</option>
		<option value="Professor">Professor</option>
		<option value="Sr.Assoc Prof">Sr.Assoc Prof</option>
		<option value="Assoc Prof">Assoc Prof</option>
		<option value="Sr.Asst Prof">Sr.Asst Prof</option>
		<option value="Asst Prof">Asst Prof</option>
	</select><br/>
	Department: <select class="browser-default" name="fdept" required>
		<option disabled>Department</option>
		<option value="CSE">CSE</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="MECH">MECH</option>
		<option value="CIVIL">CIVIL</option>
		<option value="IT">IT</option>
	</select><br>
  	<textarea name="notetxt" cols="18" placeholder='Add notes..' rows="4"></textarea><br><br>
  	<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />
  	<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />
	<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />

  	</form>
  </div>

</body>
</html>