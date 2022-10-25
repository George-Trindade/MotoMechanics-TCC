<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastrar um novo Agendamento</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function capturar() {
            var capturando = "";
            capturando = document.getElementById('data').value;
            document.getElementById('datadigitada').innerHTML = capturando;

            $.getJSON('/agendamentos/novo/horarios/'+capturando,
                function(data){
                    $('#select-horarios').find('option').remove();
                    $.each(data,
                        function(indice, valor){
                             $('<option>').val(valor.idhorarios).text(valor.hora).appendTo('#select-horarios');
                        }
                    );
                }
            );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*$.ajax({
                type: 'get',
                url: '/agendamentos/novo/horarios/'+capturando,
                dataType: 'json',
                data:data,
                success: function(obj) {
                    if(obj!=null){
                        var opcoes = obj.data;
                        var select = $('#select-horarios');

                       alert(opcoes);
                        //$.each($opcoes,
                            //function(indice, valor){
                              //  $('<option>').val(valor.idhorarios).text(valor.hora).appendTo(select);
                            //}

                        //);
                        //return capturando;
                    }

                },
                error: function() {
                    alert('Falha!');
                }
            });
            */
        }
    </script>
</head>

<body>
    <h2>Novo Agendamento</h2>
    <form action="{{route('agendamentos.store')}}" method="post">
        @csrf
        <label for="">Serviço</label> <br />
        <input type="text" name="servico"> <br />
        <label for="">Data</label> <br />
        <input type="text" name="date" id="data" onchange="capturar()"> <br />
        <p id="datadigitada"></p>
        <label for="">Horário</label> <br />
        <select class="" name="horario" id="select-horarios">
            <option>Selecione um horario</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
    <br />
    <a href="{{route('agendamentos.index')}}"> <button>Voltar</button> </a>
</body>

</html>
