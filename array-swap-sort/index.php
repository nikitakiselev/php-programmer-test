<?php

require __DIR__."/functions.php";

$array = generate_array(10);

print "Initial array: ".array_inline($array)."<br/>";

// Счётчик нужен для хранения текущей итерации цикла while
// значение этого счётчика совпадает с текущим кол-вом 
// элементов массива. Это нужно для того, чтобы не пересчитывать
// кол-во элементов массива на каждой итерации
$counter = count($array);

while ($counter > 0) {
    for ($i = 1; $i < $counter; $i++) {
        if ($array[0] > $array[$i]) {
            array_swap($array, $i);
        }
    }

    $result[] = array_shift($array);
    $counter--;
}

print "Sorted array: ".array_inline($result);
