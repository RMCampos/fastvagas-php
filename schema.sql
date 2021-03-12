CREATE TABLE cidades (
    id INT NOT NULL,
    ufs_id INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(ufs_id) REFERENCES ufs(id)
);
CREATE TABLE historico (
    id INT AUTO_INCREMENT,
    pessoas_id INT NOT NULL,
    tipo CHAR(1) NOT NULL, --Inclusao, Alteracao, Exclusao
    tabela_origem VARCHAR(30) NOT NULL,
    registro_antes VARCHAR(2000) NULL,
    registro_depois VARCHAR(2000) NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(pessoas_id) REFERENCES pessoas(id)
);
-- tamanho: 550
CREATE TABLE pessoas (
    id INT AUTO_INCREMENT,
    nome VARCHAR(10) NOT NULL,
    sobrenome VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cidades_id INT NOT NULL,
    desativado CHAR(1) NOT NULL,
    data_vencimento INT NOT NULL,
    is_admin CHAR(1) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);
-- tamanho: 350
CREATE TABLE pessoas_emails (
    pessoas_id INT NOT NULL,
    email_1 VARCHAR(100) NULL,
    email_2 VARCHAR(100) NOT NULL,
    email_3 VARCHAR(100) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(pessoas_id),
    FOREIGN KEY(pessoas_id) REFERENCES pessoas(id)
);
-- tamanho: 100
CREATE TABLE pessoas_portais (
    pessoas_id INT NOT NULL,
    portais_id INT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(pessoas_id, portais_id),
    FOREIGN KEY(pessoas_id) REFERENCES pessoas(id),
    FOREIGN KEY(portais_id) REFERENCES portais(id)
);
-- tamanho: 1050
CREATE TABLE pessoas_termos (
    pessoas_id INT NOT NULL,
    termos VARCHAR(1000) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(pessoas_id),
    FOREIGN KEY(pessoas_id) REFERENCES pessoas(id)
);
-- tamanho: 150
CREATE TABLE pessoas_vagas (
    id INT AUTO_INCREMENT,
    pessoas_id INT NOT NULL,
    vagas_id INT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(pessoas_id) REFERENCES pessoas(id),
    FOREIGN KEY(vagas_id) REFERENCES vagas(id)
);
-- tamanho: 482
CREATE TABLE portais (
    id INT AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    url VARCHAR(300) NOT NULL,
    cidades_id INT NOT NULL,
    data_desativacao DATE NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(cidades_id) REFERENCES cidades(id)
);
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
CREATE TABLE ufs (
    id INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);
-- tamanho: 970
CREATE TABLE vagas (
    id INT AUTO_INCREMENT,
    portais_id INT NOT NULL,
    nome_vaga VARCHAR(100) NOT NULL,
    nome_simplificado VARCHAR(50) NOT NULL,
    nome_empresa VARCHAR(100) NULL,
    tipo VARCHAR(30) NULL,
    mini_texto VARCHAR(300) NOT NULL,
    data_publicacao VARCHAR(30) NULL,
    url VARCHAR(300) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(portais_id) REFERENCES portais(id)
);
