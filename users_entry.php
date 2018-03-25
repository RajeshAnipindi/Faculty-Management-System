<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO users_tbl 
						VALUES(
							NULL,
							'$username',
							'$pwd' ,
							'$type',
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
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE users_tbl SET 
								username='$username' ,
								password='$pwd' , 
								type='$note' ,
								note='$note'
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_users");
	else
		$msg="Update Fail".mysql_error();
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

	<center><h5>Student Form</h5></center>
  	<form method="POST">
  	
  	<input type="email" name="usertxt" id="textbox" placeholder="Username / E-Mail" />

  	<input type="password" name="pwdtxt" id="textbox" placeholder="Password" />

  	<input type="text" name="typetxt" id="textbox" placeholder="Type" />

  	<textarea name="notetxt" cols="23" rows="5" placeholder="Note"></textarea>





  	</form>
  	</div>
  </body>
  </html>