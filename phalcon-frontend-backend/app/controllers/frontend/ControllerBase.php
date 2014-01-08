<?php

namespace Application\Controllers\Frontend;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    public function initialize()
    {

        // Default title
        $this->tag->setTitle("Frontend");

        // Assets manager
        $this->assets->collection('header')
                     ->addCss('assets/css/frontend.css', true);
        //                ->setTargetPath('/assets/css/application.css')
        //                ->setTargetUri('assets/css/application.css')
        //                ->addFilter(new Phalcon\Assets\Filters\Cssmin())
        //                ->join(true);

    }

    public function afterExecuteRoute()
    {
        $this->view->setViewsDir($this->view->getVIewsDir() . 'frontend/');
    }

}