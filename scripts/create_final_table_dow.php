<?php
/*
	This script read the data from "csv_data" table and insert into final table "work_details".
*/

require_once('./../includes/db_connection.php');                //connection

	$Work_Against_Codes=array(
						  "B"=>"Benches",
						  "BG"=>"Helping Bachat Gat training center",
						  "BT"=>"Building of Toilets",
						  "BS"=>"Building of Bus stop shed",
						  "BW"=>"Bore wells",
						  "C"=>"Concretization",
						  "CO"=>"Computers",
						  "CT"=>"Colouring of Tiles",
						  "CM"=>"Cemetory / cremetory",
						  "CB"=>"Cladding for Buildings",
						  "D"=>"Drainage work/ Laying of Drainage line",
						  "DB"=>"Dustbin distribution/ Buckets",
						  "DW"=>"Develpoment Work",
						  "DE"=>"Decoration",
						  "D+C"=>"Drainage work+ Concretisation",
						  "E"=>"Electrification, new street lights",
						  "F"=>"Footpath work",
						  "FE"=>"Fencing, walls",
						  "FB"=>"Fire Brigade related work",
						  "FW"=>"Furniture work",
						  "G"=>"Garden work",
						  "GY"=>"Gym/ gym equipments",
						  "J"=>"Jute bags",
						  "L"=>"Building Library",
						  "M"=>"Maintenance/cleaning",
						  "MK"=>"Market related works",
						  "N"=>"Installation of Nameplates",
						  "P"=>"Pavement blocks",
						  "R"=>"Colouring roads/ Railing Work/Road WorK",
						  "RW"=>"Road works",
						  "S"=>"Buying sewing machines",
						  "SB"=>"Direction/Information/Sign Boards",
						  "SM"=>"Samaj Mandir/ Related work/ Renovation",
						  "T"=>"Laying of Tiles",
						  "TO"=>"Toilet Renovation/Maintenance",
						  "T+C"=>"Laying of Tiles+Concretisation",
						  "W"=>"Water supply",
						  "WD"=>"Waste Disposal",
						  "WB"=>"Wheelbarrow",
						  "WC"=>"Construction of walls"  
						  );

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
