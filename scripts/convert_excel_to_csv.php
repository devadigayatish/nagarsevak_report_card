<?php 
    require_once('./../_config.php');
    require_once './../includes/lib/PHPExcel.php';

	$dirZIP = './../uploads/data-files';
	$dirCSV = './../uploads/data-files/csv';

    $fileType = 'Excel2007';

    $inputFileName = './../uploads/data-files/NRC21 master file.xlsx';
	print "Input file : ". str_replace("./../", "", $inputFileName) . "<br>";

	$objPHPExcelReader = PHPExcel_IOFactory::createReader($fileType);
	$objPHPExcel = $objPHPExcelReader->load($inputFileName);

	$i = 0;
	$sheetCount = $objPHPExcel->getSheetCount();
	print "This file contains ". $sheetCount ." sheets" . "<br>";
	$sheetName = $objPHPExcel->getSheetNames();
	while($i < $sheetCount) 
	{
		$workSheet = $objPHPExcel->getSheet(0);
		$newObjPHPExcel = new PHPExcel();
		$newObjPHPExcel->removeSheetByIndex(0);
		$newObjPHPExcel->addExternalSheet($workSheet);

		$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($newObjPHPExcel, 'CSV');
		$outputFileTemp = explode('.', $inputFileName);

		$outputFileName = $dirCSV.'/'. $sheetName[$i].'.'.'csv';
		print "created file : ".$sheetName[$i]."<br>";
		$objPHPExcelWriter->save($outputFileName);
		++$i;
	}
	print "<br><br>" ;

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($dirZIP . '/Nagarsevak_Full_Data.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($dirCSV),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = explode("\\", $filePath);
			$relativePath = array_pop($relativePath);

			// Add current file to archive
			$zip->addFile($filePath, $relativePath);
		}
		
	}
	// Zip archive will be created only after closing object
	$zip->close();
?>