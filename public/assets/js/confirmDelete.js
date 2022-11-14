function ConfirmDelete(){
    var x=confirm("Tem certeza?");
        $("#FormDelete").submit(function (event) {
            if (x) {
                return true;
            }
            else {
                event.preventDefault();
                return false;
            }

});
}
