<!-- 
	File:			summary.php
	Date:		    03-06-2016

	This script defines an HTML form to load some pie-charts , bar charts and stats.
-->
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
<script src="<?php echo SITE_URL ?>assets/js/lib/jsapi.js"></script>
</head>
<?php
  include'header.php';
?>
<!-- =========================================================================================== -->
<div id="pie-charts">
<div id="visualization" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>
	 <?php
	 $query = "SELECT n.Party, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No GROUP BY n.Party ";       //query all records from the database
	 $result = mysqli_query($con,$query );                   //execute the query
	 $num_results = $result->num_rows;                       //get number of rows returned
	 if( $num_results > 0)
	 { 
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});            //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
	 	var data = google.visualization.arrayToDataTable
	 	([
	 		['PL', 'Ratings'],
	 		<?php
	 		while( $row = mysqli_fetch_assoc($result) )
	 		{
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
	 }
	 else
	 {
		 echo "No related data found in the database.";
	 }
	 ?>
<!-- ============================================================================================== -->
<div id="visualization2" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;"></div>
	 <?php
	 $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC";                               //query all records from the database
	 $result = mysqli_query($con,$query );            //execute the query
	 $num_results = $result->num_rows;                //get number of rows returned
	 if( $num_results > 0)
	 { 
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});      //load package
</script>
<script type="text/javascript">
	 function drawVisualization()
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Ratings'],
			<?php
			while( $row = mysqli_fetch_assoc($result) )
			{
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
	 }
	 else
	 {
		echo "No related data found in the database.";
	 }
	 ?>
<!-- ====================================================================================================== -->
<div id="visualization3" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>
	 <?php	 
	 $query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Female' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";                           //query all records from the database
	 $result = mysqli_query($con,$query );         //execute the query
	 $num_results = $result->num_rows;             //get number of rows returned
	 if( $num_results > 0){ 
	 ?>
<script type="text/javascript">
	 //load package
	 google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Ratings'],
			<?php
			while( $row = mysqli_fetch_assoc($result) )
			{
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
	 }
	 else
	 {
		echo "No programming languages found in the database.";
	 }
	 ?>
<!-- ====================================================================================================== -->
<div id="visualization4" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;"></div>
	 <?php
	 $query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Male' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";                          //query all records from the database
	 $result = mysqli_query($con,$query );        //execute the query
	 $num_results = $result->num_rows;            //get number of rows returned
 	 if( $num_results > 0)
 	 { 
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});         //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Ratings'],
			<?php
			while( $row = mysqli_fetch_assoc($result) )
			{
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
	 }
	 else
	 {
		echo "No related data found in the database.";
	 }
	 ?>
<!-- ============================================================================================== -->
<div id="visualization5" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;"></div>
	 <?php
	 $query = "SELECT Party ,SUM(Avg_Attendance) AS Avg_Attendance, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";             //query all records from the database
	 
	 $result = mysqli_query($con,$query );       //execute the query
	 $Party = array();
	 $final_attendance = array();
	 $num_results = $result->num_rows;
	 for($i=0; $i<$num_results;$i++)
     {
     	$row = mysqli_fetch_assoc($result);
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
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});     //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Avg Attendance',],
			<?php
			for($i=0; $i<$num_results; $i++)
			{
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
	 $query = "SELECT Party ,SUM(Total_Questions) AS Total_Questions, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";            //query all records from the database
	 
	 $result = mysqli_query($con,$query );      //execute the query
	 $Party = array();
	 $final_questions = array();
	 $num_results = $result->num_rows;
	 for($i=0; $i<$num_results;$i++)
     {
        $row = mysqli_fetch_assoc($result);
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
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});       //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Total Questions',],
			<?php
			for($i=0; $i<$num_results; $i++)
			{
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
	 <?php
	 $query = "SELECT Party, COUNT(Party) AS count FROM `nagarsevak` WHERE Criminal_Records = 'Yes' GROUP BY Party ";                           //query all records from the database
	 $result = mysqli_query($con,$query );  //execute the query
	 $num_results = $result->num_rows;      //get number of rows returned
	 if( $num_results > 0){ 
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});      //load package
</script>
<script type="text/javascript">
	 function drawVisualization()
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'Count'],
			<?php
			while( $row = mysqli_fetch_assoc($result) )
			{
				extract($row);
				echo "['{$Party}', {$count}],";		
			}
			?>
		]);
		// Create and draw the visualization.
		new google.visualization.ColumnChart(document.getElementById('visualization7')).
		draw(data, {title:"Partywise Criminal Charges"});
	 }
	 google.setOnLoadCallback(drawVisualization);
</script>
	 <?php
	 }
	 else
	 {
		echo "No related data found in the database.";
	 }
	 ?>
