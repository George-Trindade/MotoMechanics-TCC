function confirmAgendamento(){
    x=confirm('Tem certeza que quer enviar este pedido?');
    if(x){
        return this.submit;
    }else{
        return false;
    }
}

function capturar() {
    var capturando = "";
    capturando = document.getElementById('data').value;
    //capturando = data.split("-").reverse().join("-");
    //document.getElementById('datadigitada').innerHTML = capturando;
    $.getJSON('/agendamentos/novo/horarios/' + capturando,
    $('#conteudo').css({display:'none'})+
    $('#div-carregamento').css({display:'flex'})+
    $('#carregamento').css({display:'block'}),
        function(data) {
            $('#select-horarios').find('option').remove()+
            $('#div-carregamento').css({display:'none'})+
            $('#carregamento').css({display:'none'})+
            $('#conteudo').css({display:'block'})+
            $('<option>').val(null).text('Selecione um horário').appendTo('#select-horarios');
            $.each(data,

                function(indice, valor) {
                    $('<option>').val(valor.hora).text(valor.hora).appendTo('#select-horarios');
                },
            );
        }
    );
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}



function ConfirmAction(){

    var capturando = "";
    var select = document.getElementById("select-horarios");
    var horario= select.options[select.selectedIndex].value;
    var respJson;
    capturando = document.getElementById('data').value;


    $.getJSON('/agendamentos/novo/horarios/' + capturando+'/' + horario,
    $('#conteudo').css({display:'none'})+
    $('#div-carregamento').css({display:'flex'})+
    $('#carregamento').css({display:'block'}),

    function(data){

        respJson = data['success'];
        console.log(respJson);

        if(respJson==true){
            alert('Selecione um horário válido!');
            $.getJSON('/agendamentos/novo/horarios/' + capturando,
            $('#conteudo').css({display:'none'})+
            $('#div-carregamento').css({display:'flex'})+
            $('#carregamento').css({display:'block'}),
                function(data) {
                    $('#select-horarios').find('option').remove()+
                    $('#div-carregamento').css({display:'none'})+
                    $('#carregamento').css({display:'none'})+
                    $('#conteudo').css({display:'block'})
                    $('<option>').val(null).text('Selecione um horário').appendTo('#select-horarios');
                    $.each(data,
                        function(indice, valor) {
                            if(valor.hora == horario){
                                return;
                            }
                            $('<option>').val(valor.hora).text(valor.hora).appendTo('#select-horarios');
                        },
                    );


                }
            );

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }else{
                    $('#div-carregamento').css({display:'none'})+
                    $('#carregamento').css({display:'none'})+
                    $('#conteudo').css({display:'block'});
        }

     });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    }


