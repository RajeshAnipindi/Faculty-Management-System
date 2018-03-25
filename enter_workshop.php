<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$workshop=$_POST['workshop'];
	$venue=$_POST['venue'];
	$from=$_POST['sty']."-".$_POST['stm']."-".$_POST['std'];
	$to=$_POST['endy']."-".$_POST['endm']."-".$_POST['endt'];

	


	$now = strtotime($from);
	$your_date = strtotime($to);
	$datediff = $your_date - $now;
	$days=round($datediff / (60 * 60 * 24));
	$days=$days+1;

$sql_ins=mysql_query("INSERT INTO workshops 
						VALUES(
							NULL,
							'$ses_email',
							'$workshop',
							'$venue',
							'$from',
							'$to',
							'$days'
							)
					");
if($sql_ins==true)
echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Workshop Inserted Successfully... !"
                . "</span>"
                . "</div>";	
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	
	$workshop=$_POST['workshop'];
	$venue=$_POST['venue'];
	$from=$_POST['sty']."-".$_POST['stm']."-".$_POST['std'];
	$to=$_POST['endy']."-".$_POST['endm']."-".$_POST['endt'];

	


	$now = strtotime($from);
	$your_date = strtotime($to);
	$datediff = $your_date - $now;
	$days=round($datediff / (60 * 60 * 24));
	$days=$days+1;
	
	$sql_update=mysql_query("UPDATE workshops SET
							workshop='$workshop',
							venue='$venue',
							start='$from',
							endd='$to',
							days='$days'
						WHERE id=$id

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

	<center><h5>Workshop Entry Form</h5></center>
  	<form method="POST">
  		<input type="text" name="workshop" placeholder="Workshop Title">
  		<input type="text" name="venue" placeholder="Enter Venue Here">
  		

  	<label>Start Date</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="std">
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
    	<select class="browser-default" name="stm">
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
  		<select class="browser-default" name="sty">
    	<option>Year</option>
    	<?php
		for($i=1990;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>

    	<label>End Date</label>
  	<div class="row">
  	<div class="col s4">
    	  	<select class="browser-default" name="endt">
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
    	<select class="browser-default" name="endm">
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
  		<select class="browser-default" name="endy">
    	<option>Year</option>
    	<?php
		for($i=1990;$i<=2018;$i++){	
		echo"<option value='$i'>$i</option>";
		}
		?>
    	</select>
    	</div>
	  		<br><br>
	  		<br><br>

  	<?php
  		if ($opr!="upd") {
  		?>	
		<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
        <?php 
        }
        else {
		?>
  		<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
		<?php
		}
 		?>  	

 		<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
  	</form>

</body>
</html>