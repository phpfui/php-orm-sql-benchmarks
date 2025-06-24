<?php

include '../../../vendor/autoload.php';

use Composite\Sync\Commands;
use Symfony\Component\Console\Application;

$dir = __DIR__ . '/config.php';
putenv('CONNECTIONS_CONFIG_FILE=' . $dir);

$app = new Application();
$app->addCommands([
    new Commands\GenerateEntityCommand(), //to initialize $dbManager see example above
    new Commands\GenerateTableCommand(),
]);
$app->run();
