<?php

class Validator {
    public static function string($value, $min=1, $max=INF) {
        $len = strlen(trim($value));
        return $min <= $len && $len <= $max;
    }

    public static function integer($value, $min) {
        return $min <= $value;
    }

    public static function decimals($value, $min, $max) {
        $pos = strpos($value, '.');
        if ($pos === false) {
            return true;
        }
        $decimals = strlen(substr($value, $pos+1));
        return $min <= $decimals && $decimals <= $max;
    }
}

?>
