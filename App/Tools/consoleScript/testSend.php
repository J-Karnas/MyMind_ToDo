<?php

declare(strict_types=1);

namespace App\Tools;

use App\Controllers\EmailController;

require_once 'vendor/autoload.php';

$controller = new EmailController();
echo $controller->Welcome();