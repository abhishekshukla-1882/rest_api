<?php

namespace Multi\Frontend\Controllers;

use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Http\Response\Cookies;

class IndexController extends Controller
{

    public function indexAction(){
        $product = $this->mongo->products->find();
        $this->view->product = $product;

    }
}