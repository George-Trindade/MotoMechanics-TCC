<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Meus Dados</title>
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
    <!-- <img src="http://motomechanics.online/public/assets/img/tiringa.jpg" alt="Foto do usuário"> -->

    <div class="ui container" style="padding-top: 15px;padding-bottom: 15px;">
        <div id='content'>
            <h2 class="ui centered header">Meus Dados
                <a href="{{route('user.edit', Auth::user()->id)}}">
                    <button class="ui button">
                        Alterar
                        <i class="pencil icon"></i>
                    </button>
                </a>
            </h2>
        </div>
        <div class="ui raised segment">
            <div class="ui centered stackable grid center" style="padding-top: 15px;">
                <div class="four wide column" style="width: auto!important;">
                    <div class="ui image">
                        <img style="height: 175px;" src="{{ asset('assets/users/' . Auth::user()->avatar) }}" alt="Foto do usuário">
                    </div>
                </div>
                <div class="twelve wide computer only column">
                    <div class="ui doubling stackable two cards">
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="address card icon"></i>Nome</div>
                                <div class="description"><strong>{{ Auth::user()->name }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="mail icon"></i>E-mail</div>
                                <div class="description"><strong>{{ Auth::user()->email }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="phone alternate icon"></i>Telefone</div>
                                <div class="description"><strong>{{ Auth::user()->phone }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="home icon"></i>Endereço</div>
                                <div class="description"><strong>{{ Auth::user()->address }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui centered grid mobile only">
                <div class="twelve wide column">
                    <div class="ui doubling stackable two cards center aligned grid" style="display:flex!important;">
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="address card icon"></i>Nome</div>
                                <div class="description"><strong>{{ Auth::user()->name }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="mail icon"></i>E-mail</div>
                                <div class="description"><strong>{{ Auth::user()->email }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="phone alternate icon"></i>Telefone</div>
                                <div class="description"><strong>{{ Auth::user()->phone }}</strong></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="content">
                                <div class="header"><i class="home icon"></i>Endereço</div>
                                <div class="description"><strong>{{ Auth::user()->address }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
<style>
    @media only screen and (max-width: 900px) {
        footer {
            position: inherit !important;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('#agendamentos').removeClass("active");
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