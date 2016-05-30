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
$query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC";
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
draw(data, {title:"Amount spent on each type of work"});
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
$query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Female' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";
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

echo "['{$Details_Of_Work}', {$Amount}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.PieChart(document.getElementById('visualization3')).
draw(data, {title:" Female : Amount spent on each type of work"});
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
$query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Male' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";
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
draw(data, {title:"Male : Amount spent on each type of work"});
}
google.setOnLoadCallback(drawVisualization);
</script>
<?php
}else{
echo "No programming languages found in the database.";
}
?>

<!-- ============================================================================================== -->
<div id="visualization5" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>

<?php
$query = "SELECT Party ,SUM(Avg_Attendance) AS Avg_Attendance, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";
//execute the query
$result = mysqli_query($con,$query );

$Party = array();
$final_attendance = array();

$num_results = $result->num_rows;
for($i=0; $i<$num_results;$i++)
    {
        $row = mysqli_fetch_assoc($result);
    	
        //$Details_of_work[$i] = $row['Party'];
        $Party[$i] = $row['Party'];
        $final_attendance[$i] = round($row['Avg_Attendance']/$row['Total_Count'],2);
      
    }
    $print_array = array(array());
    for($i=0; $i<$num_results; $i++)
    {
        $print_array[$i][0] = $Party[$i];
        $print_array[$i][1] = $final_attendance[$i];
    } 
?>


