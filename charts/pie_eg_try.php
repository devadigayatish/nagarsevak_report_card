<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Pie Chart Demo (Google VAPI) - http://codeofaninja.com/</title>
</head>
<body style="font-family: Arial;border: 0 none;">
<!-- where the chart will be rendered -->
<div id="visualization" style="width: 600px; height: 400px;"></div>



<?php
//include database connection
$q = intval($_GET['z']);
$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");

$prabhag_num = $q."A";

//query all records from the database
$query = "SELECT DOW ,SUM(Amount) AS Amount FROM `finaltable` WHERE Prabhag_No ='".$prabhag_num."' GROUP BY Code ORDER BY `Amount` DESC ";
//execute the query
$result = mysqli_query($con,$query );

 //get number of rows returned

$num_results = $result->num_rows;

$Details_of_work = array();
$Amount = array();
for($i=0; $i<$num_results;$i++)
{
	$row = mysqli_fetch_assoc($result);
	
	$Details_of_work[$i] = $row['DOW'];
	$Amount[$i] = $row['Amount'];
}

$combine_array = array_combine($Details_of_work, $Amount);
$total_Amount = array_sum($Amount);
$remaining_values = array_slice($Amount, 7);
$remaining_total = array_sum($remaining_values);
$chart_array = array(array());
for($i=0; $i<7; $i++)
{
	$chart_array[$i][0] = $Details_of_work[$i];
	$chart_array[$i][1] = $Amount[$i];
}
$chart_array[7][0] = "Others";
$chart_array[7][1] = $remaining_total;
?>

<!-- =================================================================================================== -->
<!-- load api -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
//load package
google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Ratings'],
<?php





for($i=0; $i<=7; $i++){
	echo "['{$chart_array[$i][0]}', {$chart_array[$i][1]}],";
}


?>
]);

//=============================================================================
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization')).
draw(data, {title:"Tiobe Top Programming Languages for June 2012"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
mysqli_close($con);
?>
</body>
</html>