(function() {
    if ($('#minha-conta').length === 1) {
        'use strict';

        function MinhaContaVM(jQ) {
            var self = this;

            self.form_conta = new FormVM('CONTA');

            self.submit_conta = submit_conta;

            iniciar();

            function submit_conta() {
                if (!self.form_conta.valido()) {
                    self.form_conta.erro('Preencha corretamente todos os campos!');
                    return;
                }
    
                self.form_conta.aguarde(true);
                self.form_conta.limpar_mensagens();
                self.form_conta.nome_cidade(self.cidades[self.form_conta.cod_cidade()]);
                
                jQ.post('/cadastrar', self.form_conta.data(), okFn)
                    .fail((jqXHR, responseText, error) => {
                        self.form_conta.erro(jqXHR.responseJSON);
                        self.form_conta.aguarde(false);
    
                        if (jqXHR.responseJSON.includes('Região ainda não atendida')) {
                            self.form_conta.textoBotaoAdicional('Clique AQUI para solicitar atendimento. É free!');
                        }
                    });
                
                function okFn() {
                    self.form_conta.sucesso('Cadastro realizado com sucesso!');
                    self.form_conta.aguarde(false);
                }
            }

            function iniciar() {
                jQ.getJSON('/api/conta', function(response) {
                    self.form_conta.nome_place(response.pessoa.nome);
                    self.form_conta.sobrenome_place(response.pessoa.sobrenome);
                    self.form_conta.email_place(response.pessoa.email);
                    self.form_conta.cod_cidade(response.cidade.id);
                    self.form_conta.nome_cidade(response.cidade.nome);
                    self.form_conta.cod_uf(response.uf.id);
                    self.form_conta.nome_uf(response.uf.nome);
                });
            }
        }

        // recortar foto: https://github.com/fengyuanchen/jquery-cropper

        ko.applyBindings(new MinhaContaVM(jQuery));
    }
})();