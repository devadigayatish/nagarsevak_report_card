<?php
/*
	This script read the data from "csv_data" table and insert into final table "work_details".
*/

require_once('./../includes/db_connection.php');                //connection
$filename    = PROJ_DIR.'information/work_code.csv';
$sql_for_truncate = "TRUNCATE TABLE codes ";
	if(!mysqli_query($con, $sql_for_truncate))
	{
    	die('Error : ' . mysqli_error($con));
	}
$file_pointer = fopen($filename,"r");    
$i=1;
while(! feof($file_pointer))
{
	$read_csv_file = fgetcsv($file_pointer);
	$row[$i]=array($read_csv_file[0], $read_csv_file[1]);
	$i++;
}

for ($j=1; $j <= sizeof($row) ; $j++) 
{ 
	$fieldVal_Work_Type = mysqli_real_escape_string($con,$row[$j][0]);
	$fieldVal_Code = mysqli_real_escape_string($con,$row[$j][1]);

	$sql_for_insert = "INSERT INTO codes (Work_Type,Code) VALUES('".$fieldVal_Work_Type."','".$fieldVal_Code."')";
			
	if(!mysqli_query($con, $sql_for_insert))
	{
		die('Error : ' . mysqli_error($con));
	}
}
fclose($file_pointer);
print "Inserted codes and its work types in codes table.\n ";
$sql_for_select_query = "SELECT Work_Type , Code FROM codes";
$result_for_select_query = mysqli_query($con,$sql_for_select_query);
$num_results = $result_for_select_query->num_rows;
$fieldVal1= array();
$fieldVal2= array();

for ($i=0; $i <$num_results ; $i++) 
{
	$row_for_select_query = mysqli_fetch_array($result_for_select_query);
	$fieldVal1[$i]= $row_for_select_query['Code'] ;
	$fieldVal2[$i]= $row_for_select_query['Work_Type'];
}
$Work_Against_Codes=array();

for ($i=0; $i <$num_results ; $i++) 
{

	$Work_Against_Codes[$fieldVal1[$i]] =  $fieldVal2[$i] ;
}

	$sql_for_select_all = "SELECT * FROM `csv_data` " ;
	$result_for_select_all = mysqli_query($con,$sql_for_select_all);
	$num_result_for_select_all = $result_for_select_all->num_rows;
	print "No. of rows in csv_data table is : ".$num_result_for_select_all."\n";

	$sql_for_select = "SELECT Year, Prabhag_No, Details_Of_Work ,SUM(Amount) AS Amount,Code FROM `csv_data` GROUP BY Prabhag_No, Year ,Code " ;
	$result_for_select = mysqli_query($con,$sql_for_select);
	$num_result_for_select = $result_for_select->num_rows;
	print "No. of rows after merging data according to codes in csv_data table is : ".$num_result_for_select."\n";
	$sql_for_truncate = "TRUNCATE TABLE work_details ";
	if(!mysqli_query($con, $sql_for_truncate))
	{
    	die('Error : ' . mysqli_error($con));
	}	

	while ($row = mysqli_fetch_array($result_for_select)) 
    	{ 
    		$sql = "INSERT INTO work_details (Year,Details_Of_Work ,Amount, Code, Prabhag_No) VALUES('". $row['Year'] ."','". $Work_Against_Codes[$row['Code']] ."','". $row['Amount'] ."','". $row['Code'] ."','".$row['Prabhag_No'] ."')";
     		if(!mysqli_query($con, $sql))
    		{
         		die('Error : ' . mysqli_error($con));
    		}
     	}
    $sql_for_select_all_w = "SELECT * FROM `work_details` " ;
	$result_for_select_all_w = mysqli_query($con,$sql_for_select_all_w);
	$num_result_for_select_all_w = $result_for_select_all_w->num_rows;
	print "No. of rows in work_details table is : ".$num_result_for_select_all_w."\n";
?>
