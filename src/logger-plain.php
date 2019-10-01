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
use Gmsantos\Inspiring;

try {
    $logger = new Logger('channel-name');
    $logger->pushHandler(new StreamHandler(__DIR__ . '/var/log/plain/app.log', Logger::DEBUG));

    $logger->info(Inspiring::quote());
    $logger->warning(Inspiring::quote());
    $logger->error(Inspiring::quote());
} catch (Exception $exception) {
    // noop
}
