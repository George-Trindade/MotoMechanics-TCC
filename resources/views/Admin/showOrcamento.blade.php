@extends('adminlte::page')

@section('title', 'Orçamentos')


@section('content')

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

<div class="ui centered grid" style="padding-top: 15px;padding-bottom:15px;">
    <div id="content">
        <h2 class="ui header">Detalhes do Orçamento
        </h2>
    </div>
</div>

<div class="container context" style="padding-top: 15px;">
    <div id='card-desktop'>
        <div id="fotos-anexo" class="four wide column">
            <h4 class="ui top attached block header">
                <i class="images icon"></i> Fotos anexadas
            </h4>
            <div class="ui bottom attached segment">
                <div class="image">
                    <div class="owl-carousel">
                        @foreach($fotosProblema as $foto)
                        <div class="item">
                            <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" data-fancybox="gallery">
                                <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" alt="{{ $foto->nome }}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="four wide column">
            <h4 class="ui top attached block header">
                <i class="tools icon"></i> Serviço
            </h4>
            <div class="ui bottom attached segment">
                <h3>{{ $orcamento->servico }}</h3>
            </div>
        </div>
        <div class="four wide column">
            <h4 class="ui top attached block header">
                <i class="donate green icon"></i> Valor Total
            </h4>
            <div class="ui bottom attached segment">
                @if($orcamento->valor_total=='0.00')
                <h3>
                    <form method="POST" action="{{ route('orcamentos.update', $orcamento->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="ui action input">
                            <input id="valor_total" type="number" style='width:50%;' step="0.01" class="form-control @error('valor_total') is-invalid @enderror" name="valor_total" value="{{ $orcamento->valor_total }}" required autofocus>
                            <button type="submit" class="ui icon button" style="padding-bottom:7px;">
                                Salvar <i class="save icon" style="padding-left: 3px;"></i>
                            </button>
                        </div>
                    </form>
                </h3>
                @else
                <h3>

                    <span class="ui success text">R$ {{$orcamento->valor_total}}</span>
                </h3>
                @endif
            </div>
        </div>
        <div class="four wide column">
            <h4 class="ui top attached block header">
                <i class="motorcycle icon"></i> Veículo
            </h4>
            <div class="ui bottom attached segment">
                <h3>
                    @foreach($veiculos as $veiculo)
                    @if($orcamento->veiculo_id == $veiculo->id)
                    {{$veiculo->Modelo}}
                    @endif
                    @endforeach
                </h3>

            </div>
        </div>
        <div class="four wide column">
            <h4 class="ui top attached block header">
                <i class="poll horizontal icon"></i> Descrição do Problema
            </h4>
            <div class="ui bottom attached segment">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus error vel hic reprehenderit ipsam, eligendi sapiente accusamus non. Vero cum dicta alias eligendi pariatur blanditiis quaerat quam quis mollitia maxime.</div>
            </div>
        </div>

    </div>
</div>


<style>
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

    .context {
        min-height: 500px !important;
        padding-bottom: 30px;
    }

    .item,
    .owl-carousel,
    .fancybox>img {
        margin-left: auto;
        margin-right: auto;
        max-width: 550px !important;
        /* width: 350px !important; */
        /* height: 350px !important; */
    }

    .column {
        max-width: 700px !important;
    }

    .four.wide.column {
        padding-bottom: 15px !important;
        /* max-height: 200px; */
        width: 700px !important;
    }

    .item,
    .owl-carousel,
    .fancybox>img {
        max-height: 350px !important;
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

    }

    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    /* .owl-stage-outer {
        max-height: 500px;
        max-width: 500px;
    } */
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
    });
</script>
@stop

@section('js')
<script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.min.js"></script>
<script src="https://motomechanics.online/public/assets/css/fomantic/dist/semantic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@stop