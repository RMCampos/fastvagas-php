INSERT INTO pessoas (nome, sobrenome, email, senha, cidade, uf, desativado, data_vencimento, is_admin)
    VALUES ('Ricardo', 'Campos', 'ricardompcampos@gmail.com', '$2y$10$pDslXfaFfRsGW7ndWdPN8.ysAEoK4tW/lYtN8F1wgRtxlBmaBhp3q', 'Joinville', 'SC', 'N', 1, 'S');

INSERT INTO ufs (id, nome) VALUES (12, 'Acre');
INSERT INTO ufs (id, nome) VALUES (27, 'Alagoas');
INSERT INTO ufs (id, nome) VALUES (16, 'Amapá');
INSERT INTO ufs (id, nome) VALUES (13, 'Amazonas');
INSERT INTO ufs (id, nome) VALUES (29, 'Bahia');
INSERT INTO ufs (id, nome) VALUES (23, 'Ceará');
INSERT INTO ufs (id, nome) VALUES (53, 'Distrito Federal');
INSERT INTO ufs (id, nome) VALUES (32, 'Espírito Santo');
INSERT INTO ufs (id, nome) VALUES (52, 'Goiás');
INSERT INTO ufs (id, nome) VALUES (21, 'Maranhão');
INSERT INTO ufs (id, nome) VALUES (51, 'Mato Grosso');
INSERT INTO ufs (id, nome) VALUES (50, 'Mato Grosso do Sul');
INSERT INTO ufs (id, nome) VALUES (31, 'Minas Gerais');
INSERT INTO ufs (id, nome) VALUES (15, 'Pará');
INSERT INTO ufs (id, nome) VALUES (25, 'Paraíba');
INSERT INTO ufs (id, nome) VALUES (41, 'Paraná');
INSERT INTO ufs (id, nome) VALUES (26, 'Pernambuco');
INSERT INTO ufs (id, nome) VALUES (22, 'Piauí');
INSERT INTO ufs (id, nome) VALUES (33, 'Rio de Janeiro');
INSERT INTO ufs (id, nome) VALUES (24, 'Rio Grande do Norte');
INSERT INTO ufs (id, nome) VALUES (43, 'Rio Grande do Sul');
INSERT INTO ufs (id, nome) VALUES (11, 'Rondônia');
INSERT INTO ufs (id, nome) VALUES (14, 'Roraima');
INSERT INTO ufs (id, nome) VALUES (42, 'Santa Catarina');
INSERT INTO ufs (id, nome) VALUES (35, 'São Paulo');
INSERT INTO ufs (id, nome) VALUES (28, 'Sergipe');
INSERT INTO ufs (id, nome) VALUES (17, 'Tocantins');

INSERT INTO cidades (id, ufs_id, nome) VALUES (4209102, 42, 'Joinville');

INSERT INTO portais (nome, url, cidades_id) VALUES ('Joinville Vagas','https://www.joinvillevagas.com.br/',4209102);
INSERT INTO portais (nome, url, cidades_id) VALUES ('SINE Joinville','https://www.sine.com.br/vagas-empregos-em-joinville-sc',4209102);
INSERT INTO portais (nome, url, cidades_id) VALUES ('Infojobs','https://www.infojobs.com.br/empregos-em-joinville,-sc.aspx',4209102);