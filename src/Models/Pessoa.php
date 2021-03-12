<?php
/*
CREATE TABLE pessoas (
    id INT AUTO_INCREMENT,
    nome VARCHAR(10) NOT NULL,
    sobrenome VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cidades_id VARCHAR(100) NOT NULL,
    desativado CHAR(1) NOT NULL,
    data_vencimento INT NOT NULL,
    is_admin CHAR(1) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    protected $table = "pessoas";
    
    protected $fillable = [
        "nome",
        "sobrenome",
        "email",
        "senha",
        "cidades_id",
        "desativado",
        "data_vencimento",
        "is_admin",
    ];
}