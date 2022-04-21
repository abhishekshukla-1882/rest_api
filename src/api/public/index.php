<?php 
// $_SERVER["REQUEST_URI"] = str_replace("/api/","/",$_SERVER["REQUEST_URI"]);

use Phalcon\Config;
use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response;
use Phalcon\Mvc\View;
use Phalcon\Url;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Micro;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/');
// print_r(APP_PATH);
require("../vendor/autoload.php");
// require('../../vendor/autoload.php');

$loader = new Loader();
$container= new FactoryDefault();
$loader->registerDirs(
    [
        APP_PATH . "/controllers",
        APP_PATH . "/model",
    ]
    );

$loader = new Loader();
$container->set(
    'response',
    function(){
        return new Response();
    }
);
// ------------------------------------------NameSpace Register----------------------
$loader->registerNamespaces(
    [
        'Api\Handler'=>APP_PATH.'/handlers'
    ]
    );
    $loader->register();
// --------------------------------------------------------------------------------------------------------
// ------------------------------------------Rest------------------------------------------------------------
    $prod = new Api\Handlers\Product();
    $app = new Micro($container);
// ----------------------------------------Connecting Mongo database-----------------------------------------
    $container->set(
        'mongo',
        function(){
            $mongo = new \MongoDB\Client("mongodb://mongo",array("username"=>"root","password"=>"password123"));
        }
    );
// -----------------------------------------Setting up views-------------------------------------------------
    $container->set(
        'view',
        function(){
            $view = new View();
            $view->setViewsDir(
                APP_PATH.'/views',

            );
        }
    );
//----------------------------------------------Setting up Url--------------------------------------------
    $container->set(
        'url',
        function(){
            $url = new Url();
            $url->setBaseUri(
                '/'
            );
        }
    );
// ---------------------------------Setting up the app --------------------------------------------------
    $application = new Application($container);
//  ---------------------------------------Register Namespace -------------------------------------------
$loader->registerNamespaces(
    [
        'Api\Handlers'=>APP_PATH . '/handlers'
    ]
    );
    $loader->register();
    $product = new Api\Handlers\Product();
    $app = new Micro($container);
// ---------------------------------- Routing Urls to api ---------------------------------------------------
$app->get(
    '/product/search/{name}',
    [
        $product,
        'search'
    ]
);
// -----------------------------------------------------Product get--------------------------------------------------------
$app->get(
    '/product/get',
    [
        $product,
        'get'
    ]
);
// -----------------------------------------login Url (Token Access) --------------------------------------------------------
$app->get(
    '/api/login/get',
    [
        $product,
        'login'
    ]
);

// ---------------------------------"per_page" :  to provide how many products user want in response---------
$app->get(
    '/product/perpage/{no_of_res}',
    [
        $product,
        'responses'
    ]
);
// ------------------------------------"page": currently which page data user want-----------------------
$app->get(
    '/product/pages/{no}',
    [
        $product,
        'pages'
    ]
);
//-------------------------------------- MiddleWare---------------------------------------------------------------------------
$app->before(
    function () use($app){
        $controllr =  $_SERVER['REQUEST_URI'];

        if (!strpos($controllr,'api/login/get')) {
            $token = $app->request->getQuery('token');
            // echo $token;
            $key = "example_key";

            // die;
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            //  print_r($decoded);
            //  die;
            if($decoded->role == 'admin'){
                echo "granted <br>";
                // die;
            }
            else{
                echo "Token is not valid";
                die;
            }

        }
            
            return true;
        }
    
    );
// -------------------------------------Handle request---------------------------------------------



try{
    $app->handle(
        $_SERVER['REQUEST_URI']
    
    );
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}