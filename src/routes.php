<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

use App\Controllers\MainController;
use App\Controllers\RestController;
use App\Controllers\UfsController;

$app->group('', function() {
    $this->get("/", MainController::class . ":viewIndex")->setName('index');
    $this->post("/cadastrar", MainController::class . ":postCadastrar");
    $this->post("/contato", MainController::class . ":postContato");
    $this->post("/esqueceu-a-senha", MainController::class . ":postEsqueceuSenha");
    
    $this->post("/solicitar-portal", MainController::class . ":postSolicitarPortal");
    $this->post("/verificar-email", MainController::class . ":postVerificarEmail");
    $this->post("/login", MainController::class . ":postLogin");
})->add(new GuestMiddleware($container));

$app->group('', function() {
    $this->get("/home", MainController::class . ":viewHome")->setName("home");
    $this->get("/termos-de-busca", MainController::class . ":viewTermos")->setName("termos");
    $this->get("/minha-conta", MainController::class . ":viewProfile")->setName("profile");
    $this->get("/adm-pessoas", MainController::class . ":viewAdmPessoas")->setName("adm-pessoas");
    $this->get("/adm-portais", MainController::class . ":viewAdmPortais")->setName("adm-portais");
    $this->get("/adm-vagas", MainController::class . ":viewAdmVagas")->setName("adm-vagas");
    $this->get("/adm-historico", MainController::class . ":viewAdmHistorico")->setName("adm-historico");

    // API REST
    $this->get("/api/conta", RestController::class . ":getConta");

    $this->get("/get-pessoas[/{id}]", MainController::class . ":getPessoas");
    $this->get("/get-portais", MainController::class . ":getPortais");
    $this->get("/sair", MainController::class . ":viewSair")->setName("sair");
})->add(new AuthMiddleware($container));

// API Tabelas
$app->get("/api/ufs", UfsController::class . ":getUfs");
//$app->get("/api/ufs/{id}");
//$app->get("/api/ufs/{nome}");
