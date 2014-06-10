<?php

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new \Phalcon\DI\FactoryDefault();

/**
 * A component that allows manage static resources such as css stylesheets or javascript libraries in a web application
 */
$di->set(
   'assets',
       function (){
           return new \Phalcon\Assets\Manager();
       },
       true
);

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set(
   'url',
       function () use ($config){
           $url = new \Phalcon\Mvc\Url();
           $url->setBaseUri($config->application->baseUri);
           return $url;
       },
       true
);

/**
 * Setting up the view component
 */
$di->set(
   'view',
       function () use ($config){

           $view = new \Phalcon\Mvc\View();

           $view->setViewsDir($config->application->viewsDir);

           $view->registerEngines(
                array(
                    '.volt'  => function ($view, $di) use ($config){

                            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

                            $volt->setOptions(
                                 array(
                                     'compiledPath'      => $config->application->cacheDir,
                                     'compiledSeparator' => '_'
                                 )
                            );

                            return $volt;
                        },
                    '.phtml' => '\Phalcon\Mvc\View\Engine\Php'
                )
           );

           return $view;
       },
       true
);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set(
   'db',
       function () use ($config){
           return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
               'host'     => $config->database->host,
               'username' => $config->database->username,
               'password' => $config->database->password,
               'dbname'   => $config->database->dbname,
               'charset'  => $config->database->charset
           ));
       }
);

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set(
   'modelsMetadata',
       function (){
           return new \Phalcon\Mvc\Model\Metadata\Memory();
       }
);

/**
 * Start the session the first time some component request the session service
 */
$di->set(
   'session',
       function (){
           $session = new \Phalcon\Session\Adapter\Files();
           $session->start();
           return $session;
       }
);

/**
 * Component responsible for instantiating controllers and executing the required actions on them in an MVC application
 */
$di->set(
   'dispatcher',
       function (){
           $dispatcher = new \Phalcon\Mvc\Dispatcher();
           $dispatcher->setDefaultNamespace('Application\Controllers\Frontend');
           return $dispatcher;
       }
);

/**
 * Load routes
 */
$di->set(
   'router',
       function (){
           return require __DIR__ . '/routes.php';
       },
       true
);