<?php

/*
CREATE TABLE ufs (
    id INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model {
    protected $table = "ufs";
    
    protected $fillable = [
        "id",
        "nome"
    ];
}