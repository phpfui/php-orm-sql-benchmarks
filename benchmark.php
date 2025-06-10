<?php

include 'vendor/autoload.php';

/**
 * Laravel shim
 */
function base_path(string $path = '') : string
  {
  echo __DIR__ . '/' . $path . "\n";
  return __DIR__ . '/' . $path;
  }

$configs = new \SOB\Configurations(__DIR__ . '/config.php');
$testRunner = new \SOB\TestRunner($configs);

$testsToRun = [];
array_shift($argv);
foreach ($argv as $arg)
	{
	$testsToRun[] = (int)$arg;
	}

$testRunner->runTests($testsToRun);

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
