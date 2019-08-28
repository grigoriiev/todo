<?php

use App\Services\Database;

use JasonGrimes\Paginator;

function view($path, $parameters = [])
{
    global $container;
    $plates = $container->get(\League\Plates\Engine::class);
    echo $plates->render($path, $parameters);
}

function back()
{
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

function redirect($path)
{
    header("Location: $path");
    exit;
}
function abort($type)
{
    switch ($type) {
        case 404:
            $view = components(\League\Plates\Engine::class);
            echo $view->render('errors/404');exit;
        break;
    }
}

function config($field)
{
    $config = require '../app/config.php';
    return array_get($config, $field);
}






function paginate($count, $page, $perPage, $url)
{
    $totalItems = $count;
    $itemsPerPage = $perPage;
    $currentPage = $page;
    $urlPattern = $url;

    $paginator =  new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    return $paginator;

}

function paginator($paginator)
{
    include config('views_path') . '/paginator.php';
}



function components($name)
{
    global $container;
    return $container->get($name);
}