<!-- load api -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
//load package
google.load('visualization5', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Avg Attendance',],
<?php

for($i=0; $i<$num_results; $i++){
  echo "['{$print_array[$i][0]}', {$print_array[$i][1]}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.ColumnChart(document.getElementById('visualization5')).
draw(data, {title:" Party wise Average Attendance"});
}
google.setOnLoadCallback(drawVisualization);
</script>


<!-- ====================================================================================================== -->
<div id="visualization6" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">bar chart 1<br>Party wise avg_attendance</div>

<?php
$query = "SELECT Party ,SUM(Total_Questions) AS Total_Questions, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";
//execute the query
$result = mysqli_query($con,$query );

$Party = array();
$final_questions = array();

$num_results = $result->num_rows;
for($i=0; $i<$num_results;$i++)
    {
        $row = mysqli_fetch_assoc($result);
    	
        //$Details_of_work[$i] = $row['Party'];
        $Party[$i] = $row['Party'];
        $final_questions[$i] = $row['Total_Questions'];
      
    }
    $print_array = array(array());
    for($i=0; $i<$num_results; $i++)
    {
        $print_array[$i][0] = $Party[$i];
        $print_array[$i][1] = $final_questions[$i];
    } 
?>


<!-- load api -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
//load package
google.load('visualization6', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
function drawVisualization() {
// Create and populate the data table.
var data = google.visualization.arrayToDataTable([
['PL', 'Total Questions',],
<?php

for($i=0; $i<$num_results; $i++){
  echo "['{$print_array[$i][0]}', {$print_array[$i][1]}],";
}
?>
]);
// Create and draw the visualization.
new google.visualization.ColumnChart(document.getElementById('visualization6')).
draw(data, {title:" Party wise Total Questions asked."});
}
google.setOnLoadCallback(drawVisualization);
</script>

<!-- ====================================================================================================== -->

<div id="visualization7" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>


<!-- ================================================================================================== -->

<div id="visualization8" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;"></div>


<!-- ================================================================================================== -->

<div id="visualization9" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;">bar chart 5<br>Attendance -> 0 to 20%, 21 to 40%, .....</div>

<div id="visualization10" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">bar chart 6<br>Questions asked -> 0 to 25, 26 to 50, .....</div>


<div id="visualization11" style="padding: 16px; border: 16px solid gray; width: 537px; height: 350px; float: left;">

<?php
 	echo"<span><p align='center'><strong>MAX AVERAGE ATTENDANCE</strong></p></span><br>";

    $sql_M = "SELECT Prabhag_No , Nagarsevak_Name , Avg_Attendance ,URL ,Party FROM nagarsevak WHERE Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'Male')";
    $result_M = mysqli_query($con,$sql_M);
    $row_M = mysqli_fetch_array($result_M);
    
    //fetch tha data from the database
    echo "<div class=''><img width='70' align='left' style='margin-left: 35px;' src=".SITE_URL.'assets/'. $row_M['URL']." ></div>" ;
    
    $sql_F = "SELECT Prabhag_No , Nagarsevak_Name , Avg_Attendance ,URL ,Party FROM nagarsevak WHERE Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'Female')";
    $result_F = mysqli_query($con,$sql_F);
    $row_F = mysqli_fetch_array($result_F);

    echo "<div class=''><img width='70' align='right' style='margin-right: 35px;' src=".SITE_URL.'assets/'. $row_F['URL']." ></div>" ;

	echo "<br><br><br><br><br>";
    
    echo "<div align='center' style='width: 150px; float : left'>";
    $name_M = "". $row_M['Nagarsevak_Name']."";
    echo wordwrap($name_M,20,"<br>\n");
    echo "</div>";

    
    echo "<div align='center' style='width: 150px; float : right'>";
    $name_F = "". $row_F['Nagarsevak_Name']."";
    echo wordwrap($name_F,20,"<br>\n");
    echo "</div>";

    echo "<br><br><br>";

    echo "<table align='left' width='200' border='1'>";
    //fetch tha data from the database
    echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
    echo "<tr><td>Avg Attendance:</td><td>" . $row_M['Avg_Attendance']."</td></tr>";
    echo "</table>";
    

    echo "<table align='right' width='200' border='1'>";
    //fetch tha data from the database
    echo "<tr><td>Prabhag No:</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_F['Party']."</td></tr>";
    echo "<tr><td>Avg Attendance:</td><td>" . $row_F['Avg_Attendance']."</td></tr>";
    echo "</table>";
 ?>
</div>   

<!-- ======================================================================================= -->
<div id="visualization12" style="padding: 16px; border: 16px solid gray; width: 537px; height: 350px; float: right;">
	
<?php
    echo"<span><p align='center'><strong>MAX TOTAL QUESTIONS ASKED</strong></p></span><br>";
    $sql_M = "SELECT Prabhag_No , Nagarsevak_Name , Total_Questions ,URL ,Party FROM nagarsevak WHERE Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'Male')";
    $result_M = mysqli_query($con,$sql_M);
    $row_M = mysqli_fetch_array($result_M);
    
    //fetch tha data from the database
    echo "<div class=''><img width='70' align='left' style='margin-left: 35px;' src=".SITE_URL.'assets/'. $row_M['URL']." ></div>" ;
    
    $sql_F = "SELECT Prabhag_No , Nagarsevak_Name , Total_Questions ,URL ,Party FROM nagarsevak WHERE Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'Female')";
    $result_F = mysqli_query($con,$sql_F);
    $row_F = mysqli_fetch_array($result_F);

    echo "<div class=''><img width='70' align='right' style='margin-right: 35px;' src=".SITE_URL.'assets/'. $row_F['URL']." ></div>" ;

	echo "<br><br><br><br><br>";
    
    echo "<div align='center' style='width: 150px; float : left'>";
    $name_M = "". $row_M['Nagarsevak_Name']."";
    echo wordwrap($name_M,20,"<br>\n");
    echo "</div>";

    
    echo "<div align='center' style='width: 150px; float : right'>";
    $name_F = "". $row_F['Nagarsevak_Name']."";
    echo wordwrap($name_F,20,"<br>\n");
    echo "</div>";

    echo "<br><br><br>";

    echo "<table align='left' width='200' border='1'>";
    //fetch tha data from the database
    echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
    echo "<tr><td>Total Questions:</td><td>" . $row_M['Total_Questions']."</td></tr>";
    echo "</table>";
    

    echo "<table align='right' width='200' border='1'>";
    //fetch tha data from the database
    echo "<tr><td>Prabhag No:</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_F['Party']."</td></tr>";
    echo "<tr><td>Total Questions:</td><td>" . $row_F['Total_Questions']."</td></tr>";
    echo "</table>";
 ?>


</div>

<div id="visualization13" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"><br>


</div>
<div id="visualization14" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">stats<br></div>

<!-- ====================================================================================================== -->

</div>



<?php
  include'footer.php';
?>

</html>