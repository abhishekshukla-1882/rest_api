<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Url;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Config;
use Phalcon\Http\Response;
use Phalcon\Mvc\Micro;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


$config = new Config([]);

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
require("../app/vendor/autoload.php");
require('../vendor/autoload.php');




// Register an autoloader
$loader = new Loader();

$container = new FactoryDefault();
$loader->registerDirs(
    [
        APP_PATH . "/controllers/",
        APP_PATH . "/models/",
    ]
);
$loader = new Loader();
$container->set(
    'response', 
    function(){
    return new Response();
});

$loader->registerNamespaces(
    [
        'Api\Handlers'=>APP_PATH.'/handlers'    
    ]
    );
    $loader->register();

    $prod = new Api\Handlers\Product();
  
    $app = new Micro($container);

    $container->set(
        'mongo',
        function () {
            $mongo = new \MongoDB\Client("mongodb://mongo", array("username"=>'root', "password"=>"password123"));
            // mongo "mongodb+srv://sandbox.g819z.mongodb.net/myFirstDatabase" --username root
    
            return $mongo->store;
        },
        true
    );
    $app->get(
        '/product/search/{name}',
        [
            $prod,
            'search'
        ]
    );
    $app->get(
        '/product/get',
        [
            $prod,
            'get'
        ]
    );
    $app->get(
        '/login/get',
        [
            $prod,
            'login'
        ]
    );

    // ---------------------------------"per_page" :  to provide how many products user want in response---
    $app->get(
        '/product/perpage/{no_of_res}',
        [
            $prod,
            'responses'
        ]
    );
// ------------------------------------"page": currently which page data user want-----------------------
    $app->get(
        '/product/pages/{no}',
        [
            $prod,
            'pages'
        ]
    );
    //-----------------------------------------MiddleWare------------------------------------
    $app->before(
        function () use ($app) {
            $controllr =  $_SERVER['REQUEST_URI'];

        if (!strpos($controllr,'login/get')) {
            $token = $app->request->getQuery('token');
            // echo $token;
            $key = "example_key";

            // die;
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            //  print_r($decoded);
            //  die;
            if($decoded->role == 'admin'){
                echo "granted";
                die;
            }
            else{
                echo "Token is not valid";
                die;
            }

        }
            
            return true;
        }
    );
    
    $app->handle(
        $_SERVER['REQUEST_URI']
    );