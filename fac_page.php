<?php
	session_start();
	require("connection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
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
	body{
		background-color: #330000;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23352586'/%3E%3Cstop offset='1' stop-color='%23300'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%235c2aff' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%235c2aff' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.4'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;
background-position: center;
	}
</style>	
</head>
<body>
<div style="background-color: white;">
	

<div class="container">
	<center><img src="images/aitam.png" style="height: 100px;" alt="AITAM"></center>
	<center><?php $ses_email = $_SESSION['email'];
	echo "Welcome ".$ses_email; ?></center>
</div>
</div>

	<?php        
     include './fac_dropdown.php';
    ?>
<div class="container">
<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="update_profile")
                            include("myprofile.php");
                        elseif($tag=="publish_journal")
                            include("publish_journal.php");
                        elseif($tag=="my_journals")
                            include("my_journals.php");	
                        elseif($tag=="enter_workshop")
                            include("enter_workshop.php");
                        elseif($tag=="my_workshops")
                            include("my_workshops.php");
                        ?>	
</div>
</body>
</html>