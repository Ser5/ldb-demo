<?php
/**
 * @var array $templateOutputData
 * @var int   $minClassId
 * @var int   $maxClassId
 */


$templateOutputData['class_id']                = readline("Class number to join [$minClassId-$maxClassId]: ");
$templateOutputData['student_data']['type_id'] = readline("Student type (1 - leader, 2 - follower): ");
$templateOutputData['student_data']['name']    = readline("Student name: ");
