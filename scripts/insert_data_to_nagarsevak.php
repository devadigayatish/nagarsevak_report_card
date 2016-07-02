<?php
/* 
	This script read the csv file nagarsevak_info from directory and inserts the data into "nagarsevak" table.
	Calculate the total questions and average attendance of nagarsevak and update the "nagarsevak" table.
*/
require_once('./../includes/db_connection.php'); 
$filename    = PROJ_DIR.'information/nagarsevak_info.csv';
$sql_for_truncate = "TRUNCATE TABLE nagarsevak ";
	if(!mysqli_query($con, $sql_for_truncate))
	{
    	die('Error : ' . mysqli_error($con));
	}

$file_pointer = fopen($filename,"r");    
$i=1;                
while(! feof($file_pointer))
{
	$read_csv_file = fgetcsv($file_pointer);
	$row[$i]=array($read_csv_file[0], $read_csv_file[1], $read_csv_file[2], $read_csv_file[3], $read_csv_file[4],$read_csv_file[5], $read_csv_file[6], $read_csv_file[7], $read_csv_file[8], $read_csv_file[9],$read_csv_file[10], $read_csv_file[11], $read_csv_file[12]);
	$i++;
}

for ($j=1; $j <= sizeof($row)-1 ; $j++) 
{ 
	$fieldVal_Prabhag_No = mysqli_real_escape_string($con,$row[$j][0]);
	$fieldVal_Nagarsevak_Name = mysqli_real_escape_string($con,$row[$j][1]);
	$fieldVal_Codes = mysqli_real_escape_string($con,$row[$j][2]);
	$fieldVal_Url = mysqli_real_escape_string($con,$row[$j][3]);
	$fieldVal_Prabhag_Name = mysqli_real_escape_string($con,$row[$j][4]);
	$fieldVal_Ward_ofc = mysqli_real_escape_string($con,$row[$j][5]);
	$fieldVal_Party = mysqli_real_escape_string($con,$row[$j][6]);
	$fieldVal_Total_Questions = mysqli_real_escape_string($con,$row[$j][7]);
	$fieldVal_Avg_Attendance = mysqli_real_escape_string($con,$row[$j][8]);
	$fieldVal_Criminal_Records = mysqli_real_escape_string($con,$row[$j][9]);
	$fieldVal_Original_RTI_Link = mysqli_real_escape_string($con,$row[$j][10]);
	$fieldVal_Csv_Link = mysqli_real_escape_string($con,$row[$j][11]);
	$fieldVal_Gender = mysqli_real_escape_string($con,$row[$j][12]);
    
	$sql_for_insert = "INSERT INTO nagarsevak (Prabhag_No,Nagarsevak_Name,Codes,Url,Prabhag_Name,Ward_ofc,Party,Total_Questions,Avg_Attendance,Criminal_Records,Original_RTI_Link,Csv_Link,Gender) VALUES('".$fieldVal_Prabhag_No."','".$fieldVal_Nagarsevak_Name."','".$fieldVal_Codes."','".$fieldVal_Url."','".$fieldVal_Prabhag_Name."','".$fieldVal_Ward_ofc."','".$fieldVal_Party."','".$fieldVal_Total_Questions."','".$fieldVal_Avg_Attendance."','".$fieldVal_Criminal_Records."','".$fieldVal_Original_RTI_Link."','".$fieldVal_Csv_Link."','".$fieldVal_Gender."')";
			
	if(!mysqli_query($con, $sql_for_insert))
	{
		die('Error : ' . mysqli_error($con));
	}
}
fclose($file_pointer); 
//==============================================================================================
//calculate the total questions and average attendance of nagarsevak and update the "nagarsevak" table.
$sql = "SELECT Prabhag_No ,SUM(Questions) AS Questions,AVG(Atendance_Percentage) As Atendance_Percentage FROM `attendance` GROUP BY Prabhag_No";
	$result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($result)) 
	{	
    	$fieldVal1= $row['Questions'];
    	$fieldVal2= round($row['Atendance_Percentage'],2);					
    	$sql = "UPDATE nagarsevak SET Total_Questions = '". $fieldVal1 ."', Avg_Attendance = '". $fieldVal2 ."' where Prabhag_No = '".$row['Prabhag_No']."' ";
    	if(!mysqli_query($con, $sql))
    	{
         	die('Error : ' . mysqli_error($con));
    	}
        print "Updated Questions and Avg-Attendance for Prabhag No. : ".$row['Prabhag_No']."\n";
    }
 ?>