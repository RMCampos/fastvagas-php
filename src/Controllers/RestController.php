<?php

namespace App\Controllers;

use App\Models\Cidade;
use App\Models\Uf;

class RestController extends Controller {
    public function getConta($request, $response) {
        $pessoa = $this->auth->pessoa();
        $cidade = Cidade::find($pessoa->cidades_id);
        $uf = Uf::find($cidade->ufs_id);

        $data = array(
            "pessoa" => $pessoa,
            "cidade" => $cidade,
            "uf" => $uf,
        );

        return $response->withJson($data);
    }
}