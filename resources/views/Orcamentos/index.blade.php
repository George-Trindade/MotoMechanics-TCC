<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Meus Orçamentos</title>
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

    <div class="ui centered grid">
        <div id='content'>
            <h2 class="ui header">Meus Orçamentos
                <a href="{{route('orcamento.create')}}">
                    <button class="ui button">
                        Novo
                        <i class="plus icon"></i>
                    </button>
                </a>
            </h2>
        </div>

        <div class="sixteen wide mobile ten wide tablet six wide ">
            <div class="ui two item menu custom-tabs">
                <a class="item active custom-tab" data-tab="solicitado">Solicitado</a>
                <a class="item custom-tab" data-tab="concluido">Concluído</a>
            </div>
            <div id="solicitado" data-tab="solicitado">
                <div id="cards" class="ui centered three stackable cards container">
                    @php $cont=0; @endphp
                    @foreach($orcamentos as $orcamento)
                    @if($orcamento->valor_total == 0.00)
                    @php $cont=+1; @endphp
                    <div class="ui card">
                        <div class="ui centered content center aligned">
                            <div class="ui card centered">
                                <div class="ui centered content center aligned">
                                    <div class="header">
                                        <h2>{{$orcamento->servico}}</h2>
                                    </div>
                                    <div class="meta">
                                        <h3>
                                            @foreach($veiculos as $veiculo)
                                            @if($orcamento->veiculo_id == $veiculo->id)
                                            {{$veiculo->Modelo}}
                                            @endif
                                            @endforeach
                                        </h3>
                                    </div>
                                    <div class="description">
                                        <h4>
                                            <i class="donate green icon"></i>Valor Total:
                                            <span class="ui error text">Em análise</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="extra content centered">
                                <div class="ui buttons">
                                    <form id="form-orcamento" action="{{route('orcamento.destroy',$orcamento->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="ui button same-size-button" onclick="ConfirmSubmitOrcamento()">Cancelar</button>
                                    <div class="or" data-text="ou"></div>
                                    <a href="{{ route('orcamento.show', $orcamento->id) }}" class="ui teal button same-size-button">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @if($cont==0)
                    <div class="ui center aligned huge message">
                        <div class="content">
                            <div class="header">
                                Não há histórico de serviços solicitados!
                            </div>
                            Faça a solicitação de um novo agendamento.
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div id="concluido" data-tab="concluido">
                <div id="cards" class="ui centered four stackable cards container">
                    @php $cont=0; @endphp
                    @foreach($orcamentos as $orcamento)
                    @if($orcamento->valor_total != 0.00)
                    @php $cont=+1; @endphp
                    <div class="ui card">
                        <div class="ui centered content center aligned">
                            <div class="ui card centered">
                                <div class="ui centered content center aligned">
                                    <div class="header">
                                        <h2>{{$orcamento->servico}}</h2>
                                    </div>
                                    <div class="meta">
                                        <h3>
                                            @foreach($veiculos as $veiculo)
                                            @if($orcamento->veiculo_id == $veiculo->id)
                                            {{$veiculo->Modelo}}
                                            @endif
                                            @endforeach
                                        </h3>
                                    </div>
                                    <div class="description">
                                        <h4>
                                            <i class="donate green icon"></i>Valor Total:
                                            <span class="ui success text">R$ {{$orcamento->valor_total}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="extra content centered">
                                <div class="ui buttons">
                                    <a href="{{ route('orcamento.show', $orcamento->id) }}" class="ui teal button same-size-button">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @if($cont==0)
                </div>
                <div class="ui center aligned huge message">
                    <div class="content">
                        <div class="header">
                            Não há histórico de serviços concluídos!
                        </div>
                        Porquê não tenta atualizar a página?
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div id="modal-submit" class="ui test modal front transition hidden ui responsive">
            <div class="header centered">
                Cancelar orçamento?
            </div>

            <div class="actions">
                <div class="ui negative button">
                    Não
                </div>
                <div class="ui positive right labeled icon button">
                    Sim
                </div>
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

        $('#solicitado, #agendado, #concluido').hide();

        // Ao clicar em uma aba
        $('.custom-tab').click(function() {
            // Esconde todo o conteúdo das abas
            $('#solicitado, #agendado, #concluido').hide();
            // Remove a classe "active" de todas as abas
            $('.custom-tab').removeClass('active');
            // Adiciona a classe "active" na aba clicada
            $(this).addClass('active');
            // Mostra apenas o conteúdo da aba ativa
            var tab = $(this).data('tab');
            $('#' + tab).show();
        });

        // Ativa a primeira aba
        $('.custom-tab:first').click();

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


    });

    function ConfirmSubmitOrcamento() {
        $("#modal-submit")
            .modal({
                closable: false,
                onDeny: function() {
                    return true;
                },
                onApprove: function() {
                    var form = document.getElementById("form-orcamento");
                    form.submit();
                },
            })
            .modal("show");
    }
</script>
<style>
    .ui.menu .active.item {
        background: rgb(223 42 42 / 45%);
    }

    #content {
        padding-top: 30px;

        /* width: 100%; */
    }

    #modal-submit.ui.modal {
        width: auto !important;
    }

    #cards {
        padding-top: 20px;
        padding-bottom: 20px;
        flex-grow: 1;
        /* min-height: 100vh; */

    }

    #concluido,
    #solicitado,
    #agendado {
        min-height: 500px !important;
    }

    .same-size-button {
        width: 8em;
        border-top-right-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    .extra.content.centered {
        display: flex;
        justify-content: center;
    }

    .ui.buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    footer {
        position: inherit !important;
    }

    @media only screen and (max-width: 900px) {
        footer {
            position: inherit !important;
        }

        #content {
            padding-bottom: 30px;
        }

        #cards {
            width: 390px;
            flex-grow: 1;
        }

        .ui.card,
        .ui.cards>.card {
            width: auto !important;
        }


        .ui.buttons .button,
        .ui.buttons .or {
            margin: 0.25em;
        }
    }
</style>