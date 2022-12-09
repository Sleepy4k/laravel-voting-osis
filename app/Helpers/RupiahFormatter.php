<?php

/**
 * Change from plain number to rupiah format
 * 
 * @param int $integer
 * @return string
 */
if (!function_exists('intToRupiah')) {
    function intToRupiah($integer)
    {
        return number_format($integer, 0, ',', '.');
    }
}