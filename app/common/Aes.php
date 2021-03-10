<?php

namespace app\common;

class Aes
{
    private const key = "2ee385d4e42e07f2c539b597559e70ee";

    private const method = "AES-256-CBC";

    private static function getIv(): string
    {
        $ivLength = openssl_cipher_iv_length(self::method);
        return openssl_random_pseudo_bytes($ivLength);
    }

    public static function encrypt(string $value): string
    {
        $s = openssl_encrypt($value, self::method, self::key, OPENSSL_RAW_DATA, 'D1F07625B8E04A5D');
        return base64_encode($s);
    }

    public static function decrypt(string $value): string
    {
        $encrypted = base64_decode($value);
        return openssl_decrypt($encrypted, self::method, self::key, OPENSSL_RAW_DATA, "D1F07625B8E04A5D");
    }
}