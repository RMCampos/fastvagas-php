<?php

namespace App\Controllers;

use App\Models\Cidade;
use App\Models\Pessoa;
use App\Models\Portal;
use App\Models\PortalSolicitado;
use App\Utils\UFUtils;

class MainController extends Controller {
    public function viewIndex($request, $response) {
        return $this->view->render($response, "index.twig");
    }
    
    public function viewHome($request, $response) {
        return $this->view->render($response, "home.twig");
    }
    
    public function viewTermos($request, $response) {
        return $this->view->render($response, "termos.twig");
    }
    
    public function viewProfile($request, $response) {
        return $this->view->render($response, "minha-conta.twig");
    }
    
    public function viewAdmPessoas($request, $response) {
        return $this->view->render($response, "adm-pessoas.twig");
    }
    
    public function viewAdmPortais($request, $response) {
        return $this->view->render($response, "adm-portais.twig");
    }
    
    public function viewAdmVagas($request, $response) {
        return $this->view->render($response, "adm-vagas.twig");
    }
    
    public function viewAdmHistorico($request, $response) {
        return $this->view->render($response, "adm-historico.twig");
    }
    
    public function getPortais($request, $response) {
        $portais = Portal::get();
        
        foreach ($portais as $portal) {
            $portal->cod_cidade = 0;
            $portal->nome_cidade = $portal->cidade;
            $portal->cod_uf = $portal->uf;
            $portal->nome_uf = UFUtils::getNomeUFPorCodigoIbge($portal->uf);
        }
        
        return $response->withJson($portais);
    }
    
    public function viewSair($request, $response) {
        $this->auth->loggout();
        return $response->withRedirect($this->router->pathFor('index'));
    }
    
    public function postLogin($request, $response) {
        $email = $request->getParam("email");
        $senha = $request->getParam("senha");
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $response->withStatus(401);
        }
        
        $pessoa = Pessoa::where("email", $email)->first();
        if (!$pessoa) {
            return $response->withStatus(401);
        }
        
        if (!password_verify($senha, $pessoa->senha)) {
            return $response->withStatus(401);
        }
        
        $this->auth->doLogin($pessoa);
        
        return $response->withStatus(200);
    }
    
    public function postVerificarEmail($request, $response) {
        $email = $request->getParam("email");
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $response->withStatus(401);
        }
        
        $pessoa = Pessoa::where("email", $email)->first();
        if ($pessoa) {
            return $response->withStatus(401);
        }
        
        return $response->withStatus(200);
    }
    
    public function postCadastrar($request, $response) {
        $nome = $request->getParam("nome");
        $sobrenome = $request->getParam("sobrenome");
        $email = $request->getParam("email");
        $senha = $request->getParam("senha");
        $cod_uf = $request->getParam("cod_uf");
        $nome_uf = $request->getParam("nome_uf");
        $cod_cidade = $request->getParam("cod_cidade");
        $nome_cidade = $request->getParam("nome_cidade");
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $response->withJson("E-mail inválido", 400);
        }
        
        $pessoa = Pessoa::where("email", $email)->first();
        if ($pessoa) {
            return $response->withJson("E-mail já cadastrado!", 400);
        }
        
        $portal = Portal::where("cidades_id", $cod_cidade)->first();
        if (!$portal) {
            // TODO: enviar e-mail ao admin avisando que a região não é atendida!
            return $response->withJson("Região ainda não atendida!", 400);
        }
        
        $pessoaOK = Pessoa::create([
            "nome"            => $nome,
            "sobrenome"       => $sobrenome,
            "email"           => $email,
            "senha"           => password_hash($senha, PASSWORD_DEFAULT),
            "cidades_id"      => $cod_cidade,
            "desativado"      => 'N',
            "data_vencimento" => 0, // dia do cadastro
            "is_admin"        => 'N',
        ]);
        
        // TODO: enviar e-mail pedindo pra confirmar o e-mail
        
        return $response->withStatus(200);
    }

    public function getPessoas($request, $response) {
        $id = $request->getAttribute("id");
        if ($id == -1) {
            return $response->withJson($this->auth->pessoa());
        } else if (isset($id)) {
            return $response->withJson(Pessoa::find($id));
        }
        return $response->withJson(Pessoa::get()->orderBy('nome'));
    }

    public function postSolicitarPortal($request, $response) {
        $cod_cidade = $request->getParam("cod_cidade");
        $nome_cidade = $request->getParam("nome_cidade");
        $cod_uf = $request->getParam("cod_uf");
        $nome_uf = $request->getParam("nome_uf");
        $nome_pessoa = $request->getParam("nome_pessoa");
        $email_pessoa = $request->getParam("email_pessoa");

        $ps = PortalSolicitado::where("cidades_id", $cod_cidade)->first();

        // Se ninguém solicitou, grava na tabela e envia um e-mail para a 
        // pessoa que solicitou agradecendo.
        if (!$ps) {
            $cidade = Cidade::find($cod_cidade);
            if (!$cidade) {
                $cidade = Cidade::create([
                    "id"     => $cod_cidade,
                    "ufs_id" => $cod_uf,
                    "nome"   => $nome_cidade,
                ]);
            }

            $ps = PortalSolicitado::create([
                "cidades_id"   => $cod_cidade,
                "nome_pessoa"  => $nome_pessoa,
                "email_pessoa" => $email_pessoa,
            ]);

            // chamar emailUtils para disparar email
            return $response->withJson("OK");
        }

        // Se não, apenas retorna avisando que já tem uma solicitação
        else {
            // TODO: salvar o nome e e-mail da pessoa que solicitou
            // pra também receber aviso. Não apenas a primeira, mas todas.
            return $response->withJson("NOK");
        }
    }

    public function postEsqueceuSenha($request, $response) {
        $email = $request->getParam("email");
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $response->withStatus(200);
        }
        
        $pessoa = Pessoa::where("email", $email)->first();
        if (!$pessoa) {
            return $response->withStatus(200);
        }
        
        // TODO: enviar e-mail com lembrete de senha, ou link de reset
        
        return $response->withStatus(200);
    }

    public function postContato($request, $response) {
        return $response->withStatus(200);
    }

}
