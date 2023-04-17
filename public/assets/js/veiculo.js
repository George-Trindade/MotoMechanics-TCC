function ConfirmSubmit() {
    $("#modal-submit")
        .modal({
            closable: false,
            onDeny: function () {
                return true;
            },
            onApprove: function () {
                var form = document.getElementById("form-veiculo");
                form.submit();
            },
        })
        .modal("show");
}
