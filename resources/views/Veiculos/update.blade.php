<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Atualizar Veículo</title>
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
        <h2 class="center aligned">Atualize o seu veículo</h2>
        <div class="ten wide column">
            <form id="form-veiculo" class="ui form" action="{{ route('veiculos.update', $veiculo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="field">
                    <label class="label" for="modelo">Modelo:</label>
                    <input class="ui input fluid" type="text" id="modelo" name="Modelo" placeholder="Titan 160" value="{{ old('Modelo', $veiculo->Modelo) }}" required>
                </div>

                <div class="field">
                    <label class="label" for="marca">Marca:</label>
                    <input type="text" class="ui input fluid" id="marca" name="Marca" placeholder="Honda" value="{{ old('Marca' ,$veiculo->Marca) }}" required>
                </div>

                <div class="field">
                    <label class="label" for="ano">Ano:</label>
                    <input type="text" class="ui input fluid" id="ano" name="Ano" placeholder="2018" value="{{ old('Ano',$veiculo->Ano) }}" required>
                </div>

                <div class="field">
                    <label class="label" for="cor">Cor:</label>
                    <input type="text" class="ui input fluid" id="cor" name="Cor" placeholder="Preta" value="{{ old('Cor',$veiculo->Cor) }}" required>
                </div>

                <div class="field">
                    <label class="label" for="placa">Placa:</label>
                    <input type="text" class="ui input fluid" id="placa" name="Placa" placeholder="XYZ-123" value="{{ old('Placa',$veiculo->Placa) }}" required>
                </div>

                <div class="field">
                    <label class="label">Foto:</label>
                    <div class="ui action input">
                        <div class="ui icon button" onclick="document.getElementById('fotoveiculo').click()">
                            <i class="cloud upload icon"></i>
                            &nbsp;&nbsp;
                            <span>Escolher arquivo</span>
                        </div>
                        <input id="descfoto" class="border" type="text" placeholder="Nenhum arquivo selecionado" readonly required>
                        <input type="file" id="fotoveiculo" name="fotoveiculo" style="display:none" required>
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
            Cadastrar veículo?
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

        $('#fotoveiculo').on('change', function() {
            var foto = document.getElementById('fotoveiculo').value;
            var text_foto = document.getElementById('descfoto').value = foto.split('\\').pop();
        });

    });
</script>

<style>
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