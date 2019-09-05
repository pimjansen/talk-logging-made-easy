<?php
/*
* Copyright (C) Senet Eindhoven B.V. - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Pim Jansen <pjansen@senet.nl>, 04-06-2019
*/
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Gmsantos\Inspiring;

try {
    $formatter = new JsonFormatter();

    $handler = new StreamHandler(__DIR__ . '/var/log/app.log', Logger::DEBUG);
    $handler->setFormatter($formatter);

    $logger = new Logger('channel-name');
    $logger->pushHandler($handler);

    $logger->error(Inspiring::quote(), ['extra'=>'data', 'more'=>'custom-data']);
} catch (Exception $exception) {
    // noop
}
