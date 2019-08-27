<?php



use Aura\SqlQuery\QueryFactory;
use DI\ContainerBuilder;


use FastRoute\RouteCollector;
use League\Plates\Engine;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
    Engine::class    =>  function() {
        return new Engine('../app/Views');
    },

  

    PDO::class => function() {
        $driver = config('database.driver');
        $host = config('database.host');
        $database_name = config('database.database_name');
        $username = config('database.username');
        $password = config('database.password');

        return new PDO("$driver:host=$host;dbname=$database_name", $username, $password);
    },

   

    QueryFactory::class  =>  function() {
        return new QueryFactory('mysql');
    }
]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

$r->get('/', ['App\Controllers\HomeController', 'index']);

$r->post('/login', ['App\Controllers\HomeController', 'login']);

$r->get('/createPost', ['App\Controllers\HomeController', 'create']);
$r->get('/logout', ['App\Controllers\HomeController', 'logout']);
$r->post('/posts', ['App\Controllers\HomeController', 'store']);

$r->addGroup('/admin', function (RouteCollector $r) {
    $r->get('', ['App\Controllers\Admin\HomeController', 'index']);
  
    $r->post('/updatePost/{id:\d+}', ['App\Controllers\Admin\HomeController', 'updatePost']);


});

});


$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
$uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
case FastRoute\Dispatcher::NOT_FOUND:
// ... 404 Not Foundexit
exit("404");
break;
case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
$allowedMethods = $routeInfo[1];

dd('Метод запроса не верный');
break;
case FastRoute\Dispatcher::FOUND:
$handler = $routeInfo[1];
$vars = $routeInfo[2];

$container->call($handler, $vars);

break;
}