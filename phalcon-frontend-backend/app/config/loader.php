<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering namespaces using directories taken from the configuration file
 */
$loader->registerNamespaces(
       array(
           'Application\Controllers\Backend'  => $config->application->controllersDir . 'backend/',
           'Application\Controllers\Frontend' => $config->application->controllersDir . 'frontend/',
           'Application\Models'               => $config->application->modelsDir,
           'Application'                      => $config->application->libraryDir
       )
)->register();