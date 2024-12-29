<?php

namespace Config;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

// Facade Pattern
class Logger
{
    private static ?Logger $instance = null;
    private MonologLogger $logger;

    private function __construct()
    {
        $this->logger = new MonologLogger('guruman');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', MonologLogger::DEBUG));
    }

    /**
     * @return Logger
     */
    public static function getInstance(): Logger
    {
        if (!self::$instance) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function emergency(string|\Stringable $message, array $context = []): void
    {
        self::getInstance()->logger->emergency($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function alert($message, array $context = [])
    {
        self::getInstance()->logger->alert($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function critical($message, array $context = [])
    {
        self::getInstance()->logger->critical($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function error($message, array $context = [])
    {
        self::getInstance()->logger->error($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function warning($message, array $context = [])
    {
        self::getInstance()->logger->warning($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function notice($message, array $context = [])
    {
        self::getInstance()->logger->notice($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function info($message, array $context = [])
    {
        self::getInstance()->logger->info($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function debug($message, array $context = [])
    {
        self::getInstance()->logger->debug($message, $context);
    }

    /**
     * @param string|\Stringable $message
     * @param array $context
     */
    public static function log($level, $message, array $context = [])
    {
        self::getInstance()->logger->log($level, $message, $context);
    }
}
