<?php

//connection
	$con = mysqli_connect('localhost','root','','csv_db');
	if (!$con) 
	{
            die('Could not connect: ' . mysqli_error($con));
    }

	mysqli_select_db($con,"csv_db");
//--------------------------------------------------------------------


	$Work_Against_Codes=array(
						  "B"=>"Benches",
						  "P"=>"Pavement blocks",
						  "F"=>"Footpath work",
						  "C"=>"Concretization",
						  "DB"=>"Dustbin distribution/ Buckets",
						  "J"=>"Jute bags",
						  "CO"=>"Computers",
						  "SM"=>"Samaj Mandir/ Related work/ Renovation",
						  "D"=>"Drainage work/ Laying of Drainage line",
						  "W"=>"Water supply",
						  "M"=>"Maintenance/cleaning",
						  "GY"=>"Gym/ gym equipments",
						  "G"=>"Garden work",
						  "E"=>"Electrification, new street lights",
						  "R"=>"Colouring roads/ Railing Work/Road WorK",
						  "T"=>"Laying of Tiles",
						  "D+C"=>"Drainage work+ Concretisation",
						  "TO"=>"Toilet Renovation/Maintenance",
						  "T+C"=>"Laying of Tiles+Concretisation",
						  "BT"=>"Building of Toilets",
						  "BS"=>"Building of Bus stop shed",
						  "CT"=>"Colouring of Tiles",
						  "L"=>"Building Library",
						  "N"=>"Installation of Nameplates"
						  );



	$sql = "SELECT Year, Prabhag_No, Details_Of_Work ,SUM(Amount) AS Amount,Code FROM `csv_data` GROUP BY Prabhag_No, Year ,Code " ;

	$result = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($result)) 
    	{ 
    		$sql = "INSERT INTO finaltable (Year,Details_Of_Work ,Amount, Code, Prabhag_No) VALUES('". $row['Year'] ."'
 					,'". $Work_Against_Codes[$row['Code']] ."','". $row['Amount'] ."','". $row['Code'] ."','".
 					$row['Prabhag_No'] ."')";
     

			if(!mysqli_query($con, $sql))
    		{
         		die('Error : ' . mysqli_error($con));
    		}
     	}


	mysqli_close($con);
?>