<!-- ================================================================================================== -->
<div id="visualization8" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">
	 <?php
	 $query = "SELECT Details_Of_Work FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC ";

	 $result = mysqli_query($con,$query );           //execute the query
	 $Details_of_work = array();
	 for ($i=0; $i <5 ; $i++)
	 { 
		$row = mysqli_fetch_assoc($result);
		$Details_of_work[$i] = $row['Details_Of_Work'];
	 }
 	 $query1 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[0]."' GROUP BY Year ";
	 $query2 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[1]."' GROUP BY Year ";
	 $query3 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[2]."' GROUP BY Year ";
	 $query4 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[3]."' GROUP BY Year ";
	 $query5 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[4]."' GROUP BY Year ";

	 $result1 = mysqli_query($con,$query1 );              //execute the queries
	 $result2 = mysqli_query($con,$query2 );
	 $result3 = mysqli_query($con,$query3 );
	 $result4 = mysqli_query($con,$query4 );
	 $result5 = mysqli_query($con,$query5 );

	 $Amount1 = array();
	 for ($i=0; $i <5 ; $i++)
	 { 
		$row1 = mysqli_fetch_assoc($result1);
		$Amount1[$i] = $row1['Amount'];
	 }
	 $Amount2 = array();
	 for ($i=0; $i <5 ; $i++) 
	 { 
		$row2 = mysqli_fetch_assoc($result2);
		$Amount2[$i] = $row2['Amount'];
	 }
     $Amount3 = array();
	 for ($i=0; $i <5 ; $i++) 
	 { 
		$row3 = mysqli_fetch_assoc($result3);
		$Amount3[$i] = $row3['Amount'];
	 }
	 $Amount4 = array();
	 for ($i=0; $i <5 ; $i++) 
	 { 
		$row4 = mysqli_fetch_assoc($result4);
		$Amount4[$i] = $row4['Amount'];
	 }
	 $Amount5 = array();
	 for ($i=0; $i <5 ; $i++) 
	 { 
		$row5 = mysqli_fetch_assoc($result5);
		$Amount5[$i] = $row5['Amount'];
	 }

	 $final_array = array(array());
	 for($i=0; $i <4 ; $i++)
	 {
 		$final_array[$i][0]= $Amount1[$i];
 		$final_array[$i][1]= $Amount2[$i];
 		$final_array[$i][2]= $Amount3[$i];
 		$final_array[$i][3]= $Amount4[$i];
 		$final_array[$i][4]= $Amount5[$i];
	 }
	 ?>

<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});      //load package
</script>
<script type="text/javascript">
	 function drawVisualization()
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			<?php
			echo "['Year', '".$Details_of_work[0]."' , '".$Details_of_work[1]."' , '".$Details_of_work[2]."' , '".$Details_of_work[3]."' , '".$Details_of_work[4]."'],";
    		for($i=0; $i<1; $i++)
    		{
    			echo "['2012-2013', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
    		}
    		for($i=1; $i<2; $i++)
    		{
    			echo "['2013-2014', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
    		}
    		for($i=2; $i<3; $i++)
    		{
    			echo "['2014-2015', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
    		}
    		for($i=3; $i<4; $i++)
    		{
    			echo "['2015-2016', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
    		}

			?>
		]);
		// Create and draw the visualization.
		new google.visualization.ColumnChart(document.getElementById('visualization8')).
		draw(data, {title:"Top 5 Works per Year"});
	 }
	 google.setOnLoadCallback(drawVisualization);
</script>
</div>
<!-- ================================================================================================== -->
<div id="visualization9" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: left;">
	 <?php
	 $query_0to25 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 0 AND 25 ";
	 $query_26to50 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 26 AND 50 ";
	 $query_51to75 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 51 AND 75 ";
	 $query_76to100 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 76 AND 100 ";
	 
	 $result_0to25 = mysqli_query($con,$query_0to25 );           //execute the query
	 $result_26to50 = mysqli_query($con,$query_26to50 );
	 $result_51to75 = mysqli_query($con,$query_51to75 );
	 $result_76to100 = mysqli_query($con,$query_76to100 );

	 $row_0to25 = mysqli_fetch_assoc($result_0to25);
	 $row_26to50 = mysqli_fetch_assoc($result_26to50);
	 $row_51to75 = mysqli_fetch_assoc($result_51to75);
	 $row_76to100 = mysqli_fetch_assoc($result_76to100);

 	 $print_array_0 = array('0' => '0-25', '1' => '26-50' , '2' => '51-75' , '3' =>'76-100');
 	 $print_array_1= array('0' => $row_0to25['COUNT(Avg_Attendance)'] ,'1' =>$row_26to50['COUNT(Avg_Attendance)'] ,'2' => $row_51to75['COUNT(Avg_Attendance)'] , '3' => $row_76to100['COUNT(Avg_Attendance)']); 

     $final_array= array(array());
 	 for ($i=0; $i <4 ; $i++) 
 	 { 
     	$final_array[$i][0] = $print_array_0[$i];
     	$final_array[$i][1] = $print_array_1[$i];
	 }
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});        //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
		var data = google.visualization.arrayToDataTable
		([
			['PL', 'COUNT'],
			<?php
    		for($i=0; $i<4; $i++)
    		{
    			echo "['{$final_array[$i][0]}', {$final_array[$i][1]}],";
    		}
			?>
		]);
		// Create and draw the visualization.
		new google.visualization.ColumnChart(document.getElementById('visualization9')).
		draw(data, {title:"No. of nagarsevak's in each attendance range"});
	 }
	 google.setOnLoadCallback(drawVisualization);
