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
if( $num_results > 0){ 
?>


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
while( $row = mysqli_fetch_assoc($result) ){

extract($row);

echo "['{$DOW}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization')).
draw(data, {title:"Tiobe Top Programming Languages for June 2012"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}

mysqli_close($con);
?>
</body>
</html>