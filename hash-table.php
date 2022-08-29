<?php

namespace App\Map;

function make() {
    return [];
}
function hash(&$key) {
    return crc32($key) % 1000;
}
function set(&$map, $key, $value) {
    $index = hash($key);
    if (isset($map[$index])) {
        if ($map[$index][0] === $key) {
             $map[$index] = [$key, $value];
            return true;
        } else {
            return false;
        }
    }
    $map[$index] = [$key, $value];
    return true;
}

function get($map, $key, $defaultValue = null) {
    $index = hash($key);
    if (empty($map) || $map[$index][0] != $key) {
        return $defaultValue;
    }
    return $map[$index][1];
}


// make() — create a new dictionary
// set($map, $key, $value) — set a value using a key provided. Works the same for creating and changing.
// get($map, $key, $defaultValue = null) — gets a value using the key. 
// 
// <?php
//  
// $map = Map\make();
// $result = Map\get($map, 'key');
// print_r($result); // => null
//  
// $result = Map\get($map, 'key', 'value');
// print_r($result); // => value
//  
// Map\set($map, 'key2', 'value2');
// $result = Map\get($map, 'key2');
// print_r($result); // => value2
