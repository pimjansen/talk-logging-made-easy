<?php
/*
* Copyright (C) Senet Eindhoven B.V. - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Pim Jansen <pjansen@senet.nl>, 04-06-2019
*/
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Gmsantos\Inspiring;

$errors = 5000;
$warnings = 200;
$notices = 1000;

try {
    $formatter = new JsonFormatter();

    $handler = new StreamHandler(__DIR__ . '/../var/log/json/graph.log', Logger::DEBUG);
    $handler->setFormatter($formatter);
    $logger = new Logger('channel-name');
    $logger->pushHandler($handler);
    for ($i=0;$i<$errors;$i++) {
        $logger->error(Inspiring::quote());
    }
    for ($i=0;$i<$warnings;$i++) {
        $logger->warning(Inspiring::quote());
    }
    for ($i=0;$i<$notices;$i++) {
        $logger->notice(Inspiring::quote());
    }
} catch (Exception $exception) {
    // noop
}
