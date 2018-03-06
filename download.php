<?php
$rootPath = realpath('theme1/');


		// Initialize archive object
		$zip = new ZipArchive();
		$zip_name = "portfolio.zip";
		$zip->open('portfolio.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
		    new RecursiveDirectoryIterator($rootPath),
		    RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file)
		{
		    // Skip directories (they would be added automatically)
		    if (!$file->isDir())
		    {
		        // Get real and relative path for current file
		        $filePath = $file->getRealPath();
		        $relativePath = substr($filePath, strlen($rootPath) + 1);

		        // Add current file to archive
		        $zip->addFile($filePath, $relativePath);
		    }
		}

		// Zip archive will be created only after closing object
		$zip->close();



	// $file_folder = "Theme3/";
	// if(extension_loaded('zip'))
	// {
	// 	$zip = new ZipArchive();
	// 	$zip_name = "portfolio.zip";
	// 	if($zip -> open($zip_name, ZIPARCHIVE::CREATE)===TRUE)
	// 	{
	// 		$dir=opendir($file_folder);
	// 		while($file=readdir($dir))
	// 		{	
	// 			$zip->addFile($file_folder.$file);
	// 		}
	// 		$zip -> close();
	// 	}
	// }
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="'.$zip_name.'"');
	readfile($zip_name);
	unlink($zip_name);
	exit;
	?>