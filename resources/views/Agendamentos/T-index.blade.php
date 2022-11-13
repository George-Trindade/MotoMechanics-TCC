<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Agendamento</title>
    <!-- Favicon -->
    <link rel="icon" href="http://tcc.test/assets/img/motocicleta.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="http://tcc.test/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="http://tcc.test/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="http://tcc.test/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="http://tcc.test/assets/css/abas.css" type="text/css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="http://tcc.test/assets/img/motocicleta.png" class="navbar-brand-img" alt="...">
                    <p style="font-weight: bold;">MotoMechanics</p>
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">
                                <i class="ni ni-calendar-grid-58   text-orange"></i>
                                <span class="nav-link-text">Agendamento</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-bullet-list-67 text-default"></i>
                                <span class="nav-link-text">Meus Serviços</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-cart text-pink"></i>
                                <span class="nav-link-text active">Orçamentos</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom" style="padding-bottom: 8px; padding-top: 8px;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="http://tcc.test/assets/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Hebe Camargo</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center" style="min-height: 370px; background-image: url(http://tcc.test/assets/img/back.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Agendamentos</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->

        <div class=" container-fluid mt--9" id="pag">
            <div class="row">
                <div class="col-xl-11 order-xl-1">
                    <div class="card">
                        <div class="card-abas">
                            <nav class="nav_tabs">
                                <ul>
                                    <li>
                                        <input type="radio" id="tab1" class="rd_tab" name="tabs" checked>
                                        <label for="tab1" class="tab_label">Abertos</label>
                                        <div class="tab-content">
                                            <article>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum, felis sed feugiat tristique, massa nisl pretium ligula, vel finibus risus lacus at mauris. Proin vel mollis augue. Sed non auctor ipsum, congue facilisis diam. Proin sed enim odio. Ut libero mi, luctus sit amet tincidunt a, ullamcorper sit amet ex. Duis faucibus condimentum lectus, id accumsan diam posuere eu. Cras eu blandit dui, vitae lacinia velit. Aliquam gravida massa a velit pulvinar, ut placerat sem tristique. Vivamus dictum, quam nec pharetra iaculis, risus velit dapibus nunc, quis lobortis sapien ligula mollis nunc. Praesent elementum rutrum tincidunt. Phasellus at lacinia lectus.
                                            </article>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="tabs" class="rd_tab" id="tab2">
                                        <label for="tab2" class="tab_label">Agendados</label>
                                        <div class="tab-content">
                                            <article>
                                                Sed sit amet mauris vitae lorem pretium congue. Donec pulvinar auctor est, a porta ipsum vulputate ac. Ut sit amet sollicitudin ante. Sed gravida nulla et nibh consequat sagittis. Donec eu justo eu tortor elementum scelerisque. Mauris mollis volutpat tellus, id volutpat massa ultricies vel. Donec mollis arcu leo, ac ullamcorper eros viverra ut. Aliquam cursus justo nec purus condimentum, eu dignissim nunc mattis. Sed fermentum sollicitudin felis mattis malesuada. Quisque tempor tellus a odio euismod, non suscipit justo laoreet. Curabitur vel urna lorem. Pellentesque semper justo leo, in tristique ex porta at. Sed justo massa, lobortis quis hendrerit ac, eleifend vitae tellus.
                                            </article>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="tabs" class="rd_tab" id="tab3">
                                        <label for="tab3" class="tab_label">Concluídos</label>
                                        <div class="tab-content">
                                            <article>
                                                Integer at ligula eget turpis elementum ultrices eget quis tortor. Duis posuere lorem justo, ut malesuada tortor tempus a. Curabitur pellentesque ultricies consectetur. Maecenas diam lorem, hendrerit eget sem ut, tincidunt vulputate ipsum. In vel enim et erat sagittis eleifend vel eu nunc. In hac habitasse platea dictumst. Integer tincidunt, augue at posuere eleifend, lacus quam hendrerit risus, aliquam sollicitudin ligula tellus quis elit. Proin varius fringilla vehicula. Phasellus mollis sollicitudin orci, id fringilla magna volutpat non. Nullam sed luctus nisl.
                                            </article>
                                        </div>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="http://tcc.test/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://tcc.test/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://tcc.test/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="http://tcc.test/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="http://tcc.test/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="http://tcc.test/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
