
<?php
//connection

$connection = mysqli_connect('localhost','root','','csv_db');
 if (!$connection) {
             die('Could not connect: ' . mysqli_error($connection));
            }

 mysqli_select_db($connection,"csv_db");

 //=========================================================


$directory    = 'C:/wamp/www/NRC/csv';                 //read the directory 

$scanned_directory = array_diff(scandir($directory), array('..', '.'));


foreach( $scanned_directory as $value ) 
       {
            
			$filename = $directory.$value;
			
			$i = 0;
			$file_pointer = fopen($filename,"r");                    

			$read_csv_file = fgetcsv($file_pointer);
			
			$temp = explode(":", $read_csv_file[0]); 
			//split the 1st row on ":"     

			$prabhag = str_replace("Prabhag","", $temp[0]);
			//replace prabhag by empty string 

			$prabhag_no = str_replace(" ","", $prabhag);
			//replace the space by empty string 

			

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
	
				$fieldVal_year = mysqli_real_escape_string($connection,$row[$j][0]);
			    $fieldVal_DOW = mysqli_real_escape_string($connection,$row[$j][2]);
			    $fieldVal_amount = mysqli_real_escape_string($connection,$row[$j][3]);
			    $fieldVal_code = mysqli_real_escape_string($connection,$row[$j][4]);
    
				$sql = "INSERT INTO csv_data (Year,Details_Of_Work ,Amount, Code, Prabhag_No) VALUES('".$fieldVal_year."','".$fieldVal_DOW."','".$fieldVal_amount."','".$fieldVal_code."','".$prabhag_no."')";

				if(!mysqli_query($connection, $sql))
				    {
				         die('Error : ' . mysqli_error($connection));
				    }
			}

			fclose($file_pointer); 
        }

//=======================================================================================

foreach( $scanned_directory as $value ) 
       {
            
			$filename = $directory.$value;

			$i = 0;
			$file_pointer = fopen($filename,"r");

			$read_csv_file = fgetcsv($file_pointer);

			$temp = explode(":", $read_csv_file[0]);
			//split the 1st row on ":"  
			$prabhag = str_replace("Prabhag","", $temp[0]);
			//replace prabhag by empty string 
			$prabhag_no = str_replace(" ","", $prabhag);
			//replace the space by empty string 
			$row = array();
			//initialise the array 
			while(! feof($file_pointer))
			{

			$read_csv_file = fgetcsv($file_pointer);


			if ($read_csv_file[5] != "" && $read_csv_file[6] != "")
				{

				$row[$i]=array($read_csv_file[0], $read_csv_file[1], $read_csv_file[2], $read_csv_file[3], $read_csv_file[4], $read_csv_file[5], $read_csv_file[6], $read_csv_file[7]);

				$temp = explode("/",$read_csv_file[6]);
				$row[$i][6] = $temp[0];
				$row[$i][7] = $temp[1];
				$i++;
				}
			}
			unset($row[0]);

			for ($j=1; $j <= sizeof($row) ; $j++) 
				{ 
	
				$fieldVal_year = mysqli_real_escape_string($connection,$row[$j][0]);
   				$fieldVal_questions = mysqli_real_escape_string($connection,$row[$j][5]);
    			$fieldVal_Attendance = mysqli_real_escape_string($connection,$row[$j][6]);
    			$fieldVal_meetings = mysqli_real_escape_string($connection,$row[$j][7]);
    			$fieldVal5= round(($fieldVal3/$fieldVal4)*100,2);
    			$fieldVal5 = mysqli_real_escape_string($connection,$fieldVal5);
  
				$sql = "INSERT INTO attendance (Prabhag_No,Year,Questions,GB_Attendance,GB_Meetings,Atendance_Percentage) VALUES('".$prabhag_no."','".$fieldVal_year."','".$fieldVal_questions."','".$fieldVal_Attendance."','".$fieldVal_meetings."','".$fieldVal5."')";

				if(!mysqli_query($connection, $sql))
    				{
        			 die('Error : ' . mysqli_error($connection));
    				}
				}

			fclose($file_pointer);
		}

//close the db connection
mysqli_close($connection);

?>
