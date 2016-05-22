

<!-- where the chart will be rendered -->


<?php


//include database connection
$q = intval($_GET['z']);
//print_r($q);
$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");

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

