(function() {
    if ($('#adm-portais').length === 1) {
        'use strict';

        function AdmPortais(j) {
            var self = this,
                tblPortais;

            start();

            self.selectedIndex = ko.observable(-1);

            self.alterar = alterar;
            self.excluir = excluir;

            function start() {
                tblPortais = $('#tblPortais').DataTable({
                    ajax: {
                        url: 'get-portais',
                        dataType: 'json',
                        cache: false,
                        contentType: 'application/json; charset=utf8',
                        dataSrc: function(json){
                            return JSON.parse(JSON.stringify(json));
                        }
                    },
                    select: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
                    },
                    columns: [
                        { data: 'id', width: '10px' },
                        { data: 'nome' },
                        { data: 'cod_cidade' },
                        { data: 'nome_cidade' },
                        { data: 'cod_uf' },
                        { data: 'nome_uf' }
                    ]
                });
                tblPortais.on("select", function(e, dt, type, indexed) {
                    self.selectedIndex(indexed[0]);
                });
                tblPortais.on("deselect", function(e, dt, type, indexed) {
                    self.selectedIndex(-1);
                });
            }

            function alterar() {
                if (self.selectedIndex() < 0) {
                    bootbox.alert('Selecione um portal para alterar!');
                    return;
                }

                bootbox.alert('OK!');
            }

            function excluir() {
                //
            }
        }

        ko.applyBindings(new AdmPortais(jQuery), $('#adm-portais')[0]);
    }
})();