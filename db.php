<?php

$db = [
    'classes' => [
        1 => [
            'capacity' => 3,
        ],
        2 => [
            'capacity' => 4,
        ],
        3 => [
            'capacity' => 5,
        ],
        4 => [
            'capacity'  => 4,
            'leaders'   => ['Steve Jobs', 'Ballmer'],
            'followers' => ['John Doe', 'Jane Doe'],
        ],
    ],
];

foreach ($db['classes'] as $classId => &$classData) {
    $classData += [
        'id'        => $classId,
        'leaders'   => [],
        'followers' => [],
    ];
}
unset($classData);

return $db;
