<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$author=$_POST['author'];
	$dept=$_POST['dept'];
	$title=$_POST['title'];
	$journal=$_POST['journal'];
	$issue=$_POST['issue'];
	$isbn=$_POST['isbn'];
	$impact=$_POST['impact'];
	$ci=$_POST['ci'];
	$doi=$_POST['doi'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$other=$_POST['other'];	
	
	

$sql_ins=mysql_query("INSERT INTO journals 
						VALUES(
							NULL,
							'$ses_email',
							'$author',
							'$dept',
							'$title',
							'$journal',
							'$issue',
							'$isbn',
							'$impact',
							'$ci',
							'$doi',
							'$month',
							'$year',
							'$other'
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


if(isset($_POST['btn_upd'])){
	$author=$_POST['author'];
	$dept=$_POST['dept'];
	$title=$_POST['title'];
	$journal=$_POST['journal'];
	$issue=$_POST['issue'];
	$isbn=$_POST['isbn'];
	$impact=$_POST['impact'];
	$ci=$_POST['ci'];
	$doi=$_POST['doi'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$other=$_POST['other'];	
	
	

$sql_ins=mysql_query("UPDATE journals SET 
							 author='$author',
							 dept='$dept',
							 title='$title',
							 journal='$journal',
							 issue='$issue',
							 isbn='$isbn',
							 impact='$impact',
							 ci='$ci',
							 doi='$doi',
							 month='$month',
							 year='$year',
							 other='$other'
							 WHERE id=$id");
if($sql_ins==true)
	echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
else
	$msg="Insert Error:".mysql_error();
	
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

	<center><h5>Journal Entry Form</h5></center>
  	
  		<?php
  		if ($opr!="upd") {
  		?>	
		<form method="POST">
  		
  		<input type="text" name="author" placeholder="Author Name" required>
  		Department: <select class="browser-default" name="dept" required>
		<option disabled>Department</option>
		<option value="CSE">CSE</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="MECH">MECH</option>
		<option value="CIVIL">CIVIL</option>
		<option value="IT">IT</option>
		</select><br>
  		<input type="text" name="title" placeholder="Title of Paper">
  		<input type="text" name="journal" placeholder="Journal & Publisher Name">
  		<input type="text" name="issue" placeholder="Vol,Issue,Page No,Date">
  		<input type="text" name="isbn" placeholder="ISBN / ISSN No.">
  		<input type="text" name="impact" placeholder="Impact Factor">
  		<input type="text" name="ci" placeholder="CI">
  		<input type="text" name="doi" placeholder="DOI">
  		<div class="col s4">
  		<select class="browser-default" name="month">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?></select>
    	</div>  		
  		
		
		<div class="col s4">
  		<select class="browser-default" name="year">
    	<option>Year</option>
    	<?php
		for($i=2014;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>  		
  		 		
  		<textarea name="other" cols="23" class="form-control" rows="3" placeholder='Other Information'></textarea><br>
		<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
		<input type="reset" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
		</form>
		
        <?php 
        }
        else {
		?>
  		<?php
		$result = mysql_query("SELECT * FROM journals WHERE id='$id'");
		while($row = mysql_fetch_array($result)){
			$name = $row['author'];
			$title = $row['title'];
			$journal = $row['journal'];
			$issue = $row['issue'];
			$isbn = $row['isbn'];
			$impact = $row['impact'];
			$ci = $row['ci'];
			$doi = $row['doi'];
			$other = $row['other'];
		}
		?>
		
		<form method="POST">
  		<input type="text" name="author" placeholder="<?php echo $name; ?>" value="<?php echo $name; ?>" required>
  		Department: <select class="browser-default" name="dept" required>
		<option disabled>Department</option>
		<option value="CSE">CSE</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="MECH">MECH</option>
		<option value="CIVIL">CIVIL</option>
		<option value="IT">IT</option>
		</select><br>
  		<input type="text" name="title" placeholder="<?php echo $title; ?>" value="<?php echo $title; ?>">
  		<input type="text" name="journal" placeholder="<?php echo $journal; ?>" value="<?php echo $journal; ?>">
  		<input type="text" name="issue" placeholder="<?php echo $issue; ?>" value="<?php echo $issue; ?>">
  		<input type="text" name="isbn" placeholder="<?php echo $isbn; ?>" value="<?php echo $isbn; ?>"> 
  		<input type="text" name="impact" placeholder="<?php echo $impact; ?>" value="<?php echo $impact; ?>">
  		<input type="text" name="ci" placeholder="CI" value="<?php echo $ci; ?>">
  		<input type="text" name="doi" placeholder="DOI" value="<?php echo $doi; ?>">
  		<div class="col s4">
  		<select class="browser-default" name="month">
    	<option>Month</option>
    	<?php
           $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
           $i=0;
           foreach($mm as $mon){
           $i++;
           echo"<option value='$i'> $mon</option>";		
           }
        ?></select>
    	</div>  		
  		
		
		<div class="col s4">
  		<select class="browser-default" name="year">
    	<option>Year</option>
    	<?php
		for($i=2014;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>  		
  		 		
  		<textarea name="other" cols="23" class="form-control" rows="3" placeholder='<?php echo $other; ?>' value="<?php echo $other; ?>"></textarea><br>
		<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
		<input type="reset" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
		</form>
		<?php
		}
 		?>

        
      	
  	
</body>
</html>