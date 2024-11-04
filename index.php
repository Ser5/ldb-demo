<?php

require_once __DIR__.'/_init.php';



for (;;) {
    $classesList = DIC::danceClassesManager()->getList();

    DIC::consoleInterface()->showClassesList($classesList);

    $outputData = DIC::consoleInterface()->readInput($classesList);

    $r = DIC::danceClassesManager()->addStudent(
        (int)$outputData['class_id'],
        $outputData['student_data']
    );

    DIC::consoleInterface()->showInputResult($r);
}
