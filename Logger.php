<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use Homework\LoggerInterface;
use Homework\FileLogger;
use Homework\ConsoleLogger;
use Homework\Exceptions\LoggerTypeException;

class Logger
{
    /**
     * Return Logger depending on logger type set in environment variables
     */
    public static function get() : LoggerInterface
    {
        $loggerType = getenv("Logger");
        switch ($loggerType) {
            case "false":
            case "file":
            case false:
                return new FileLogger();
                break;
            case "console":
                return new ConsoleLogger();
                break;
            default:
                throw new LoggerTypeException("Invalid logger type supplied!");
                break;
        };
    }
}