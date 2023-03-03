function ConfirmDeleteSolicitacao() {
    var x = confirm("Tem certeza?");
    if (x) {
        document.getElementById("FormDeleteSolicitacao").submit();
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}

function ConfirmDeleteAgendado() {
    var x = confirm("Tem certeza?");
    if (x) {
        document.getElementById("FormDeleteAgendado").submit();
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
