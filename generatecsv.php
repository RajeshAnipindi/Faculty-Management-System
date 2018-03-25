<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("facultysystem",$conn);

if(isset($_GET['export']) && isset($_GET['key']))
{
	$table=$_GET['export'];
	if($table == 'journals'){
		
	$key=$_GET['key'];
	if($key == 'all'){
	$query = "SELECT * FROM $table";
		}
		else{
	$query = "SELECT * FROM $table WHERE  author  like '%$key%' OR dept like '%$key%' OR title like '%$key%' OR journal like '%$key%' OR issue like '%$key%' OR isbn like '%$key%' OR impact like '%$key%' OR ci like '%$key%' OR doi like '%$key%' OR month like '%$key%' OR year like '%$key%' ";
		}
	$result = mysql_query($query);
	$num_column = mysql_num_fields($result);		

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
	$csv_header .= '"' . mysql_field_name($result,$i) . '",';
}	
$csv_header .= "\n";

$csv_row ='';
$sno=0;
while($row = mysql_fetch_row($result)) {
	$sno = $sno+1;
	$csv_row .= '"' . $sno . '",';
	for($i=1;$i<$num_column;$i++) {
		$csv_row .= '"' . $row[$i] . '",';
	}
	$csv_row .= "\n";
	}
	
	}
	
	elseif ($table == 'workshops')
{
	$table=$_GET['export'];
	$key=$_GET['key'];
	if($key == 'all'){
	$query = "SELECT * FROM $table";
		}
		else{
	$query = "SELECT * FROM workshops WHERE  workshop like '%$key%' OR venue like '%$key%'";
		}
	$result = mysql_query($query);
	$num_column = mysql_num_fields($result);		

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
	$csv_header .= '"' . mysql_field_name($result,$i) . '",';
}	
$csv_header .= "\n";

$csv_row ='';
$sno=0;
while($row = mysql_fetch_row($result)) {
	$sno = $sno+1;
	$csv_row .= '"' . $sno . '",';
	for($i=1;$i<$num_column;$i++) {
		$csv_row .= '"' . $row[$i] . '",';
	}
	$csv_row .= "\n";
}
}
elseif ($table == 'faculties')
{
	$table=$_GET['export'];
	$key=$_GET['key'];
	if($key == 'all'){
	$query = "SELECT * FROM $table";
		}
		else{
	$query = "SELECT * FROM faculties WHERE  name  like '%$key%' OR email like '%$key%' OR phone like '%$key%' OR gender like '%$key%' OR dob like '%$key%' OR role like '%$key%' OR dept like '%$key%' OR degree like '%$key%' OR salary like '%$key%' OR married like '%$key%'";
		}
	$result = mysql_query($query);
	$num_column = mysql_num_fields($result);		

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
	$csv_header .= '"' . mysql_field_name($result,$i) . '",';
}	
$csv_header .= "\n";

$csv_row ='';
$sno=0;
while($row = mysql_fetch_row($result)) {
	$sno = $sno+1;
	$csv_row .= '"' . $sno . '",';
	for($i=1;$i<$num_column;$i++) {
		$csv_row .= '"' . $row[$i] . '",';
	}
	$csv_row .= "\n";
}
}
}
/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=exported.csv');
echo $csv_header . $csv_row;
exit;
?>
