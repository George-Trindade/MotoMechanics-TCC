function ConfirmSubmit($form) {
    $("#modal-submit")
        .modal({
            closable: false,
            onDeny: function () {
                return true;
            },
            onApprove: function () {
                var form = document.getElementById($form);
                form.submit();
            },
        })
        .modal("show");
}
