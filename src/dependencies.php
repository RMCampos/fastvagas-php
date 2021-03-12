<?php

$container = $app->getContainer();

// database
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container["settings"]["db"]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container["db"] = function($container) use ($capsule) {
    return $capsule;
};

// auth
$container["auth"] = function($container) {
    return new \App\Auth\Auth;
};

// flash
$container["flash"] = function($container) {
    return new \Slim\Flash\Messages;
};

// views
$container["view"] = function($container) {
    $view = new \Slim\Views\Twig(__DIR__ . "/../resources/views", [
        "cache" => false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal("auth", [
        "in" => $container->auth->in(),
        "pessoa" => $container->auth->pessoa()
    ]);

    $view->getEnvironment()->addGlobal("flash", $container->flash);
    return $view;
};

// validation
/*
$container["validator"] = function($container) {
    return new \App\Validation\Validator;
};
*/

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
