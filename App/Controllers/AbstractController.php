<?php

declare(strict_types=1);

namespace App\Controllers;

abstract class AbstractController
{
    protected function forwarding(string $url): void
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url);
        exit;
    }
}
