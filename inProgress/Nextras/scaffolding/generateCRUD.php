<?php

include __DIR__ . '/../../../vendor/autoload.php';

echo "Generate Record Models\n\n";

$config = [
	'output' => __DIR__ . '/../Model',
	'orm.namespace' => 'SOB\Nextras\Model',
	'entity.namespace' => 'SOB\Nextras',
	'repository.namespace' => 'SOB\Nextras',
	'mapper.namespace' => 'SOB\Nextras',
	'facade.namespace' => 'SOB\Nextras',
	'model.namespace' => 'SOB\Nextras',
	//other options
];
$factory = new \Contributte\Nextras\Orm\Generator\SimpleFactory(
	new \Contributte\Nextras\Orm\Generator\Config\Impl\TogetherConfig($config),
	new \Contributte\Nextras\Orm\Generator\Analyser\Database\DatabaseAnalyser('sqlite:sqlite.db', 'root')
);

$factory->create()->generate();
