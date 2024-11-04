<?php

require_once __DIR__.'/lib/Dance/DanceClassesManager.php';
require_once __DIR__.'/lib/Dance/DanceClass.php';
require_once __DIR__.'/lib/Dance/Result.php';
require_once __DIR__.'/lib/Dance/ConsoleInterface.php';

use Dance\{DanceClassesManager, ConsoleInterface};

class DIC
{
    private static ?DanceClassesManager $danceClassesManager = null;
    private static ?ConsoleInterface    $consoleInterface    = null;

    public static function danceClassesManager(): DanceClassesManager
    {
        if (!static::$danceClassesManager) {
            $db = require __DIR__.'/db.php';
            static::$danceClassesManager = new DanceClassesManager($db);
        }
        return static::$danceClassesManager;
    }

    public static function consoleInterface(): ConsoleInterface
    {
        if (!static::$consoleInterface) {
            static::$consoleInterface = new ConsoleInterface(__DIR__.'/templates/');
        }
        return static::$consoleInterface;
    }
};
