<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Meus Veículos</title>
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
            <h2 class="ui header">Meus Veículos
                <a href="{{route('veiculos.create')}}">
                    <button class="ui button">
                        Novo
                        <i class="plus icon"></i>
                    </button>
                </a>
            </h2>
        </div>
    </div>

    <div id="cards" class="ui centered four stackable cards container">

        @foreach ($veiculos as $veiculo)
        <div class="ui card">
            <div class="image dimmable">
                <div class="ui blurring inverted dimmer transition hidden" style="display: none;">
                    <div class="content">
                        <div class="center">
                            <div class="ui teal button">Add Friend</div>
                        </div>
                    </div>
                </div>
                <!-- <img src="https://motomechanics.online/public/storage/veiculos/{{$veiculo->fotoveiculo}}"> -->
                <img src="https://motomechanics.online/public/assets/veiculos/{{$veiculo->fotoveiculo}}">
            </div>
            <div class="content">
                <div class="header">
                    {{ $veiculo->Modelo }}
                </div>
                <div class="meta">
                    <a class="group">{{ $veiculo->Placa }}</a>
                </div>
                <div class="description">Ano: {{ $veiculo->Ano }} | Cor: {{ $veiculo->Cor }}</div>
            </div>
            <div class="extra content centered">
                <div class="ui buttons">
                    <form id="form-veiculo" action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="ui button same-size-button" onclick="ConfirmSubmit()">Excluir</button>
                    </form>
                    <div class="or" data-text="ou"></div>
                    <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="ui teal button same-size-button">Editar</a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <div id="modal-submit" class="ui test modal front transition hidden ui responsive">
        <div class="header centered">
            Excluir veículo?
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
        $('#veiculos').addClass("active");
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
    });
</script>
<style>
    .ui.button:hover {
        box-shadow: none;
        outline: none;
    }

    #content {
        padding-top: 30px;
    }

    #modal-submit.ui.modal {
        width: auto !important;
    }

    #cards {
        padding-top: 50px;
        padding-bottom: 20px;
        flex-grow: 1;
        /* min-height: 100vh; */

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

    @media only screen and (max-width: 900px) {
        footer {
            position: inherit !important;
        }

        .ui.buttons .button,
        .ui.buttons .or {
            margin: 0.25em;
        }
    }
</style>