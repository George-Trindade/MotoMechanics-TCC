function ConcluiAgendamento() {
    var x = confirm("Tem certeza?");
    if (x) {
        document.getElementById("FormAgendado").submit();
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
function ConfirmaSolicitacao() {
    var x = confirm("Tem certeza?");
    if (x) {
        document.getElementById("FormSolicitacao").submit();
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}

function AtualizaSolicitacao() {
    $("#div-carregamento").css({ display: "flex" });
    $("#carregamento").css({ display: "block" });
    $("#tabela").remove();
    $.ajax("/admin/agendamentos/get/ajaxsolicitados", {
        dataType: "json",
        success: function (data) {
            $("#tabela-nova").html(data["html"]);
            $("#table-solicitado").DataTable({});
            $("#div-carregamento").css({ display: "none" });
            $("#carregamento").css({ display: "none" });
        },
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
}
