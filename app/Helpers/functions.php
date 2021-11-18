<?php

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            print_r($v);
        }

        exit(1);
    }
}

if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        print_r($var);

        foreach ($moreVars as $v) {
            print_r($v);
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }

        return $var;
    }
}