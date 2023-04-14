<?php
use App\Controller\BaseController;
use App\Controller\ExecController;
use App\Controller\HomeController;
use KrzysztofMoskalik\ClassLoader\ClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__ . '/../src/views');
$twig = new Environment($loader, [
    'cache' => false
]);

$homeRoute = new Route('/', ['_controller' => HomeController::class]);
$execRoute = new Route('/exec', ['_controller' => ExecController::class]);

$routes = new RouteCollection();
$routes->add('home', $homeRoute);
$routes->add('exec', $execRoute);

$context = new RequestContext();
$request = Request::createFromGlobals();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->match($request->getRequestUri());
} catch (\Exception $e) {
    $parameters = $matcher->match('/');
}



$loader = new ClassLoader();
$controllers = $loader->loadClassesFromDirectory(
    __DIR__ . '/../src/Controller',
    [$twig, $request, $parameters],
);

/** @var BaseController $controller */
$filteredControllers = array_filter($controllers, fn ($object) => get_class($object) === $parameters['_controller']);
$controller = reset($filteredControllers);

$controller->run();
