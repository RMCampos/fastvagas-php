-- Obter últimas vagas de uma pessoa
SELECT pessoas_vagas.id
    ,vagas.nome_vaga
    ,portais.nome
    ,vagas.url
FROM pessoas_vagas
JOIN vagas ON (
    vagas.id = pessoas_vagas.vagas_id
)
JOIN portais ON (
    portais.id = vagas.portais_id
)
WHERE pessoas_vagas.pessoas_id = 1
ORDER BY pessoas_vagas.created_at DESC;

-- Obter top vagas em algum lugar
SELECT vagas.nome_vaga
    ,portais.nome
    ,count(nome_simplificado) AS hits
FROM vagas
JOIN portais ON (
    portais.id = vagas.portais_id
)
WHERE portais.cidade = 'Joinville'
    AND portais.uf = 'SC'
GROUP BY vagas.nome_vaga
    ,portais.nome;