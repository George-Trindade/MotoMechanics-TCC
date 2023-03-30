<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login Example - Semantic</title>
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/components/icon.css">

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="http://motomechanics.online/public/assets/css/fomantic/dist/components/form.js"></script>
    <script src="http://motomechanics.online/public/assets/css/fomantic/dist/components/transition.js"></script>

    <style type="text/css">
        body {
            /* https: //www.joshwcomeau.com/gradient-generator/ */
            background-image: linear-gradient(40deg,
                    hsl(12deg 7% 28%) 0%,
                    hsl(11deg 27% 37%) 19%,
                    hsl(10deg 40% 46%) 32%,
                    hsl(9deg 58% 55%) 46%,
                    hsl(7deg 53% 52%) 59%,
                    hsl(5deg 48% 37%) 72%,
                    hsl(3deg 45% 22%) 85%,
                    hsl(7deg 57% 8%) 100%);
        }

        body>.grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
            width: 150px;
            width: 150px;
        }

        .column {
            max-width: 450px;
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

    <div class="ui middle aligned center aligned grid">
        <div class="column">

            <img src="assets/img/motogarage1.png" class="image">

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
                    <div class="ui fluid large red submit button">Login</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                Você é novo? <a style="color:red;text-decoration:none" href="{{route('register')}}">Increver-se</a>
            </div>
        </div>
    </div>

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
    <link rel="apple-touch-icon" sizes="76x76" href="http://127.0.0.1:8000//assets/img/motocicletaBranco">
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