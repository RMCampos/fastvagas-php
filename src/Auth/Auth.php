<?php

namespace App\Auth;

use App\Models\Pessoa;

class Auth {
    public function pessoa() {
        if (isset($_SESSION["pessoa_id"])) {
            return Pessoa::find($_SESSION["pessoa_id"]);
        }
    }

    public function in() {
        return isset($_SESSION["pessoa_id"]);
    }

    public function loggout() {
        unset($_SESSION["pessoa_id"]);
    }

    public function doLogin($pessoaObj) {
        $_SESSION["pessoa_id"] = $pessoaObj->id;
    }
}
