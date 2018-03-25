<?php
	session_start();
	
	require("connection/connect.php");
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM admins
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='admin')
						$msg="Login Error !.....";	
					else
						header("location: admin_page.php");
					
			}
			
			else
					$msg="Invalid Login Authentication, Try Again!";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>AITAM | Faculty management System.</title>
</head>

<body>
	<div class="container">
		<div class="row">
			
		
    	<div class="col-md-6">
		<div class="h1_pos">
    			<h1>Login For Admin </h1>
    		</div><br><br><br>
    		<form method="POST">
    				<center><img src="./images/aitam.jpg" id="logo"></center>
                    <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter Password here" /><br>
    		<input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
    		</form>
    		<div class="row">
    		   		
    		<div class="col-md-12" style="text-align: center;">
                    <a href="AboutManagement.php" style="text-decoration:none; color: silver">About management</a>
    		</div>
    		</div>
    		
	</div>
	</div>
    </div>
	
        <h2 style="color: #3a28a5; text-align: center;">
            <?php echo $msg; ?>
        </h2>    
</body>
</html>
