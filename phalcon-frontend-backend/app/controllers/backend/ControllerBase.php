<?php

namespace Application\Controllers\Backend;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    public function initialize()
    {

        // Default title
        $this->tag->setTitle("Backend");

        // Assets manager
        $this->assets->collection('headerStyles')
                     ->addCss('assets/css/backend.css', true);

    }

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getVIewsDir() . 'backend/');
    }

}