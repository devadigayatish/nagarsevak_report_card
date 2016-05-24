
<!-- where the chart will be rendered -->
<div id="visualization" style="width: 500px; height: 400px;"></div>



<?php
//include database connection
//$q = intval($_GET['z']);
//print_r($q);
$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");

//$prabhag_num = $q."A";
//print_r($prabhag_num);
//query all records from the database
$query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` WHERE Prabhag_No = '21B'
GROUP BY Code ORDER BY `Amount` DESC ";
//print_r($query);
//execute the query
$result = mysqli_query($con,$query );

 //get number of rows returned

$num_results = $result->num_rows;
//print_r($num_results);
$Details_of_work = array();
$Amount = array();
for($i=0; $i<$num_results;$i++)
{
	$row = mysqli_fetch_assoc($result);
	
	$Details_of_work[$i] = $row['Details_Of_Work'];
	$Amount[$i] = $row['Amount'];
}
//print_r($Details_of_work);
//print_r($Amount);
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

//print_r($chart_array);
mysqli_close($con);
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
draw(data, {title:"Pie Chart for 2012 to 2016"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<!-- <?php
//mysqli_close($con);
?> -->
