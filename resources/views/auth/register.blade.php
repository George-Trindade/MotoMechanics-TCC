<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login-MotoMechanics</title>
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/components/icon.css">

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/components/form.js"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/components/transition.js"></script>

</head>

<body>
    @include('layouts.header_login')
    <div id="div_geral">
        <h1 class="ui center aligned header">Registre-se</h1>
        <h4 class="ui center aligned header"> Para agendar serviços e acompanhar seus atendimentos.</h4>
        <div id="div_center" class=" ui centered grid container middle aligned">
            <form id="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div id="div_form" class="ui stackable two column divided grid container">
                    <div class="row">
                        <div class="column">
                            <div class="ui segment">
                                <h3>Nome</h3>
                                <input id="name" type="text" name="name" class="ui segment item_form">
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui segment">
                                <h3>Email</h3>
                                <input id="email" type="email" name="email" class="ui segment item_form">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="ui segment">
                                <h3>Telefone</h3>
                                <input id="phone" type="text" name="phone" class="ui segment item_form">
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui segment">
                                <h3>Endereço</h3>
                                <input id="address" type="text" name="address" class="ui segment item_form">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="ui segment">
                                <h3>Senha</h3>
                                <input id="password" type="password" name="password" class="ui segment item_form">
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui segment">
                                <h3>Confirme a senha</h3>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="ui segment item_form">
                            </div>
                        </div>
                    </div>
                    <div class="ui vertical max-widht center aligned segment">
                        <div class="ui text container max-widht">
                            <div id="btn_registrar" class="ui large submit button">Registrar <i class="right arrow icon"></i></div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @include('layouts.footer_register')
</body>

</html>
<script>
    $('.submit').on("click", function() {
        document.getElementById("form").submit();
    });
</script>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    .divlogo {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #div_center {
        padding-top: 25px;
        padding-left: 25px;
    }

    #btn_registrar {
        background-color: darkred;
        color: white;
        min-width: 180px;
    }

    .logo {
        padding-top: 15px;
        width: 280px;
        height: 55px;
    }

    #paddingtop {
        padding-top: 60px !important;
        align-self: flex-start !important;
    }

    .headerLogin {
        min-height: 65px;
        background-color: darkred;
    }

    #div_geral {
        margin: 0 !important;
        padding-top: 25px;
        padding-bottom: 35px;
    }

    .item_form {
        width: 100%;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100% !important;
    }
</style>