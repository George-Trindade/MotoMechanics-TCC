function capturar() {
    var capturando = "";
    capturando = document.getElementById("data").value;
    $.getJSON("/agendamentos/novo/horarios/" + capturando, function (data) {
        $("#select-horarios").find("option").remove() +
            $("<option>")
                .val(null)
                .text("Selecione um horário")
                .appendTo("#select-horarios");
        $.each(data, function (indice, valor) {
            $("<option>")
                .val(valor.hora)
                .text(valor.hora)
                .appendTo("#select-horarios");
        });
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}

function ConfirmSubmit() {
    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario = select.options[select.selectedIndex].value;
    var veiculo = document.getElementById("veiculo_id");
    var veiculo_selected = veiculo.options[veiculo.selectedIndex].text;
    var servico = document.getElementById("servico");
    var servico_selected = servico.options[servico.selectedIndex].text;
    var respJson;
    capturando = document.getElementById("data").value;

    if (capturando == "") {
        $("#toast-alert").toast();
    } else if (horario == "Selecione um horário" || horario == "") {
        $("#toast-horario").toast();
    } else if (veiculo_selected == "Selecione um veículo" || veiculo == "") {
        $("#toast-veiculo").toast();
    } else if (servico_selected == "Selecione um serviço" || servico == "") {
        $("#toast-servico").toast();
    } else {
        $("#modal-submit")
            .modal({
                closable: false,
                onDeny: function () {
                    return true;
                },
                onApprove: function () {
                    $.getJSON(
                        "/agendamentos/novo/horarios/" +
                            capturando +
                            "/" +
                            horario,
                        function (data) {
                            respJson = "saida:" + data["success"];
                            console.log(respJson);
                            if (respJson != "saida:false") {
                                $("#toast-alert").toast({
                                    class: "error",
                                    message: "Selecione um horário válido!",
                                });
                                capturar();
                                return true;
                            } else {
                                document.getElementById("Form").submit();
                            }
                        }
                    );
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                },
            })
            .modal("show");
    }
}
function ConfirmAction() {
    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario = select.options[select.selectedIndex].value;
    var respJson;
    capturando = document.getElementById("data").value;
    $.getJSON(
        "/agendamentos/novo/horarios/" + capturando + "/" + horario,
        function (data) {
            respJson = "saida:" + data["success"];
            console.log(respJson);
            if (respJson != "saida:false") {
                $("#toast-horario").toast();
                $.getJSON(
                    "/agendamentos/novo/horarios/" + capturando + "/" + horario,
                    function (data) {
                        $("#select-horarios").find("option").remove() +
                            $("<option>")
                                .val(null)
                                .text("Selecione um horário")
                                .appendTo("#select-horarios");
                        $.each(data, function (indice, valor) {
                            $("<option>")
                                .val(valor.hora)
                                .text(valor.hora)
                                .appendTo("#select-horarios");
                        });
                    }
                );

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                return true;
            } else {
                return false;
            }
        }
    );
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}
