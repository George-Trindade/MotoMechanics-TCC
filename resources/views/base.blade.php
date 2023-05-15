<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Base</title>
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/components/footer.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/menu.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/transition.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/components/base_pag.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/visibility.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/sidebar.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/transition.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/semantic.min.js"></script>

</head>

<body>

    <!-- Following Menu -->
    @include('layouts.header')
    <!-- Page Contents -->

    @include('components.menu')
    <br><br><br><br><br>
    <form action="{{route('orcamentos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="servico">Serviço:</label>
        <input type="text" id="servico" name="servico" required>
        <br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        <br>

        <label for="fotos">Fotos:</label>
        <input type="file" id="fotos" name="fotos[]" multiple accept="image/*" required>
        <br>

        <input type="submit" value="Enviar Orçamento">
    </form>

    @include('layouts.footer')
</body>

</html>

<script>
    $(document)
        .ready(function() {
            $('#drop-user').dropdown();

            // fix menu when passed
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
            $('.ui.sidebar')
                .sidebar('attach events', '.toc.item');

        });
</script>