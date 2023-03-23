function ConfirmCancelSolicitacao() {
    var x = confirm("Tem certeza?");
    if (x) {
        document.getElementById("Form_index").submit();
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
