function capturar() {
    var capturando = "";
    capturando = document.getElementById("data").value;
    //capturando = data.split("-").reverse().join("-");
    //document.getElementById('datadigitada').innerHTML = capturando;
    $.getJSON(
        "/agendamentos/novo/horarios/" + capturando,
        $("#conteudo").css({ display: "none" }) +
            $("#div-carregamento").css({ display: "flex" }) +
            $("#carregamento").css({ display: "block" }),
        function (data) {
            $("#select-horarios").find("option").remove() +
                $("#div-carregamento").css({ display: "none" }) +
                $("#carregamento").css({ display: "none" }) +
                $("#conteudo").css({ display: "block" }) +
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
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}

function ConfirmSubmit() {
    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario = select.options[select.selectedIndex].value;
    var respJson;
    capturando = document.getElementById("data").value;

    if (capturando == "") {
        alert("Selecione uma data");
    } else if (horario == "Selecione um horário" || horario == "") {
        alert("Selecione um horário");
    } else {
        console.log(horario);
        x = confirm("Tem certeza que quer enviar este pedido?");
        if (x) {
            $.getJSON(
                "/agendamentos/novo/horarios/" + capturando + "/" + horario,
                $("#conteudo").css({ display: "none" }) +
                    $("#div-carregamento").css({ display: "flex" }) +
                    $("#carregamento").css({ display: "block" }),

                function (data) {
                    respJson = data["success"];
                    console.log(respJson);
                    if (respJson == true) {
                        alert("Selecione um horário válido!");
                        $.getJSON(
                            "/agendamentos/novo/horarios/" + capturando,
                            $("#conteudo").css({ display: "none" }) +
                                $("#div-carregamento").css({
                                    display: "flex",
                                }) +
                                $("#carregamento").css({ display: "block" }),
                            function (data) {
                                $("#select-horarios").find("option").remove() +
                                    $("#div-carregamento").css({
                                        display: "none",
                                    }) +
                                    $("#carregamento").css({
                                        display: "none",
                                    }) +
                                    $("#conteudo").css({ display: "block" });
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
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                        });
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
        } else {
            return false;
        }
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
        $("#conteudo").css({ display: "none" }) +
            $("#div-carregamento").css({ display: "flex" }) +
            $("#carregamento").css({ display: "block" }),

        function (data) {
            respJson = data["success"];
            console.log(respJson);

            if (respJson == true) {
                alert("Selecione um horário válido!");
                $.getJSON(
                    "/agendamentos/novo/horarios/" + capturando,
                    $("#conteudo").css({ display: "none" }) +
                        $("#div-carregamento").css({ display: "flex" }) +
                        $("#carregamento").css({ display: "block" }),
                    function (data) {
                        $("#select-horarios").find("option").remove() +
                            $("#div-carregamento").css({ display: "none" }) +
                            $("#carregamento").css({ display: "none" }) +
                            $("#conteudo").css({ display: "block" });
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
                $("#div-carregamento").css({ display: "none" }) +
                    $("#carregamento").css({ display: "none" }) +
                    $("#conteudo").css({ display: "block" });
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
