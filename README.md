# logger
Home work for hillel

## Usage

``` php
<?php

use Mary\Logger\Logger;
use Mary\Logger\Formatter;
use Mary\Logger\FileWriter;
use Mary\Logger\DbWriter;


require_once(__DIR__ . '/../vendor/autoload.php');

//Логирование в файл:
$fileWriter = new FileWriter('log.txt');
$format = new Formatter;
$logger = new Logger($fileWriter, $format);
$logger->error('error', [1, 1, 2]);

//Логирование в базу данных:
$pdo = new PDO('mysql:host=localhost;dbname=logger', 'root', 'root');

$dbWriter = new DbWriter($pdo);
$logger2 = new Logger($dbWriter, $format);
$logger2->error('error', [1, 1, 2]);
$logger2->info('Hello');

```


