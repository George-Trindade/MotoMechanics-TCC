<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login-MotoMechanics</title>
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

        #btn_login {
            background-color: darkred;
            color: white;
        }

        .logo {
            padding-top: 15px;
            width: 280px;
            height: 55px;
        }

        #form {
            padding-left: 10px;
            padding-right: 10px;
        }

        #msg {
            margin-left: 10px;
            margin-right: 10px;
        }

        #paddingtop {
            padding-top: 60px !important;
            align-self: flex-start !important;
        }

        .headerLogin {
            min-height: 65px;
            background-color: darkred;
        }

        body>.grid {
            min-height: 500px;
        }

        #div_geral {
            margin: 0 !important;
        }

        .image {
            margin-top: -100px;
            width: 150px;
            width: 150px;
        }

        .column {
            max-width: 450px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100% !important;
        }
    </style>
    <script>
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier: 'email',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Please enter your e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [{
                                        type: 'empty',
                                        prompt: 'Please enter your password'
                                    },
                                    {
                                        type: 'length[6]',
                                        prompt: 'Your password must be at least 6 characters'
                                    }
                                ]
                            }
                        }
                    });
            });
    </script>
</head>

<body>
    @include('layouts.header_login')
    <div id="div_geral" class="ui middle aligned center aligned grid">
        <div id="paddingtop" class=" column">
            <h1>Faça seu Login</h1>
            <h4> Para agendar serviços e acompanhar seus atendimentos.</h4>
            <form id="form" method="post" class=" ui large form" action="{{ route('login') }}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field info">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email" name="email" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="field info">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div id="btn_login" class="ui fluid large submit button">Entrar</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div id="msg" class="ui message">
                Você é novo? <a style="color:red;text-decoration:none" href="{{route('register')}}">Increver-se</a>
            </div>
        </div>
    </div>
    @include('layouts.footer_login')
</body>

</html>
<script>
    $('.submit').on("click", function() {
        document.getElementById("form").submit();
    });
</script>





















<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://motomechanics.online/public//assets/img/motocicletaBranco">
    <link rel="icon" type="image/png" href="../assets/img/motocicletaBranco.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        MotoMechanics
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
</head>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name='email' id='email' placeholder="Email..." for="email" :value="__('Email')" required autofocus>

        <input type="password" name='password' id='password' placeholder="Senha..." for="password" :value="__('Password')" required autocomplete="current-password">



        <button type="submit">Entrar</button>


        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Esqueci minha senha </a>
        @endif
        <a href="{{ route('register') }}">Não possuo cadastro </a>
    </form>


</body>

</html> -->