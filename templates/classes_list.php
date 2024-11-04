<?php
/**
 * @var \Dance\DanceClass[] $classesList
 */


$print = function (int $level, string $message) {
    echo str_repeat('    ', $level) . $message . "\n";
};



$print(0, "Classes list");
$print(0, "============");

foreach ($classesList as $class) {
    $print(0, "Class #$class->id. Capacity $class->capacity. Free places: $class->freePlacesCount.");

    $print(1, "Leaders: $class->leadersCount");
    foreach ($class->leaderNamesList as $name) {
        $print(2, $name);
    }

    $print(1, "Followers: $class->followersCount");
    foreach ($class->followerNamesList as $name) {
        $print(2, $name);
    }

    echo "\n";
}
