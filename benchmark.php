<?php

include 'vendor/autoload.php';

$configs = new \SOB\Configurations(__DIR__ . '/config.php');
$testRunner = new \SOB\TestRunner($configs);

$testRunner->runTests();

// write results at the top of the file for easy reference
$resultsFile = 'results.csv';
if (file_exists($resultsFile))
	{
	$fileReader = new \SOB\CSV\FileReader($resultsFile);
	foreach ($fileReader as $row)
		{
		$testRunner->addResults($row);
		}
	}

$fileWriter = new \SOB\CSV\FileWriter($resultsFile, download:false);
foreach ($testRunner->getResults() as $row)
	{
	$fileWriter->outputRow($row);
	}
