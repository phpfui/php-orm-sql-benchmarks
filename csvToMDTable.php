<?php

include 'vendor/autoload.php';

$resultsFile = $argv[1] ?? 'results.csv';

$fileReader = new \SOB\CSV\FileReader($resultsFile);

$lengths = [];
foreach ($fileReader as $row)
	{
	foreach ($row as $field => $value)
		{
		if (is_numeric($value) && strpos($value, '.'))
			{
			$value = number_format((float)$value, 7);
			}
		if (!isset($lengths[$field]))
			{
			$lengths[$field] = 0;
			}
		$lengths[$field] = max($lengths[$field], strlen($value));
		$lengths[$field] = max($lengths[$field], strlen($field));
		}
	}

$parts = explode('.', $resultsFile);
$mdFile = $parts[0] . '.md';
$output = '|' . implode('|', padRow(array_combine(array_keys($row), array_keys($row)), $lengths)) . "|\n";

foreach ($row as $field => $label)
	{
	$row[$field] = str_repeat('-', $lengths[$field]);
	}
$output .= '|' . implode('|', $row) . "|\n";

foreach ($fileReader as $row)
	{
	$output .= '|' . implode('|', padRow($row, $lengths)) . "|\n";
	}

file_put_contents($mdFile, $output);

function padRow(array $row, array $lengths) : array
	{
	foreach ($row as $field => $label)
		{
		$value = $row[$field];
		if (is_numeric($value) && strpos($value, '.'))
			{
			$value = number_format((float)$value, 7);
			}
		$row[$field] = str_pad($value, $lengths[$field], pad_type:is_numeric($label) ? STR_PAD_LEFT : STR_PAD_RIGHT);
		}

	return $row;
	}
