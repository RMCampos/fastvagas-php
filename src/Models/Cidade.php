<?php

/*
CREATE TABLE cidades (
    id INT NOT NULL,
    ufs_id INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(ufs_id) REFERENCES ufs(id)
);
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {
    protected $table = "cidades";
    
    protected $fillable = [
        "id",
        "ufs_id",
        "nome",
    ];
}