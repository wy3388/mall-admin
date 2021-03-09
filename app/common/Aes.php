<?php

namespace app\common;

class Aes
{
    private const key = "2ee385d4e42e07f2c539b597559e70ee";

    private const method = "AES-128-ECB";

    private static function getIv(): string
    {
        $ivLength = openssl_cipher_iv_length(self::method);
        return openssl_random_pseudo_bytes($ivLength);
    }

    public static function encrypt(string $value): string
    {
        $key = substr(openssl_digest(openssl_digest(self::key, 'sha1', true), 'sha1', true), 0, 16);
        $encrypted = openssl_encrypt($value, self::method, $key, OPENSSL_RAW_DATA);
        return $encrypted = base64_encode($encrypted);
    }

    public static function decrypt(string $value): string
    {
        $key = substr(openssl_digest(openssl_digest(self::key, 'sha1', true), 'sha1', true), 0, 16);
        return openssl_decrypt(base64_decode($value), self::method, $key, OPENSSL_RAW_DATA);
    }
}