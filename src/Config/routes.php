<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('booksEdit', new Routing\Route('/edit/{id}', array(
    'id' => 0,
    '_controller' => 'App\\Books\\Controller\\defaultController::editAction'
)));

$routes->add('booksRemove', new Routing\Route('/remove/{id}', array(
    'id' => 0,
    '_controller' => 'App\\Books\\Controller\\defaultController::removeAction'
)));

$routes->add('booksGetJSON', new Routing\Route('/get/{page}/{sortBy}/{type}/{filter}', array(
    'page' => 1,
    'sortBy' => 'id',
    'type' => 'desc',
    'filter' => '',
    '_controller' => 'App\\Books\\Controller\\defaultController::getAction'
)));

$routes->add('booksAdd', new Routing\Route('/add', array(
    '_controller' => 'App\\Books\\Controller\\defaultController::addAction'
)));

$routes->add('books', new Routing\Route('/', array(
    '_controller' => 'App\\Books\\Controller\\defaultController::indexAction'
)));

return $routes;