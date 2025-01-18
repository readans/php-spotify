<?php

/** CONFIGURATIONS */
require 'configuration/load.php';
require 'configuration/Middleware.php';

/** SERVICES */
require_once 'services/HttpClient.php';
require_once 'services/OAuth2.php';

/** MODELS */
require_once 'models/Album.php';

/** CONTROLLERS */
require_once 'controllers/Fallback.php';
require_once 'controllers/Login.php';
require_once 'controllers/OAuth2.php';
require_once 'controllers/Home.php';

session_start();

function handleRequest($request, $middlewares, $cb)
{
  $pipeline = array_reduce(
    array_reverse($middlewares),
    fn($next, $middleware) => fn($request) => $middleware->handle($request, $next),
    fn($request) => $cb()
  );

  $pipeline($request);
}

/** ROUTER */
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

switch ($path) {
  case '/':
  case '/login':
    $middlewares = [new Configuration\LoginMiddleware()];
    handleRequest($path, $middlewares, function () {
      $controller = new Controller\Login();
      $controller->index();
    });
    break;
  case '/logout':
    $middlewares = [];
    handleRequest($path, $middlewares, function () {
      $controller = new Controller\Login();
      $controller->logout();
    });
    break;
  case '/callback':
    $middlewares = [];
    handleRequest($path, $middlewares, function () {
      $controller = new Controller\OAuth2();
      $controller->callback();
    });
    break;
  case '/home':
    $middlewares = [new Configuration\AuthMiddleware()];
    handleRequest($path, $middlewares, function () {
      $controller = new Controller\Home();
      $controller->index();
    });
    break;
  default:
    $middlewares = [];
    handleRequest($path, $middlewares, function () {
      $controller = new Controller\Fallback();
      $controller->notFound();
    });
    break;
}
