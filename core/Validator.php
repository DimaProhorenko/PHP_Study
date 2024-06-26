<?php
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $trimmed = trim($value);
        return strlen($trimmed) >= $min && strlen($trimmed) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function password($value)
    {
        return static::string($value, 6, 16);
    }
}
