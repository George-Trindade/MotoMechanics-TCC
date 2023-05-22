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

    <div class="container context" style="padding-top: 15px;">
        <div id='card-desktop'>
            <div id="fotos-anexo" class="four wide column">
                <h4 class="ui top attached block header">
                    <i class="images icon"></i> Fotos anexadas
                </h4>
                <div class="ui bottom attached segment">
                    <div class="image">
                        <div class="owl-carousel">
                            @if(!is_null($fotosProblema) && count($fotosProblema) > 0)
                            @foreach($fotosProblema as $foto)
                            <div class="item">
                                <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" data-fancybox="gallery">
                                    <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" alt="{{ $foto->nome }}">
                                </a>
                            </div>
                            @endforeach
                            @else
                            <div class="item">
                                <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/sem-foto.png" data-fancybox="gallery">
                                    <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/sem-foto.png" alt="Sem Foto">
                                </a>
                            </div>
                            @endif
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

                        <span class="ui error text">Em análise</span>
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

        <div id="card-orcamento" class="ui horizontal card">
            <div class="content">
                <div class="ui stackable grid">
                    <div id="fotos-anexo" class="four wide column">
                        <h4 class="ui top attached block header">
                            <i class="images icon"></i> Fotos anexadas
                        </h4>
                        <div class="ui bottom attached segment">
                            <div class="image">
                                <div class="owl-carousel">
                                    @if(!is_null($fotosProblema) && count($fotosProblema) > 0)
                                    @foreach($fotosProblema as $foto)
                                    <div class="item">
                                        <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" data-fancybox="gallery">
                                            <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/{{$foto->nome}}" alt="{{ $foto->nome }}">
                                        </a>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="item">
                                        <a class="fancybox" href="https://motomechanics.online/public/assets/orcamentos/fotos/sem-foto.png" data-fancybox="gallery">
                                            <img class="ui rounded image" src="https://motomechanics.online/public/assets/orcamentos/fotos/sem-foto.png" alt="Sem Foto">
                                        </a>
                                    </div>
                                    @endif
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

                                <span class="ui error text">Em análise</span>
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
        </div>
    </div>
    @include('layouts.footer')

</body>

</html>
<style>
    @media only screen and (max-width: 991px) {
        #fotos-anexo {
            max-width: 365px !important;
            max-height: 300px !important;
        }
    }

    @media only screen and (min-width: 992px) {
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
    }

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
        /* max-height: 350px !important; */

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
</style>
<script>
    $(document).ready(function() {
        $('#agendamentos').removeClass("active");
        $('#orçamentos').addClass("active");
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: false,
            nav: true,
            dots: false
        });

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

        function toggleCardVisibility() {
            if (window.screen.width > 900) {
                $('#card-orcamento').hide();
                $('#card-desktop').show();
            } else {
                $('#card-orcamento').show();
                $('#card-desktop').hide();
            }
        }
        // Executar a função inicialmente
        toggleCardVisibility();
        // Chamar a função sempre que a tela for redimensionada
        $(window).resize(function() {
            toggleCardVisibility();
        });
    });
</script>