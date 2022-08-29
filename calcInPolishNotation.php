<?php

namespace App\Arrays;

function calcInPolishNotation(array $array)
{
    do {
        $leftArr = [];
		$rightArr = [];
		$number = [];
        $counted = false;
        $size = count($array);
        for ($i = 0; $i <= $size; $i++) {
            if (isset($array[$i])) {
                $current = $array[$i];
            }
            $result = 0;
            if (gettype($current) == 'string') {
                $counted = true;
                $oneNumBelow = $array[$i - 1];
                $twoNumBelow = $array[$i - 2];
                if ($oneNumBelow == 0) {
                    return null;
                }
                switch ($current) {
                    case '+':
                        $result += $oneNumBelow + $twoNumBelow;
                        break;
                    case '-':
                        $result += $twoNumBelow - $oneNumBelow;
                        break;
                    case '*':
                        $result += $oneNumBelow * $twoNumBelow;
                        break;
                    case '/':
                        $result += $twoNumBelow / $oneNumBelow;
                        break;
                }
                $number[] = $result;
                if (isset($array[$i - 3])) {
                    $leftArr = array_slice($array, 0, $i - 2);
                }
                if (isset($array[$i + 1])) {
                    $rightArr = array_slice($array, $i + 1, $size);
                }
                $array = array_merge($leftArr, $number, $rightArr);
                $i = $size;
            }
        }
    } while ($counted);
    return $array[0];
}


// TESTS

// <?php
// 
// namespace App\Tests;
// 
// use PHPUnit\Framework\TestCase;
// 
// use function App\Arrays\calcInPolishNotation;
// 
// class ArraysTest extends TestCase
// {
//     public function testCalcInPolishNotation()
//     {
//         $this->assertEquals(15, calcInPolishNotation([1, 2, '+', 4, '*', 3, '+']));
//         $this->assertEquals(4, calcInPolishNotation([1, 2, '+', 4, '*', 3, '/']));
//         $this->assertEquals(1, calcInPolishNotation([7, 2, 3, '*', '-']));
//         $this->assertEquals(6, calcInPolishNotation([1, 2, '+', 2, '*']));
//         $this->assertNull(calcInPolishNotation([1, 2, '+', 4, '*', 0, '/']));
//     }
// }
