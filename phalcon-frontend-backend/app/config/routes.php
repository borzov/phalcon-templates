<?php

$router = new \Phalcon\Mvc\Router();

$router->add(
       '/:controller/:action/:params',
           array(
               'namespace'  => 'Application\Controllers\Frontend',
               'controller' => 1,
               'action'     => 2,
               'params'     => 3,
           )
);

$router->add(
       '/:controller',
           array(
               'namespace'  => 'Application\Controllers\Frontend',
               'controller' => 1
           )
);

$router->add(
       '/admin/:controller/:action/:params',
           array(
               'namespace'  => 'Application\Controllers\Backend',
               'controller' => 1,
               'action'     => 2,
               'params'     => 3,
           )
);

$router->add(
       '/admin/:controller',
           array(
               'namespace'  => 'Application\Controllers\Backend',
               'controller' => 1
           )
);

$router->add(
       '/admin',
           array(
               'namespace' => 'Application\Controllers\Backend',
               'action'    => 'index'
           )
);

// Options
$router->removeExtraSlashes(true);

// Return router rules
return $router;