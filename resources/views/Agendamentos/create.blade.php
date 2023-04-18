<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Base</title>
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/components/base_pag.css">
    <link rel="stylesheet" href="http://192.168.1.4:8000/assets/css/loading.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/semantic.min.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/semantic.js"></script>
    <script src="http://192.168.1.4:8000/assets/js/ajaxHorario.js" type="text/javascript"></script>
</head>

<body>

    <!-- Following Menu -->
    @include('layouts.header')
    <!-- Page Contents -->

    @include('components.menu')
    <div class="ui container centered grid">
        <h2 class="center aligned">Faça um agendamento para o serviço a ser realizado</h2>
        <div class="ten wide column">
            <form class="ui form" action="{{route('agendamentos.store')}}" method="post" id="Form">
                @csrf
                <div class="field">
                    <label class="label">Data</label>
                    <div class="ui calendar" id="datepicker">
                        <div class="ui input left icon fluid">
                            <i class="calendar icon"></i>
                            <input class="data" autocomplete="off" placeholder="Selecione uma data" name="date" id="data" required onChange="capturar()">
                        </div>
                    </div>
                </div>
                <div class="ui form">
                    <div class="field">
                        <label class="label">Veículo</label>
                        <select class="ui fluid dropdown" name="veiculo_id" id="veiculo_id">
                            <option value="">Selecione um veículo</option>
                            @foreach($veiculos as $veiculo)
                            <option value="{{$veiculo->id}}">{{$veiculo->Modelo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label class="label">Horário</label>
                        <div class="ui input">
                            <select class="ui fluid dropdown" name="horario" id="select-horarios" required onchange="ConfirmAction()">>
                                <option value="">Selecione um horário</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Serviço</label>
                        <select class="ui fluid dropdown" id="servico" name="servico" value="{{old('Servico')}}">

                        </select>
                    </div>
                </div>


                <div class="field centered">
                    <button class="ui large button" type="button" onclick="ConfirmSubmit()">Agendar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Submit -->
    <div id="modal-submit" class="ui mini test modal front transition hidden">
        <div class="header">
            Agendar serviço
        </div>
        <div class="content">
            <p>Tem certeza?</p>
        </div>
        <div class="actions">
            <div class="ui negative button">
                Não
            </div>
            <div class="ui positive right labeled icon button">
                Sim
                <i class="checkmark icon"></i>
            </div>
        </div>
    </div>

    <!-- Toast Alert -->
    <!-- <div id="toast-alert" class="top right ui toast-container"></div> -->

    <div class="ui black toast center aligned" id="toast-alert">
        <div class="content">
            <h3 class="ui header">
                <i class="small icons">
                    <i class="exclamation triangle icon" style="visibility: visible;"></i>
                </i>
                Atenção
            </h3>
            Selecione uma data válida
        </div>
    </div>
    <div class="ui black toast center aligned" id="toast-horario">
        <div class="content">
            <h3 class="ui header">
                <i class="small icons">
                    <i class="exclamation triangle icon" style="visibility: visible;"></i>
                </i>
                Atenção
            </h3>
            Selecione uma horário válido
        </div>
    </div>
    <div class="ui black toast center aligned" id="toast-veiculo">
        <div class="content">
            <h3 class="ui header">
                <i class="small icons">
                    <i class="exclamation triangle icon" style="visibility: visible;"></i>
                </i>
                Atenção
            </h3>
            Selecione um veículo válido
        </div>
    </div>
    <div class="ui black toast center aligned" id="toast-servico">
        <div class="content">
            <h3 class="ui header">
                <i class="small icons">
                    <i class="exclamation triangle icon" style="visibility: visible;"></i>
                </i>
                Atenção
            </h3>
            Selecione um serviço válido
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>

<script>
    $(document).ready(function() {
        var servicos = {
            "troca-oleo": "Troca de óleo",
            "troca-relacao": "Troca de relação",
            "troca-pneu": "Troca de pneu",
            "ajuste-carburador": "Ajuste de carburador",
            "limpeza-carburador": "Limpeza de carburador",
            "troca-velas": "Troca de velas",
            "troca-corrente": "Troca de corrente",
            "revisao-eletrica": "Revisão elétrica",
            "troca-bateria": "Troca de bateria",
            "troca-lampadas": "Troca de lâmpadas",
            "troca-pastilhas-freio": "Troca de pastilhas de freio",
            "ajuste-freio": "Ajuste de freio",
            "troca-fluido-freio": "Troca de fluido de freio",
            "limpeza-filtro-ar": "Limpeza de filtro de ar",
            "troca-filtro-ar": "Troca de filtro de ar",
            "troca-vela-ignicao": "Troca de vela de ignição",
            "ajuste-valvulas": "Ajuste de válvulas",
            "troca-rolamentos": "Troca de rolamentos",
            "revisao-suspensao": "Revisão de suspensão",
            "troca-amortecedor": "Troca de amortecedor"
        };
        var select = $("#servico");
        select.append('<option value="">Selecione um serviço</option>');
        $.each(servicos, function(value, text) {
            select.append('<option value="' + value + '">' + text + '</option>');
        });
        select.dropdown();


        $('#select-horarios').dropdown();
        $('#veiculo_id').dropdown();
        $('#servico').dropdown();
        // fix menu when passed
        $('.masthead')
            .visibility({
                once: false,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            });

        // create sidebar and attach to menu open
        $('.ui.sidebar').sidebar('attach events', '.toc.item');

        $('#datepicker').calendar({
            type: 'date',
            formatter: {
                date: function(date, settings) {
                    if (!date) return '';
                    var day = String(date.getDate()).padStart(2, '0');
                    var month = String(date.getMonth() + 1).padStart(2, '0');
                    var year = date.getFullYear();
                    return day + '-' + month + '-' + year;
                }
            },
            text: {
                days: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                today: 'Hoje',
                now: 'Agora',
            },
            minDate: new Date(),
            disabledDaysOfWeek: [6, 0],
            enableManualInput: false,
            enableMonthChange: true,
            selectAdjacentDays: true
        });
    });
</script>