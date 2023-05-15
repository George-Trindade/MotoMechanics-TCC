<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Coloque essas linhas no cabeçalho do seu HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</head>

<body>
    <style>
        .carousel .item {
            display: flex;
            align-items: center;
        }

        .carousel .item img {
            width: 60%;
            height: auto;
            margin-right: 20px;
            cursor: pointer;
        }

        .carousel .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
        }

        .carousel .slick-prev {
            left: -30px;
        }

        .carousel .slick-next {
            right: -30px;
        }
    </style>

    <h1>Detalhes do Orçamento</h1>

    <h2>Serviço: {{ $orcamento->servico }}</h2>
    <p>Descrição do Problema: {{ $orcamento->descricao_problema }}</p>

    <h3>Fotos do Problema:</h3>
    @if(count($fotosProblema) > 0)
    <div class="fotos">
        <div class="ui stackable grid">
            <div class="row">
                <div class="sixteen wide column">
                    <div class="ui large fluid carousel">
                        @foreach($fotosProblema as $foto)
                        <div class="item">
                            <a class="fancybox" href="{{ asset('assets/orcamentos/fotos/' . $foto->nome) }}" data-fancybox="gallery">
                                <img src="{{ asset('assets/orcamentos/fotos/' . $foto->nome) }}" alt="{{ $foto->nome }}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="ui inverted mini fluid buttons">
            <div class="ui icon button slick-prev">
                <i class="left arrow icon"></i>
            </div>
            <div class="ui icon button slick-next">
                <i class="right arrow icon"></i>
            </div>
        </div>
    </div>
    @else
    <p>Nenhuma foto do problema disponível.</p>
    @endif

    <!-- Inicialize o Fancybox -->
    <script>
        $(document).ready(function() {
            $('.fancybox').fancybox({
                loop: true,
                buttons: [
                    "zoom",
                    "slideShow",
                    "thumbs",
                    "close"
                ],
                thumbs: {
                    autoStart: true
                }
            });
        });
    </script>

</body>

</html>