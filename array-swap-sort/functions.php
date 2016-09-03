<?php

/**
 * Swap elements of array
 * 
 * @param  array Array to swap
 * @param  integer poistion of swap
 */
function array_swap(&$array, $position) {
    $value = $array[0];
    $array[0] = $array[$position];
    $array[$position] = $value;
}

/**
 * Dump variable
 */
function dump($variable) {
    print '<pre>';
    print_r($variable);
    print '</pre>';
}

/**
 * Print array to screen
 * 
 * @param  array $array Array to print
 * @return string Inline version of array
 */
function array_inline(array $array) {
    return implode(', ', $array);
}

/**
 * Generate random array
 * 
 * @param  integer $count Number elements in array
 * @return array Result array
 */
function generate_array($count) {
    $array = range(1, $count);
    shuffle($array);

    return $array;
}
