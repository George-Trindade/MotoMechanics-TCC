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

function capturarUpdate() {
    var capturando = "";
    capturando = document.getElementById("data").value;
    $.getJSON("/agendamentos/novo/horarios/" + capturando, function (data) {
        $.each(data, function (indice, valor) {
            $("<option>")
                .val(valor.hora)
                .text(valor.hora)
                .appendTo("#select-horarios");
        });
        ordenarSelect();
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

function ordenarSelect() {
    var meuSelect = document.getElementById("select-horarios");
    var opcoes = meuSelect.options;
    var valores = [];
    var valorSelecionado = meuSelect.value; // armazena o valor selecionado antes de ordenar
    for (var i = 0; i < opcoes.length; i++) {
        valores.push(opcoes[i].value);
    }
    valores.sort(function (a, b) {
        return parseInt(a.split(":")[0]) - parseInt(b.split(":")[0]);
    });
    while (meuSelect.firstChild) {
        meuSelect.removeChild(meuSelect.firstChild);
    }
    for (var i = 0; i < valores.length; i++) {
        var option = document.createElement("option");
        option.value = valores[i];
        option.text = valores[i];
        meuSelect.appendChild(option);
    }
    meuSelect.value = valorSelecionado;
}

function ConfirmUpdate($horario_exist) {
    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario = select.options[select.selectedIndex].value;
    var veiculo = document.getElementById("veiculo_id");
    var veiculo_selected = veiculo.options[veiculo.selectedIndex].text;
    var servico = document.getElementById("servico");
    var servico_selected = servico.options[servico.selectedIndex].text;
    var respJson;
    capturando = document.getElementById("data").value;

    if ($horario_exist == horario) {
        horario = "00:00";
    }

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

function ConfirmActionUpdate($horario_exist) {
    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario = select.options[select.selectedIndex].value;
    if ($horario_exist == horario) {
        horario = "00:00";
    }
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
