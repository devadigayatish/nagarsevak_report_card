<?php
//connection

$con = mysqli_connect('localhost','root','','csv_db');
 if (!$con) {
             die('Could not connect: ' . mysqli_error($con));
            }

 mysqli_select_db($con,"csv_db");

 //=========================================================



				$sql = "SELECT Prabhag_No ,AVG(Questions) AS Questions,AVG(Atendance_Percentage) As Atendance_Percentage FROM `attendance` GROUP BY Prabhag_No";
				$result = mysqli_query($con,$sql);
				while ($row = mysqli_fetch_array($result)) 
				{
    		
    		
    						$fieldVal1= round($row['Questions'],2);
    						$fieldVal2= round($row['Atendance_Percentage'],2);
							


    						$sql = "UPDATE nagarsevak SET 
    										Avg_Questions = '". $fieldVal1 ."', 
    										Avg_Attendance = '". $fieldVal2 ."'
    						                where Prabhag_No = '".$row['Prabhag_No']."' ";
    	

    	   					if(!mysqli_query($con, $sql))
    		   				{
         							die('Error : ' . mysqli_error($con));
    		   				}
     			}
     	
//close the db connection



	mysqli_close($con);
?>