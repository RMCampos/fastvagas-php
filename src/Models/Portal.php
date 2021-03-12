<?php

/*
CREATE TABLE portais (
    id INT AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    url VARCHAR(300) NOT NULL,
    cidades_id VARCHAR(100) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model {
    protected $table = "portais";
    
    protected $fillable = [
        "nome",
        "url",
        "cidades_id"
    ];
}