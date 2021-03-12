<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware {
    public function __invoke($request, $response, $next) {
        if (!$this->container->auth->in()) {
            return $response->withRedirect($this->container->router->pathFor('index'));
        }
        
        $response = $next($request, $response);
        return $response;
    }
}