</script>
</div>
<!-- ================================================================================================== -->
<div id="visualization10" style="padding: 16px; border: 16px solid gray;width: 537px; height: 350px; float: right;">
	 <?php
	 //query all records from the database
	 $query_0to5 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 0 AND 5 ";
	 $query_6to10 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 6 AND 10 ";
	 $query_11to15 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 11 AND 15 ";
	 $query_16to100 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 16 AND 100 ";
	 
	 $result_0to5 = mysqli_query($con,$query_0to5 );       //execute the query
	 $result_6to10 = mysqli_query($con,$query_6to10 );
	 $result_11to15 = mysqli_query($con,$query_11to15 );
	 $result_16to100 = mysqli_query($con,$query_16to100 );

	 $row_0to5 = mysqli_fetch_assoc($result_0to5);
	 $row_6to10 = mysqli_fetch_assoc($result_6to10);
	 $row_11to15 = mysqli_fetch_assoc($result_11to15);
	 $row_16to100 = mysqli_fetch_assoc($result_16to100);
    
 	 $print_array_0 = array('0' => '0-5', '1' => '6-10' , '2' => '11-15' , '3' =>'16-100');
	 $print_array_1= array('0' => $row_0to5['COUNT(Total_Questions)'] ,'1' =>$row_6to10['COUNT(Total_Questions)'] ,'2' => $row_11to15['COUNT(Total_Questions)'] , '3' => $row_16to100['COUNT(Total_Questions)']); 

	 $final_array= array(array());
 	 for ($i=0; $i <4 ; $i++) 
 	 { 
     	$final_array[$i][0] = $print_array_0[$i];
     	$final_array[$i][1] = $print_array_1[$i];
	 }
	 ?>
<script type="text/javascript">
	 google.load('visualization', '1', {packages: ['corechart']});      //load package
</script>
<script type="text/javascript">
	 function drawVisualization() 
	 {
		// Create and populate the data table.
	 	var data = google.visualization.arrayToDataTable
	 	([
			['PL', 'COUNT'],
			<?php
    		for($i=0; $i<4; $i++)
    		{
    			echo "['{$final_array[$i][0]}', {$final_array[$i][1]}],";
    		}
			?>
		]);
		// Create and draw the visualization.
		new google.visualization.ColumnChart(document.getElementById('visualization10')).
		draw(data, {title:"No. of nagarsevak's in each question range"});
	 }
	 google.setOnLoadCallback(drawVisualization);
</script>
</div>
<!-- ================================================================================================= -->
<div id="visualization11" style="padding: 16px; border: 16px solid gray; width: 537px; height: 350px; float: left;">
<?php
 	echo"<span><p align='center'><strong>MAX AVERAGE ATTENDANCE</strong></p></span><br>";

    $sql_M = "SELECT Prabhag_No , Nagarsevak_Name , Avg_Attendance ,URL ,Party FROM nagarsevak WHERE Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'Male')";
    $result_M = mysqli_query($con,$sql_M);
    $row_M = mysqli_fetch_array($result_M);
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
    echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
    echo "<tr><td>Avg Attendance:</td><td>" . $row_M['Avg_Attendance']."</td></tr>";
    echo "</table>";
    
    echo "<table align='right' width='200' border='1'>";
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
    echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
    echo "<tr><td>Total Questions:</td><td>" . $row_M['Total_Questions']."</td></tr>";
    echo "</table>";
    
    echo "<table align='right' width='200' border='1'>";
    echo "<tr><td>Prabhag No:</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
    echo "<tr><td>Party:</td><td>" . $row_F['Party']."</td></tr>";
    echo "<tr><td>Total Questions:</td><td>" . $row_F['Total_Questions']."</td></tr>";
    echo "</table>";
?>
</div>
<!-- ====================================================================================================== -->
</div>
<?php
  include'footer.php';
?>
</html>