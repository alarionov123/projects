<?php

namespace App\findFilesByName;

use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\array_flatten;


function helper ($tree, string $current) {
    $name = getName($tree);
    if (isFile($tree)) {
        return $current;
    }
    $children = getChildren($tree);
    $map = array_map(function ($child) use ($current) {
       return helper($child, $current . '/' . getName($child));
    }, $children);
    return array_flatten($map);
}

function findFilesByName($tree, $string) {
$map = array_map(function($child) use ($string){
   if (str_contains(strrchr($child, '/'), $string)) {
       return $child;
   }
 return [];
}, helper($tree, ''));
return array_flatten($map);
}


// <?php
//  
// use function Php\Immutable\Fs\Trees\trees\mkdir;
// use function Php\Immutable\Fs\Trees\trees\mkfile;
// use function App\findFilesByName\findFilesByName;
//  
// $tree = mkdir('/', [
//     mkdir('etc', [
//         mkdir('apache'),
//         mkdir('nginx', [
//             mkfile('nginx.conf', ['size' => 800]),
//         ]),
//         mkdir('consul', [
//             mkfile('config.json', ['size' => 1200]),
//             mkfile('data', ['size' => 8200]),
//             mkfile('raft', ['size' => 80]),
//         ]),
//     ]),
//     mkfile('hosts', ['size' => 3500]),
//     mkfile('resolve', ['size' => 1000]),
// ]);
//  
// findFilesByName($tree, 'co');
// // ['/etc/nginx/nginx.conf', '/etc/consul/config.json']
