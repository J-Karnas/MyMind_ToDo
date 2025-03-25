<?php

declare(strict_types=1);

namespace App\Tools;

class Encryption {
    private const SECRET_KEY_LOCAL = SECRET_KEY;
    private const SECRET_IV_LOCAL = SECRET_IV;

    public static function encrypt($data) {
        $key = hash('sha256', self::SECRET_KEY_LOCAL, true);
        $iv = substr(hash('sha256', self::SECRET_IV_LOCAL, true), 0, 16);
        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    public static function decrypt($data) {
        $key = hash('sha256', self::SECRET_KEY_LOCAL, true);
        $iv = substr(hash('sha256', self::SECRET_IV_LOCAL, true), 0, 16);
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, $iv);
    }
}