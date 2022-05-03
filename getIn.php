<?php

namespace App\Arrays;

function getIn(array $data, $keys) {
    $current = $data;
    foreach($keys as $key) {
    if (is_array($current) && array_key_exists($key, $current)) {
            $current = $current[$key];
      } else {
          return null;
      }
    }
  return $current;
}

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2', null => 3, 'active' => false]
    ]
];

#examples of usage:

getIn($data, ['undefined']); // null
getIn($data, ['user']); // 'ubuntu'
getIn($data, ['user', 'ubuntu']); // null
getIn($data, ['hosts', 1, 'name']); // 'web2'
getIn($data, ['hosts', 0]); // ['name' => 'web1']
getIn($data, ['hosts', 1, null]); // 3
getIn($data, ['hosts', 1, 'active']); // false
