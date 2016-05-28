<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
?>
<html>
<head>
<title>Summary</title>
<link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/map.css" />
<link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/styles.css" />
<link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/name_box.css" />
<link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/popup.css" />
</head>

<?php
  include'header.php';
?>

<!-- =========================================================================================== -->
<div id="pie-charts">

<div id="visualization" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>

<?php
//include database connection
 

//query all records from the database
$query = "SELECT n.Party, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No GROUP BY n.Party ";
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

echo "['{$Party}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization')).
draw(data, {title:"Amount spent by each Party"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}
?>
<!-- ============================================================================================== -->

<div id="visualization2" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;"></div>
<?php
//include database connection
 

//query all records from the database
$query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC
";
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
google.load('visualization2', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Ratings'],
<?php
while( $row = mysqli_fetch_assoc($result) ){

extract($row);

echo "['{$Details_Of_Work}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization2')).
draw(data, {title:"Amount spent on each work code"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}
?>


<!-- ====================================================================================================== -->


<div id="visualization3" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>

<?php
//include database connection
 
//query all records from the database
$query = "SELECT n.Party, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No GROUP BY n.Party ";
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
google.load('visualization3', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Ratings'],
<?php
while( $row = mysqli_fetch_assoc($result) ){

extract($row);

echo "['{$Party}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization3')).
draw(data, {title:" Female : Amount spent on each work code"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}
?>

<!-- ====================================================================================================== -->

<div id="visualization4" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;"></div>
<?php
//include database connection
 

//query all records from the database
$query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC
";
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
google.load('visualization4', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Ratings'],
<?php
while( $row = mysqli_fetch_assoc($result) ){

extract($row);

echo "['{$Details_Of_Work}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization4')).
draw(data, {title:"Male : Amount spent on each work code"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}
?>


<div id="visualization5" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;">bar chart 1<br>Party wise avg_attendance</div>


<!-- ====================================================================================================== -->

<div id="visualization6" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">bar chart 2<br>Party wise questions asked.</div>

<div id="visualization7" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;">bar chart 3<br>Party wise Criminal charges.</div>


<div id="visualization8" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">bar chart 4<br>Year wise top 5 work (codes)</div>

<div id="visualization9" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;">bar chart 5<br>Attendance -> 0 to 20%, 21 to 40%, .....</div>

<div id="visualization10" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">bar chart 6<br>Questions asked -> 0 to 25, 26 to 50, .....</div>

<div id="visualization11" style="padding: 16px; border: 16px solid gray;width: 1075px; height: 350px; float: left;">stats<br></div>
<div id="visualization12" style="padding: 16px; border: 16px solid gray;width: 1075px; height: 350px; float: left;">stats<br></div>
<div id="visualization13" style="padding: 16px; border: 16px solid gray;width: 1075px; height: 350px; float: left;">stats<br></div>

<!-- ====================================================================================================== -->

</div>



<?php
  include'footer.php';
?>

</html>