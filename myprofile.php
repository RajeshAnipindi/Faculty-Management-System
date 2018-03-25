<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$name=$_POST['fnametxt'];
	$email=$ses_email;
	$mobile=$_POST['fmobile'];
	$gender=$_POST['gender'];
	$dob=$_POST['dd']."/".$_POST['mm']."/".$_POST['yy'];
	$doj=$_POST['yoj']."-".$_POST['moj']."-".$_POST['doj'];
	$address=$_POST['addrtxt'];
	$role=$_POST['frole'];
	$dept=$_POST['fdept'];
	$degree=$_POST['degree'];
	$salary=$_POST['salarytxt'];
	$married=$_POST['married'];


	$now = time(); // or your date as well
	$your_date = strtotime($doj);
	$datediff = $now - $your_date;
	$working_since=round($datediff/31536000);



$sql_ins=mysql_query("INSERT INTO faculties 
						VALUES(
							'$name',
							'$email',
							'$mobile',
							'$gender',
							'$dob',
							'$doj',
							'$address',
							'$role',
							'$dept',
							'$degree',
							'$salary',
							'$married',
							'$working_since'
							)
					");
if($sql_ins==true)
	echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Inserted Successfully... !"
                . "</span>"
                . "</div>";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$name=$_POST['fnametxt'];
	$email=$ses_email;
	$mobile=$_POST['fmobile'];
	$gender=$_POST['gender'];
	$dob=$_POST['dd']."/".$_POST['mm']."/".$_POST['yy'];
	$doj=$_POST['yoj']."-".$_POST['moj']."-".$_POST['doj'];
	$address=$_POST['addrtxt'];
	$role=$_POST['frole'];
	$dept=$_POST['fdept'];
	$degree=$_POST['degree'];
	$salary=$_POST['salarytxt'];
	$married=$_POST['married'];
	
	$now = time(); // or your date as well
	$your_date = strtotime($doj);
	$datediff = $now - $your_date;
	$working_since=round($datediff / 365.25);
		
	
	$sql_update=mysql_query("UPDATE faculties SET 
								name='$name',
								mobile='$mobile',
								gender='$gender',
								dob='$dob',
								address='$address',
								role='$role',
								dept='$dept',
								degree='$degree',
								salary='salary',
								married='$married',
								working_since='$working_since'
								
							WHERE
								email=$ses_email
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

	<center><h5>My Profile</h5></center>
  	    	
    	<?php 
    	$sql_ins=mysql_query("SELECT * FROM faculties WHERE email='$ses_email' ");
    	if (mysql_num_rows($sql_ins)!=1) {
    	?>
  	 	<form method="POST">
  	<input type="text" name="fnametxt" placeholder='Enter Your Name' required>
  	<input type="text" name="fmobile" placeholder='Enter Your Mobile Number' maxlength="10" required>
  	<p>Gender : 
  		<input name="gender" type="radio" id="radio1" value="Male" />
      	<label for="radio1">Male</label>
      	<input name="gender" type="radio" id="radio2" value="Female" />
      	<label for="radio2">Female</label>
      	</p>
  	<label>Date of Birth</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="dd">
      		<option>Date</option>
      		<?php
            for($i=1;$i<=31;$i++){
            ?>
            <option value="<?php echo $i; ?>">
            <?php
            if($i<10)
            echo"0".$i;
            else
            echo"$i";	  
			?>
			</option>	
			<?php 
			}?>
      		
      	</select>    	
      	</div>
      	<div class="col s4">
    	<select class="browser-default" name="mm">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?>
    	</select>
		</div>
  		<div class="col s4">
  		<select class="browser-default" name="yy">
    	<option>Year</option>
    	<?php
		for($i=1965;$i<=1995;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>
    
    	<label>Date of Joining</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="doj">
      		<option>Date</option>
      		<?php
            for($i=1;$i<=31;$i++){
            ?>
            <option value="<?php echo $i; ?>">
            <?php
            if($i<10)
            echo"0".$i;
            else
            echo"$i";	  
			?>
			</option>	
			<?php 
			}?>
      		
      	</select>    	
      	</div>
      	<div class="col s4">
    	<select class="browser-default" name="moj">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?>
    	</select>
		</div>
  		<div class="col s4">
  		<select class="browser-default" name="yoj">
    	<option>Year</option>
    	<?php
		for($i=2001;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>
    

    	<input type="text" name="addrtxt" placeholder="Address" />
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
      	<label>Qualification</label>
      	<select class="browser-default" name="degree">
      		<option>Degree</option>
      		<?php
             $mm=array("B.Tech","M.Tech","P.hD");
             $i=0;
             foreach($mm as $mon){
             $i++;
			 echo"<option value='$mon'> $mon</option>";
             }		
            ?>  	
      	</select>
      	<input type="text" name="salarytxt" placeholder="Salary" />
      	<p>Married :
   	    <input name="married" type="radio" id="radio3" value="Yes" />
      	<label for="radio3">Yes</label>
      	<input name="married" type="radio" id="radio4" value="No" />
      	<label for="radio4">No</label>
      	</p>
		<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />
		</form>
 	<?php
		} else{
  	 	while($row = mysql_fetch_assoc($sql_ins)){
  	 	
		$ret_name = $row['name'];
		$ret_email = $row['email'];
		$ret_phone = $row['phone'];
		$ret_gender = $row['gender'];
		$ret_dob = $row['dob'];
		$ret_doj = $row['doj'];
		$ret_address = $row['address'];
		$ret_role = $row['role'];
		$ret_dept = $row['dept'];
		$ret_degree = $row['degree'];
		$ret_salary = $row['salary'];
		$ret_married = $row['married'];
		$ret_exp = $row['working_since'];
		}
		?>
		
		<form method="POST">
  	<input type="text" name="fnametxt" placeholder='<?php echo $ret_name; ?>' value='<?php echo $ret_name; ?>' required>
  	<input type="text" name="fmobile" placeholder='<?php echo $ret_phone; ?>' maxlength="10" required>
  	<p>Gender : 
  		<input name="gender" type="radio" id="radio1" value="Male" />
      	<label for="radio1">Male</label>
      	<input name="gender" type="radio" id="radio2" value="Female" />
      	<label for="radio2">Female</label>
      	</p>
  	<label>Date of Birth</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="dd" >
      		<option>Date</option>
      		<?php
            for($i=1;$i<=31;$i++){
            ?>
            <option value="<?php echo $i; ?>">
            <?php
            if($i<10)
            echo"0".$i;
            else
            echo"$i";	  
			?>
			</option>	
			<?php 
			}?>
      		
      	</select>    	
      	</div>
      	<div class="col s4">
    	<select class="browser-default" name="mm">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?>
    	</select>
		</div>
  		<div class="col s4">
  		<select class="browser-default" name="yy">
    	<option>Year</option>
    	<?php
		for($i=1965;$i<=1995;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>
    
    	<label>Date of Joining</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="doj">
      		<option>Date</option>
      		<?php
            for($i=1;$i<=31;$i++){
            ?>
            <option value="<?php echo $i; ?>">
            <?php
            if($i<10)
            echo"0".$i;
            else
            echo"$i";	  
			?>
			</option>	
			<?php 
			}?>
      		
      	</select>    	
      	</div>
      	<div class="col s4">
    	<select class="browser-default" name="moj">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?>
    	</select>
		</div>
  		<div class="col s4">
  		<select class="browser-default" name="yoj">
    	<option>Year</option>
    	<?php
		for($i=2001;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>
    

    	<input type="text" name="addrtxt" placeholder="<?php echo $ret_address; ?>" />
    	Designation: <select class="browser-default" name="frole" value='<?php echo $ret_role; ?>' required>
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
      	<label>Qualification</label>
      	<select class="browser-default" name="degree">
      		<option>Degree</option>
      		<?php
             $mm=array("B.Tech","M.Tech","P.hD");
             $i=0;
             foreach($mm as $mon){
             $i++;
			 echo"<option value='$mon'> $mon</option>";
             }		
            ?>  	
      	</select>
      	<input type="text" name="salarytxt" placeholder='<?php echo $ret_salary; ?>'  value='<?php echo $ret_salary; ?>'/>
      	<p>Married :
   	    <input name="married" type="radio" id="radio3" value="Yes" />
      	<label for="radio3">Yes</label>
      	<input name="married" type="radio" id="radio4" value="No" />
      	<label for="radio4">No</label>
      	</p>
  	 	<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />
		</form>
  	 	<?php
  	 	}
  	 	?>

  	
  	
  </div>

</body>
</html>