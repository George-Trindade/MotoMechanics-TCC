<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Novo Veículo</title>
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/base_pag.css">
    <link rel="stylesheet" href="https://motomechanics.online/public/assets/css/loading.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.js"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.js"></script>
    <script src="https://motomechanics.online/public/assets/js/veiculo.js" type="text/javascript"></script>
</head>

<body>

    <!-- Following Menu -->
    @include('layouts.header')
    <!-- Page Contents -->

    @include('components.menu')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="ui black toast center aligned toast-veiculo">
        <div class="content">
            <h3 class="ui header">
                <i class="small icons">
                    <i class="exclamation triangle icon" style="visibility: visible;"></i>
                </i>
                Atenção
            </h3>
            <li>{{ $error }}</li>
        </div>
    </div>
    @endforeach
    <script>
        $('.toast-veiculo').toast();
    </script>
    @endif

    <div class="ui container centered grid">
        <h2 class="center aligned">Cadastre o seu orçamento</h2>
        <div class="ten wide column">
            <form id="form-veiculo" class="ui form" action="{{route('orcamentos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}" required>
                <div class="field">
                    <label class="label">Serviço</label>
                    <select class="ui search fluid dropdown border" id="servico" name="servico" value="{{old('Servico')}}">

                    </select>
                </div>
                <div class="field">
                    <label class="label">Veículo</label>
                    <select class="ui fluid dropdown border" name="veiculo_id" id="veiculo_id">
                        <option value="">Selecione um veículo</option>
                        @if(count($veiculos) > 0)
                        @foreach($veiculos as $veiculo)
                        <option value="{{$veiculo->id}}">{{$veiculo->Modelo}}</option>
                        @endforeach
                        @else
                        @endif
                    </select>
                </div>
                @if(count($veiculos) == 0)
                <div class="ui message">
                    <div class="header">Atenção</div>
                    <span>Você não possui nenhum veículo cadastrado.
                        <a href="https://motomechanics.online/public/veiculo/novo">Cadastrar</a>
                    </span>
                </div>
                @endif
                <div class="field">
                    <label class="label" for="servico">Decrição:</label>
                    <textarea class="ui input fluid" type="text" id="descricao" name="descricao" placeholder="" required></textarea>
                </div>

                <div class="field">
                    <label class="label">Foto:</label>
                    <div class="ui action input">
                        <div class="ui icon button" onclick="document.getElementById('fotos').click()">
                            <i class=" cloud upload icon"></i>
                            &nbsp;&nbsp;
                            <span>Escolher arquivo</span>
                        </div>
                        <input id="descfoto" class="border" type="text" placeholder="Nenhum arquivo selecionado" readonly required>
                        <input type="file" id="fotos" name="fotos[]" multiple accept="image/*" style="display:none" required>
                    </div>
                </div>

                <div class=" field centered">
                    <button class="ui large button" type="button" onclick="ConfirmSubmit()">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-submit" class="ui test modal front transition hidden ui responsive">
        <div class="header centered">
            Cadastrar orçamento?
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

    @include('layouts.footer')
</body>

</html>

<script>
    $(document).ready(function() {
        $('#agendamentos').removeClass("active");
        $('#orçamentos').addClass("active");

        document.getElementById('fotos').addEventListener('change', function(e) {
            var fileName = e.target.files.length > 1 ? e.target.files.length + ' arquivos selecionados' : '1 arquivo selecionado';
            document.getElementById('descfoto').value = fileName;
        });
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
            select.append('<option value="' + value + '">' + text + '</option>');
        });
        select.dropdown();

        $('#veiculo_id').dropdown();




    });
</script>

<style>
    footer {
        position: inherit !important;
    }

    @media only screen and (min-width: 992px) {
        body {
            min-height: 856px !important;
        }
    }

    @media only screen and (max-width: 992px) {
        body {
            min-height: 1080px !important;
        }
    }

    .border {
        border: 1px solid rgb(32 4 4 / 43%) !important;
    }

    .ui.input.fluid {
        border: 1px solid rgb(32 4 4 / 43%) !important;
    }


    #modal-submit.ui.modal {
        width: auto !important;
    }
</style>