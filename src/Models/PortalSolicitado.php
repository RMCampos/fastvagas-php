<?php

/*
CREATE TABLE portais_solicitados (
    id INT AUTO_INCREMENT,
    cidades_id INT NOT NULL,
    nome_pessoa VARCHAR(50) NOT NULL,
    email_pessoa VARCHAR(100) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(cidades_id) REFERENCES cidades(id)
);
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortalSolicitado extends Model {
    protected $table = "portais_solicitados";
    
    protected $fillable = [
        "cidades_id",
        "nome_pessoa",
        "email_pessoa",
    ];
}