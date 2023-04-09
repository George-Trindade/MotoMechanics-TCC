<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Homepage - Semantic</title>
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="http://192.168.1.4:8000/assets/css/fomantic/dist/components/transition.css">

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

        .column {
            max-width: 450px;
        }

        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }

        .masthead .logo.item img {
            margin-right: 1em;
        }

        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }

        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }

        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }

        .ui.vertical.stripe h3 {
            font-size: 2em;
        }

        .ui.vertical.stripe .button+h3,
        .ui.vertical.stripe p+h3 {
            margin-top: 3em;
        }

        .ui.vertical.stripe .floated.image {
            clear: both;
        }

        .ui.vertical.stripe p {
            font-size: 1.33em;
        }

        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }

        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        #img_logo {
            padding-top: 15px;
            width: 280px;
            height: 55px;
        }

        #img_user {
            width: 60px !important;
            height: 50px !important;
            border-radius: 25px !important;
        }

        @media only screen and (min-width: 801px) {
            #span_user {
                width: 260px !important;
                align-self: center !important;
                margin-left: 0 !important;
                align-items: center;
                justify-content: center;
            }

            #img_logo {
                width: 329px;
            }

            #div_menu {
                margin-right: 0;
            }
        }


        @media only screen and (max-width: 800px) {
            #logo {
                display: none !important;
            }

            #logo-nome {
                display: block !important;
                align-self: center !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            #logo_mobile {
                /* width: 120px; */
                /* padding-top: 10px; */
                width: 180px;
                height: 35px;
            }

            #img_user {
                width: 50px !important;
                height: 50px !important;
                border-radius: 25px !important;
            }


            .ui.fixed.menu {
                display: none !important;
            }

            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }

            .secondary.pointing.menu .toc.item {
                display: block;
            }

            .masthead.segment {
                min-height: 350px;
            }

            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }

            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/visibility.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/sidebar.js"></script>
    <script src="http://192.168.1.4:8000/assets/css/fomantic/dist/components/transition.js"></script>
    <script>
        $(document)
            .ready(function() {

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
</head>

<body>

    <!-- Following Menu -->
    @include('layouts.header')
    <!-- Page Contents -->

    @include('components.menu')
    <div style="min-height: 250px;">

    </div>

    @include('layouts.footer')
</body>

</html>