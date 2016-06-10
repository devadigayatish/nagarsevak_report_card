<?php
/* 
	This script read the csv files from directory and inserts the data into "csv_data" table and "attendance" table.
*/
require_once('./../includes/db_connection.php');                   //connection
$directory    = PROJ_DIR.'csv/';                                   //read the directory 
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
$sql_for_truncate = "TRUNCATE TABLE csv_data ";
	if(!mysqli_query($con, $sql_for_truncate))
	{
    	die('Error : ' . mysqli_error($con));
	}
foreach( $scanned_directory as $value ) 
{
	$filename = $directory.$value;
	print "Processing file : ".$value." for inserting data into csv_data table \n";	
	$i = 0;
	if ($value == "main-files")
	{
		print "Folder will not be processed\n";
	}
	else
	{
		$file_pointer = fopen($filename,"r");                    
		$read_csv_file = fgetcsv($file_pointer);			
		$temp = explode(":", $read_csv_file[0]);                //split the 1st row on ":"     
		$prabhag = str_replace("Prabhag","", $temp[0]);         //replace prabhag by empty string 
		$prabhag_no = str_replace(" ","", $prabhag);            //replace the space by empty string
		print "Prabhag No. : ".$prabhag_no."\n";
		while(! feof($file_pointer))
		{
			$read_csv_file = fgetcsv($file_pointer);
			if ($read_csv_file[0] != "" && $read_csv_file[4] != "")
			{
				$row[$i]=array($read_csv_file[0], $read_csv_file[1], $read_csv_file[2], $read_csv_file[3], $read_csv_file[4]);
				$i++;
			}
		}
		unset($row[0]);
		for ($j=1; $j <= sizeof($row) ; $j++) 
		{ 
			$fieldVal_year = mysqli_real_escape_string($con,$row[$j][0]);
			$fieldVal_DOW = mysqli_real_escape_string($con,$row[$j][2]);
			$fieldVal_amount = mysqli_real_escape_string($con,$row[$j][3]);
			$fieldVal_code = mysqli_real_escape_string($con,$row[$j][4]);
    
			$sql_for_insert = "INSERT INTO csv_data (Year,Details_Of_Work ,Amount, Code, Prabhag_No) VALUES('".$fieldVal_year."','".$fieldVal_DOW."','".$fieldVal_amount."','".$fieldVal_code."','".$prabhag_no."')";
			if(!mysqli_query($con, $sql_for_insert))
			{
				die('Error : ' . mysqli_error($con));
			}
		}
		fclose($file_pointer); 
	}
}
//=======================================================================================
print "\n\n\n";
$sql_for_truncate = "TRUNCATE TABLE attendance ";
  	if(!mysqli_query($con, $sql_for_truncate))
    {
        die('Error : ' . mysqli_error($con));
    }
foreach( $scanned_directory as $value ) 
{         
	$filename = $directory.$value;
	print "Processing file : ".$value." for inserting data into attendance table\n";
	$i = 0;
	if ($value == "main-files")
	{
		print "Folder will not be processed\n";
	}
	else
	{
		$file_pointer = fopen($filename,"r");
		$read_csv_file = fgetcsv($file_pointer);
		$temp = explode(":", $read_csv_file[0]);               //split the 1st row on ":"  
		$prabhag = str_replace("Prabhag","", $temp[0]);        //replace prabhag by empty string 
		$prabhag_no = str_replace(" ","", $prabhag);           //replace the space by empty string
		print "Prabhag No. : ".$prabhag_no."\n";
		$row = array();                                        //initialise the array 
		while(! feof($file_pointer))
		{
			$read_csv_file = fgetcsv($file_pointer);
			if($read_csv_file[5] != "" && $read_csv_file[6] != "")
			{
				$row[$i]=array($read_csv_file[0], $read_csv_file[1], $read_csv_file[2], $read_csv_file[3], $read_csv_file[4], $read_csv_file[5], $read_csv_file[6]);
				$temp = explode("/",$read_csv_file[6]);
				if (strlen($temp[0]) > 8)
				{
					$temp[1]= "Total meetings";
				}
				else
				{
					$row[$i][6] = $temp[0];
					$row[$i][7] = $temp[1];
				}
				$i++;
			}
		}

		unset($row[0]);
		for ($j=1; $j <= sizeof($row) ; $j++) 
		{ 
			$fieldVal_year = mysqli_real_escape_string($con,$row[$j][0]);
   			$fieldVal_questions = mysqli_real_escape_string($con,$row[$j][5]);
    		$fieldVal_Attendance = mysqli_real_escape_string($con,$row[$j][6]);
    		$fieldVal_meetings = mysqli_real_escape_string($con,$row[$j][7]);
    		$fieldVal5= round(($fieldVal_Attendance/$fieldVal_meetings)*100,2);
    		$fieldVal5 = mysqli_real_escape_string($con,$fieldVal5);

			$sql_for_insert = "INSERT INTO attendance (Prabhag_No,Year,Questions,GB_Attendance,GB_Meetings,Atendance_Percentage) VALUES('".$prabhag_no."','".$fieldVal_year."','".$fieldVal_questions."','".$fieldVal_Attendance."','".$fieldVal_meetings."','".$fieldVal5."')";
			if(!mysqli_query($con, $sql_for_insert))
    		{
        		die('Error : ' . mysqli_error($con));
    		}
		}
		fclose($file_pointer);
	}
}
?>
