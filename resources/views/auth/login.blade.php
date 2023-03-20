<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="http://tcc.test/assets/img/motocicletaBranco">
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

</html>