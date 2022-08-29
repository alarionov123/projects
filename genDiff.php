<?php

namespace App\Solution;

function genDiff(array $array1, $array2)
{
    $result = [];
    $keysOfFirst = array_keys($array1);
    $keysOfSecond = array_keys($array2);
    if (empty($keysOfFirst)) {
        foreach ($keysOfSecond as $value) {
              $result[$value] = 'added';
              return $result;
        }
    } elseif (empty($keysOfSecond)) {
        foreach ($keysOfFirst as $value) {
              $result[$value] = 'deleted';
              return $result;
        }
    }
    foreach ($keysOfFirst as $key => $value) {
        if (in_array($value, $keysOfSecond) && $array1[$value] == $array2[$value]) {
            $result[$value] = 'unchanged';
        } if (in_array($value, $keysOfSecond) && $array1[$value] != $array2[$value]) {
            $result[$value] = 'changed';
        } elseif (!in_array($value, $keysOfSecond) && in_array($value, $keysOfFirst)) {
            $result[$value] = 'deleted';
        }
    }
    foreach ($keysOfSecond as $key => $value) {
        if (!array_key_exists($value, $array1) && in_array($value, $keysOfSecond)) {
            $result[$value] = 'added';
        }
    }
    return $result;
}


TESTS:

<?php
 
use function App\Solution\genDiff;
 
$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);
// [
//   'one' => 'deleted',
//   'two' => 'changed',
//   'four' => 'unchanged',
//   'zero' => 'added',
// ]
