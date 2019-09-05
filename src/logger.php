<?php
/*
* Copyright (C) Senet Eindhoven B.V. - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Pim Jansen <pjansen@senet.nl>, 04-06-2019
*/
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

try {
    $logger = new Logger('channel-name');
    $logger->pushHandler(new StreamHandler(__DIR__ . '/var/log/app.log', Logger::DEBUG));

    $logger->info('This is a log! ^_^ ');
    $logger->warning('This is a log warning! ^_^ ');
    $logger->error('This is a log error! ^_^ ');
} catch (Exception $exception) {
    // noop
}
