<?php 
/*	
	This script extract each sheet out of the excel file.
*/


require_once('./../includes/db_connection.php');                   //connection
include 'PHPExcel.php';
$fileType = 'Excel2007';

$directory    = PROJ_DIR.'csv/main-files/';                 //read the directory 
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
foreach( $scanned_directory as $value ) 
{
	$inputFileName = $directory.$value;
	print "Input file name : ".$value."\n";		
	$objPHPExcelReader = PHPExcel_IOFactory::createReader($fileType);
	$objPHPExcel = $objPHPExcelReader->load($inputFileName);
	$i = 0;
	$sheetCount = $objPHPExcel->getSheetCount();
	print "This file contains ".$sheetCount." sheets\n";
	$sheetName = $objPHPExcel->getSheetNames();
	while($i < $sheetCount) 
	{
    	$workSheet = $objPHPExcel->getSheet(0);
    	$newObjPHPExcel = new PHPExcel();
    	$newObjPHPExcel->removeSheetByIndex(0);
    	$newObjPHPExcel->addExternalSheet($workSheet);

    	$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($newObjPHPExcel,'CSV');
    	$outputFileTemp = explode('.',$inputFileName);
    	$outputFileName = PROJ_DIR.'csv/'.$sheetName[$i].'.'.'csv';
    	print "created file : ".$sheetName[$i]."\n";
    	$objPHPExcelWriter->save($outputFileName);
    	++$i;
	}
	print "\n\n" ;
}
?>