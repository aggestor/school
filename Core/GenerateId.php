<?php

namespace Core;

class GenerateId
{
    private static $DEFAULT_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    public static function generate(int $length = 10, ?string $characters = null)
    {
        return substr(str_shuffle(str_repeat($characters != null ? $characters : self::$DEFAULT_CHARS, $length)), 0, $length);
    }
}

