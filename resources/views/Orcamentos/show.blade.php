<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Orçamentos</title>
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://motomechanics.online/public/assets/css/components/base_pag.css">
    <link rel="stylesheet" href="https://motomechanics.online/public/assets/css/loading.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.js"></script>
    <script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.js"></script>
    <script src="https://motomechanics.online/public/assets/js/veiculo.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>
    @include('layouts.header')
    @include('components.menu')

    <div class="ui centered grid" style="padding-top: 15px;padding-bottom:15px;">
        <div id="content">
            <h2 class="ui header">Detalhes do Orçamento
            </h2>
        </div>
    </div>

    <div class="container" style="padding-top: 15px;">
        <h3 class="ui horizontal divider header">
            <i class="images icon"></i>
            Fotos Anexadas:
        </h3>
        @if(count($fotosProblema) > 0)
        <div class="owl-carousel">
            @foreach($fotosProblema as $foto)
            <div class="item">
                <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" data-fancybox="gallery">
                    <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" alt="{{ $foto->nome }}">
                </a>
            </div>
            @endforeach
        </div>
        @else
        <p>Nenhuma foto do problema disponível.</p>
        @endif
        <h3 class="ui horizontal divider header">
            <i class="tools  icon"></i>
            Serviço
        </h3>
        <h3>
            <i class="cogs icon"></i>
            {{ $orcamento->servico }}
        </h3>
        @if($orcamento->valor_total=='0.00')
        <h3>
            <i class="donate green icon"></i>Valor Total:
            <span class="ui error text">Em análise</span>
        </h3>
        @else
        <h3>
            <i class="donate green icon"></i>Valor Total:
            <span class="ui success text">R$ {{$orcamento->valor_total}}</span>
        </h3>
        @endif
        <h3>
            <i class="motorcycle icon"></i>
            @foreach($veiculos as $veiculo)
            @if($orcamento->veiculo_id == $veiculo->id)
            Veiculo: {{$veiculo->Modelo}}
            @endif
            @endforeach
        </h3>

        <h3 class="ui horizontal divider header">
            <i class="poll horizontal icon"></i>
            Descrição do Problema
        </h3>
        <div style="max-width: 500px;">{{ $orcamento->descricao_problema }}</div>

    </div>

    @include('layouts.footer')

</body>

</html>
<style>
    footer {
        position: inherit !important;
    }

    @media only screen and (max-width: 992px) {
        .ui.grid {
            margin: 0;
        }

        .item,
        .owl-carousel,
        .fancybox>img {
            max-width: 200px !important;
            max-height: 200px !important;
        }
    }

    .divider {
        max-width: 600px;
    }

    .item,
    .owl-carousel,
    .fancybox>img {
        max-width: 500px !important;
        max-height: 500px !important;
    }

    #content {
        padding-top: 30px;
        padding-bottom: 10px;
    }

    .owl-prev,
    .owl-next {
        background-color: #000000;
        color: #fff;
        padding: 10px 15px;
        position: absolute;
        top: 50%;
        font-size: 70px !important;
        text-shadow: 2px 2px 2px #fff !important;
        transform: translateY(-50%);
    }

    .owl-prev {
        left: 10px;
    }

    .owl-next {
        right: 10px;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding-bottom: 30px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
    }
</style>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: false,
            nav: true,
            dots: false
        });

        // owl.on('changed.owl.carousel', function(event) {
        //     var current = event.item.index;
        //     var total = event.item.count;
        //     if (current === total - 1) {
        //         owl.trigger('stop.owl.autoplay');
        //     }
        // });

        // $('.owl-item').on('click', function() {
        //     owl.trigger('next.owl.carousel');
        // });
    });
</script>