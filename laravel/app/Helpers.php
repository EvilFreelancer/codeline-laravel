<?php

namespace App;

class Helpers
{
    public static function slug($string)
    {
        $string = trim($string);
        $string = str_replace(" ", "-", $string);
        $string = str_replace("/", "-slash-", $string);
        $string = rawurlencode($string);
        $string = mb_strtolower($string);
        return $string;
    }
}
