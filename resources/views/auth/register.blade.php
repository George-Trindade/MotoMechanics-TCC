<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="http://motomechanics.online/public/assets/css/fomantic/dist/semantic.js"></script>
</head>

<body>
    <div class="ui middle aligned center aligned grid">
        <img src="http://motomechanics.online/public/assets/img/motogarage1.png" class="image">
    </div>
    <form id="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="ui text container itens">
            <div class="ui segment two column stackable grid container">
                <div class="column">
                    <div class="ui red horizontal label large">Nome</div>
                    <input id="name" type="text" name="name" class="ui segment item">
                </div>
                <div class="column">
                    <div class="ui red horizontal label large">Email</div>
                    <input id="email" type="email" name="email" class="ui segment item">
                </div>
                <div class="column">
                    <div class="ui red horizontal label large">Telefone</div>
                    <input id="phone" type="text" name="phone" class="ui segment item">
                </div>
                <div class="column">
                    <div class="ui red horizontal label large">Endereço</div>
                    <input id="address" type="text" name="address" class="ui segment item">
                </div>
                <div class="column">
                    <div class="ui red horizontal label large">Senha</div>
                    <input id="password" type="password" name="password" class="ui segment item">
                </div>
                <div class="column">
                    <div class="ui red horizontal label large">Confirme a senha</div>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="ui segment item">
                </div>
                <div class="ui vertical max-widht center aligned segment">
                    <div class="ui text container max-widht">
                        <div class="ui large red submit button">Registrar <i class="right arrow icon"></i></div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script>
    $('.submit').on("click", function() {
        document.getElementById("form").submit();
    });
</script>



<style type="text/css">
    body {
        background-attachment: fixed;
        background-repeat: no-repeat;
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

    .white {
        margin-left: auto;
        margin-right: auto;
        max-width: 650px;
        background-color: white;
    }

    .itens {
        margin-top: 35px;
        max-width: 650px !important;
        /* background-color: white; */

    }

    .item {

        width: 98% !important;
        margin-top: 5px !important;
        border: 1px solid black !important;


    }

    .image {
        margin-top: 20px;
        width: 190px;
        width: 190px;
    }

    .div-btn {
        margin-top: 5px !important;
        padding-bottom: 15px !important;
    }

    .column {
        padding-bottom: 0.5rem !important;
    }

    .max-widht {
        border: 5px !important;
        max-width: 100% !important;
    }
</style>