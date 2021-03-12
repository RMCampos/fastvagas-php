<?php

namespace App\Controllers;

use App\Models\Uf;

class UfsController extends Controller {
    public function getUfs($request, $response) {
        $ufs = Uf::orderBy('nome')->get();
        return $response->withJson($ufs);
    }
}