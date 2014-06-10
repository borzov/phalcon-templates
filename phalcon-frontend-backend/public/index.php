<?php

/**
 * Set the error reporting level
 */
error_reporting(E_ALL);

/**
 * Sets locale information
 */
setlocale(LC_ALL, 'ru_RU.UTF-8');

/**
 * Enable framework debugger
 */
(new \Phalcon\Debug())->listen();

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    $response = $application->handle()->getContent();

} catch(Phalcon\Exception $e) {
    $response = $e->getMessage();
} catch(PDOException $e) {
    $response = $e->getMessage();
}

echo $response;