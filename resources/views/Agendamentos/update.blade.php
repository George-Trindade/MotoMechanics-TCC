<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Base</title>
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/base_pag.css">
    <link rel="stylesheet" href="https://motomechanics.online/public/assets/css/loading.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.js"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.js"></script>
    <script src="https://motomechanics.online/public/assets/js/ajaxHorario.js" type="text/javascript"></script>
</head>

<body>

    <!-- Following Menu -->
    @include('layouts.header')
    <!-- Page Contents -->

    @include('components.menu')
    <div class="ui container centered grid">
        <h2 class="center aligned">Alterar Agendamento</h2>
        <div class="ten wide column">
            <form class="ui form" action="{{route('agendamentos.update',$agendamentos->id)}}" method="post" id="Form">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Data</label>
                    <div class="ui calendar" id="datepicker">
                        <div class="ui input left icon fluid">
                            <i class="calendar icon"></i>
                            <input class="data" autocomplete="off" placeholder="Selecione uma data" name="date" id="data" required onChange="capturar()" value="{{$agendamentos->date}}">
                        </div>
                    </div>
                </div>
                <div class="ui form">
                    <div class="field">
                        <label class="label">Veículo</label>
                        <select class="ui fluid dropdown" name="veiculo_id" id="veiculo_id">
                            @foreach($veiculos as $veiculo)
                            @if($veiculo->id == $agendamentos->veiculo_id)
                            <option value="{{$veiculo->id}}" selected>{{$veiculo->Modelo}}</option>
                            @continue
                            @endif
                            <option value="{{$veiculo->id}}">{{$veiculo->Modelo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label class="label">Horário</label>
                        <div class="ui input">
                            <select class="ui fluid dropdown" name="horario" id="select-horarios" required onchange="ConfirmActionUpdate(' {{$agendamentos->horario}}')">
                                <option selected value="{{$agendamentos->horario}}">{{$agendamentos->horario}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Serviço</label>
                        <select class="ui search fluid dropdown" id="servico" name="servico" value="{{old('Servico')}}">

                        </select>
                    </div>
                </div>


                <div class="field centered">
                    <button class="ui large button" type="button" onclick="ConfirmUpdate('{{$agendamentos->horario}}')">Atualizar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Submit -->
    <div id="modal-submit" class="ui test modal front transition hidden ui responsive">
        <div class="header centered">
            Atualizar agendamento?
        </div>
        <div class="content centered">
            Tem certeza?
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
<style>
    #modal-submit.ui.modal {
        width: auto !important;
    }
</style>
<script>
    $(document).ready(function() {
        capturarUpdate();
        var servicos = {
            "Ajuste de carburador": "Ajuste de carburador",
            "Ajuste de freio": "Ajuste de freio",
            "Ajuste de válvulas": "Ajuste de válvulas",
            "Limpeza de carburador": "Limpeza de carburador",
            "Limpeza de filtro de ar": "Limpeza de filtro de ar",
            "Revisão elétrica": "Revisão elétrica",
            "Revisão de suspensão": "Revisão de suspensão",
            "Troca de amortecedor": "Troca de amortecedor",
            "Troca de bateria": "Troca de bateria",
            "Troca de corrente": "Troca de corrente",
            "Troca de fluido de freio": "Troca de fluido de freio",
            "Troca de lâmpadas": "Troca de lâmpadas",
            "Troca de óleo": "Troca de óleo",
            "Troca de pastilhas de freio": "Troca de pastilhas de freio",
            "Troca de pneu": "Troca de pneu",
            "Troca de relação": "Troca de relação",
            "Troca de rolamentos": "Troca de rolamentos",
            "Troca de vela de ignição": "Troca de vela de ignição",
            "Troca de velas": "Troca de velas"
        };
        var select = $("#servico");
        select.append('<option value="">Selecione um serviço</option>');
        $.each(servicos, function(value, text) {
            if ("{{ $agendamentos->servico }}" == value) {
                select.append('<option selected value="' + value + '">' + text + '</option>');
            } else {
                select.append('<option value="' + value + '">' + text + '</option>');
            }
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