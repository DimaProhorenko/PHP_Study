<?php
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $trimmed = trim($value);
        return strlen($trimmed) >= $min && strlen($trimmed) <= $max;
    }
}
