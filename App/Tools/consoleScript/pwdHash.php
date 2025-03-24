<?php

declare(strict_types=1);

namespace App\Tools\consoleScript;
use App\Tools\Encryption;

require_once 'App/Tools/Encryption.php';

$plain_password = 'TrudneHaslo123!@#';
$encrypted_password = Encryption::encrypt($plain_password);

echo "Zaszyfrowane hasło: " . $encrypted_password;