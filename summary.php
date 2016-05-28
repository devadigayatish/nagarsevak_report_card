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


<div id="pie-charts" style="width: 1050px; height: 400px;">
<!-- ==============================pie chart 1 ========================================= -->

<div id="chart1" style="width: 500px; height: 400px; float: left;margin-top: 10px;">
<?php
    //include database connection
    require_once('includes/db_connection.php');
    // $q = intval($_POST['z']);
    // print_r($q);
    //query all records from the database
    $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` WHERE Prabhag_No ='35A' GROUP BY Code ORDER BY `Amount` DESC ";
    //execute the query
    $result = mysqli_query($con,$query);
 
    //get number of rows returned
    $num_results = $result->num_rows;

    $Details_of_work = array();
    $Amount = array();
    
    for($i=0; $i<$num_results;$i++)
    {
        $row = mysqli_fetch_assoc($result);
    
        $Details_of_work[$i] = $row['Details_Of_Work'];
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
<div id="visualization1" style="width: 450px; height: 400px; float: left;"></div>
<!-- load api -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
//load package
google.load('visualization1', '1', {packages: ['corechart']});
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
new google.visualization.PieChart(document.getElementById('visualization1')).
draw(data, {title:"Top 7 Expenditures :"});
}
google.setOnLoadCallback(drawVisualization);
</script>
</div>
<!-- ===================================pie chart 2====================================================== -->
<div id="chart2" style="width: 500px; height: 400px; float: right;margin-top: 10px;">
<?php
    //include database connection
    require_once('includes/db_connection.php');

    //query all records from the database
    $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` WHERE Prabhag_No ='35B' GROUP BY Code ORDER BY `Amount` DESC ";
    //execute the query
    $result = mysqli_query($con,$query);
 //print_r($result);
 
    //get number of rows returned
    $num_results = $result->num_rows;

    $Details_of_work = array();
    $Amount = array();
    
    for($i=0; $i<$num_results;$i++)
    {
        $row = mysqli_fetch_assoc($result);
    
        $Details_of_work[$i] = $row['Details_Of_Work'];
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
<div id="visualization" style="float : right; width: 450px; height: 400px;"></div>
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
draw(data, {title:"Top 7 Expenditures :"});
}
google.setOnLoadCallback(drawVisualization);
</script>

</div>

</div>


<?php
  include'footer.php';
?>

</html>