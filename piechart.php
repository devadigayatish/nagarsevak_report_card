
<!-- where the chart will be rendered -->
<?php
//include database connection
$q = intval($_GET['z']);
//print_r($q);

//MySQL Database Connect
include 'db_connection.php';

$prabhag_num = $q."A";
//print_r($prabhag_num);
//query all records from the database
$query = "SELECT DOW ,SUM(Amount) AS Amount FROM `finaltable` WHERE Prabhag_No = '".$prabhag_num."' 
GROUP BY Code ORDER BY `Amount` DESC ";

//execute the query
$result = mysqli_query($con,$query );
 //get number of rows returned
//print_r($result);
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
$chart_array[0][0] = "PL";
$chart_array[0][1] = "Amount";
for($i=1; $i<8; $i++)
{
	$chart_array[$i][0] = $Details_of_work[$i-1];
	$chart_array[$i][1] = intval($Amount[$i-1]);
}
$chart_array[8][0] = "Others";
$chart_array[8][1] = $remaining_total;
$abc = json_encode($chart_array);
echo "<div id='visualization' style='width: 500px; height: 400px;'></div>" ;
echo "<script type='text/javascript'>";

echo "google.load('visualization', '1', {packages: ['corechart']});";
echo "</script>";
echo "<script type='text/javascript'>";

//alert(chart_array);
echo "function drawVisualization() {";
echo "\n";
echo "var data = google.visualization.arrayToDataTable(";


//echo "['PL', 'Ratings'],['Benches', 701846.00],['', 525209.00],['', 396000.00],['Concretization', 369957.00],['', 200000.00],['Garden work', 200000.00],['Computers', 200000.00],['Others', 1742242]";
echo "\n";
echo "$abc";
//echo $chart_array;
echo ");";


echo "\n";
echo 'alert(data);';
//=============================================================================
// Create and draw the visualization.
echo "new google.visualization.PieChart(document.getElementById('visualization')).";
echo "\n";
echo "draw(data, {title:'Pie Chart'});";
echo "\n";
echo "}";
echo "\n";
echo "google.setOnLoadCallback(drawVisualization);";
echo "\n";
echo "</script>";
echo "\n";


//print_r($chart_array);
mysqli_close($con);
?>

<!-- =================================================================================================== -->

