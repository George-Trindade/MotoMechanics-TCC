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
