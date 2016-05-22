<?php
//include database connection
$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");

//query all records from the database
$query = "SELECT DOW ,SUM(Amount) AS Amount FROM `finaltable` WHERE Prabhag_No ='21B' GROUP BY Code ORDER BY `Amount` DESC ";
//execute the query
$result = mysqli_query($con,$query );

 //get number of rows returned

$num_results = $result->num_rows;

$Details_of_work = array();
$Amount = array();
for($i=0; $i<$num_results;$i++){
	$row = mysqli_fetch_assoc($result);
	
	$Details_of_work[$i] = $row['DOW'];
	$Amount[$i] = $row['Amount'];

}

$combine_array = array_combine($Details_of_work, $Amount);
//print_r($combine_array);
 
$total_Amount = array_sum($Amount);
//print_r($total_Amount);
//$perc = array();
// for($i=0;$i<=6;$i++)
// {
// //$persentage = (round($Amount[$i]/$total_Amount,4) * 100);
// //print_r($persentage);
// array_push($perc, $persentage);
// }

$remaining_values = array_slice($Amount, 7);
$remaining_total = array_sum($remaining_values);


//$other=(round($remaining_total/$total_Amount,4) * 100);
//print_r($other);
$chart_array = array(array());
for($i=0; $i<7; $i++){
	$chart_array[$i][0] = $Details_of_work[$i];
	$chart_array[$i][1] = $Amount[$i];
}
$chart_array[7][0] = "Others";
$chart_array[7][1] = $remaining_total;
//print_r($chart_array);

for($i=0; $i<=7; $i++){
	echo "['{$chart_array[$i][0]}', {$chart_array[$i][1]}],";
}


mysqli_close($con);
?>