<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM stu_score_tbl WHERE ss_id=$id");
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
		color:black;
	}
</style>
</head>

<body>
<div style="padding-top: 10%;color: white;">
        <form method="post">
            <input type="text" name="searchtxt" placeholder="Search Here.." /><br>
            <div class="row center">
            	<div class="col-sm-6">
            	          	
            <input type="submit" class="btn btn-primary btn-large" value="Search"/></div><br>
            
        </div>
        </form>

    <?php 
		if(isset($_POST['searchtxt'])){
				$key=$_POST['searchtxt'];
	
echo '<div class="row center">
    <a href="generatecsv.php?export=faculties&key='.$key.'" class="btn btn-primary btn-large"/>Export As Excel</a>
    </div>
';	
						
		}
		else{
echo '<div class="row center">
    <a href="generatecsv.php?export=faculties&key=all" class="btn btn-primary btn-large"/>Export As Excel</a>
    </div>
';	
		
		}
		?>
    
<br />
<table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>DOJ</th>
            <th>Address</th>
            <th>Role</th>
            <th>Dept</th>
            <th>Degree</th>
            <th>Salary</th>
            <th>Married</th>
            <th>Working Since</th>
      	</tr>
        </thead>
        <?php
			 $key="";
			if(isset($_POST['searchtxt']))
				$key=$_POST['searchtxt'];
			
			if($key !="")
				$sql_sel=mysql_query("SELECT * FROM faculties WHERE  name  like '%$key%' OR email like '%$key%' OR phone like '%$key%' OR gender like '%$key%' OR dob like '%$key%' OR role like '%$key%' OR dept like '%$key%' OR degree like '%$key%' OR salary like '%$key%' OR married like '%$key%'");
			else
		 $sql_sel=mysql_query("SELECT * FROM faculties");
			 
			 $i=0;
			while($row=mysql_fetch_array($sql_sel)){
				$i++;
			?>	 
			<tr>
                <td><?php echo $i;?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['dob'];?></td>
                <td><?php echo $row['doj'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['role'];?></td>
                <td><?php echo $row['dept'];?></td>
                <td><?php echo $row['degree'];?></td>
                <td><?php echo $row['salary'];?></td>
                <td><?php echo $row['married'];?></td>
                <td><?php echo $row['working_since'];?> Years</td>
			</tr>
<?php
} 
?>   
</table>
        
</body>
</html>