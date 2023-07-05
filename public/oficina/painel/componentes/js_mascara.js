/**
 * js_mascara.js
 * @version: v1.0.2022
 * @author: Joubert Luna
 *
 *  API JS para busca mascaras em Telefone, Celular, CPF, CNPJ
 * mês, dinheiro, e busca de endereço pelo viacep.
 *
 * Teste finanlizado.
 *
 */

$(function () {
    // MASK
    var cellMaskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11
                ? "(00) 00000-0000"
                : "(00) 0000-00009";
        },
        cellOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(cellMaskBehavior.apply({}, arguments), options);
            },
        };

    $(".mascara-celular").mask(cellMaskBehavior, cellOptions);
    $(".mascara-fone").mask("(00) 0000-0000");
    $(".mascara-data").mask("00/00/0000");
    $(".mascara-rg").mask("00.000-00");
    $(".gtin-codigo-interno").mask("00000000");
    $(".mascara-datetime").mask("00/00/0000 00:00");
    $(".mascara-mes").mask("00/0000", { reverse: true });
    $(".mascara-cpf").mask("000.000.000-00", { reverse: true });
    $(".mascara-cnpj").mask("00.000.000/0000-00", { reverse: true });
    $(".mascara-cep").mask("00000-000", { reverse: true });
    $(".codigo-banco").mask("000", { reverse: true });
    $(".conta").mask("000000000000", { reverse: true });
    $(".digito").mask("0", { reverse: true });
    $(".agencia").mask("0000", { reverse: true });
    $(".mascara-dinheiro").mask("R$ 000.000.000.000.000,00", {
        reverse: true,
        placeholder: "R$ 0,00",
    });

    // SEARCH ZIPCODE
    $(".busca_cep").blur(function () {
        function limpar() {
            $(".rua").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");
            $(".complemento").val("");
        }

        var zip_code = $(this).val().replace(/\D/g, "");
        var validate_zip_code = /^[0-9]{8}$/;

        if (zip_code != "" && validate_zip_code.test(zip_code)) {
            $(".rua").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");
            $(".complemento").val("");

            $.getJSON(
                "https://viacep.com.br/ws/" + zip_code + "/json/?callback=?",
                function (data) {
                    if (!("erro" in data)) {
                        $(".rua").val(data.logradouro);
                        $(".bairro").val(data.bairro);
                        $(".cidade").val(data.localidade);
                        $(".estado").val(data.uf);
                        $(".complemento").val(data.complemento);
                    } else {
                        limpar();
                        alert("CEP não encontrado.");
                    }
                }
            );
        } else {
            limpar();
            alert("Formato de CEP inválido.");
        }
    });
});
