function ConcluiAgendamento(){
    var x=confirm("Tem certeza?");
        $("#FormDone").submit(function (event) {
            if (x) {
                return true;
            }
            else {
                event.preventDefault();
                return false;
            }

        });
    }


