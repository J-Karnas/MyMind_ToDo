<?php

namespace App\Tools;

require_once './vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./');
$dotenv->load();

define('DATABASE_HOST', $_ENV['DATABASE_HOST']);
define('DATABASE_NAME', $_ENV['DATABASE_NAME']);
define('DATABASE_PORT', $_ENV['DATABASE_PORT']);
define('DATABASE_USER', $_ENV['DATABASE_USER']);
define('DATABASE_PWD', $_ENV['DATABASE_PWD']);

define('SMTP_HOST', $_ENV['SMTP_HOST']);
define('SMTP_PORT', $_ENV['SMTP_PORT']);
define('SMTP_USER', $_ENV['SMTP_USER']);
define('SMTP_PWD_CRYPT', $_ENV['SMTP_PWD_CRYPT']);
define('SMTP_TYP_CONECT', $_ENV['SMTP_TYP_CONECT']);
define('SMTP_USER_FROM', $_ENV['SMTP_USER_FROM']);
define('SMTP_FROM_NAME', $_ENV['SMTP_FROM_NAME']);

define('SECRET_KEY', $_ENV['SECRET_KEY']);
define('SECRET_IV', $_ENV['SECRET_IV']);
