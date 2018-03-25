<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM workshop_tbl WHERE ss_id=$id");
	if($del_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />

<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
</head>

<body>
<div style="padding-top: 10%;color: white;">
        <form method="post">
            <input type="text" name="searchtxt" placeholder="Search name.." /><br>
            <div class="row center">
            	<div class="col-sm-6">
            	          	
            <input type="submit" class="btn btn-primary btn-large" value="Search"/></div><br>
            
        </div>
        </form>

    <?php 
		if(isset($_POST['searchtxt'])){
				$key=$_POST['searchtxt'];
	
echo '<div class="row center">
    <a href="generatecsv.php?export=workshops&key='.$key.'" class="btn btn-primary btn-large"/>Export As Excel</a>
    </div>
';	
						
		}
		else{
echo '<div class="row center">
    <a href="generatecsv.php?export=workshops&key=all" class="btn btn-primary btn-large"/>Export As Excel</a>
    </div>
';	
		
		}
		?>


    </div><br><br>
    
<br />
<table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
            <th>S.No</th>
            <th>Faculty</th>
            <th>Name of the Workshop</th>
            <th>Venue</th>
            <th>Started</th>
            <th>Ended</th>
            <th>No.Of Days</th>
                       
      	</tr>
        </thead>
        <?php
			 $key="";
			if(isset($_POST['searchtxt']))
				$key=$_POST['searchtxt'];
			
			if($key !="")
				$sql_sel=mysql_query("SELECT * FROM workshops WHERE email like '%$key%' OR workshop like '%$key%' OR venue like '%$key%' ");
			else
		 $sql_sel=mysql_query("SELECT * FROM workshops");
			 
			 $i=0;
			while($row=mysql_fetch_array($sql_sel)){
				$i++;
			?>	 
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['workshop'];?></td>
				<td><?php echo $row['venue'];?></td>
				<td><?php echo $row['start'];?></td>
				<td><?php echo $row['endd'];?></td>
				<td><?php echo $row['days'];?></td>
                
			</tr>
<?php
} 
?>   
</table>
</body>
</html>