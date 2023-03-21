<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Agendamento</title>
    <!-- Favicon -->
    <link rel="icon" href="http://motomechanics.online/public/assets/img/motocicleta.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="http://motomechanics.online/public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="http://motomechanics.online/public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="http://motomechanics.online/public/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="http://motomechanics.online/public/assets/css/loading.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="http://tcc.test/assets/js/ajaxHorario.js" type="text/javascript"></script>


</head>

<body>

    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="http://motomechanics.online/public/assets/img/motocicleta.png" class="navbar-brand-img" alt="...">
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
                                        <img alt="Image placeholder" src="http://motomechanics.online/public/assets/img/theme/team-4.jpg">
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
        <div class="header pb-6 d-flex align-items-center" style="min-height: 370px; background-image: url(http://motomechanics.online/public/assets/img/back.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Agendamento</h1>
                        <p class="text-white" style="vertical-align: inherit; width:407px"">
              Faça um agendamento para o serviço a ser realizado:
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->

    <div class=" container-fluid mt--9" id="pag">

                        <div class="row">

                            <div class="col-xl-11 order-xl-1">

                                <div class="card">

                                    <div class="card-body">

                                        <form action="{{route('agendamentos.store')}}" method="post" id="Form">
                                            <span>
                                                <div class="body-loader" id="div-carregamento"><span class="loader" id="carregamento"></span></div>
                                            </span>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <span id="conteudo">
                                                <h4 class="heading-small text-muted mb-4">Preencha com as informações necessárias</h4>
                                                <div class="pl-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-username">Veículo</label>
                                                        <select class="form-control" name="veiculo_id" id="veiculo_id">
                                                            @foreach($veiculos as $veiculo)
                                                            <option value="{{$veiculo->id}}">{{$veiculo->Modelo}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="example-date-input" class="form-control-label">Data</label>
                                                        <input class="form-control" type="date" name="date" id="data" required onChange="capturar()">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1" class="form-control-label">Horário</label>
                                                        <select class="form-control" name="horario" id="select-horarios" required onchange="ConfirmAction()">
                                                            <option>Selecione um horário</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1" class="form-control-label">Serviço</label>
                                                                <select class="form-control" id="servico" name="servico" value="{{old('Servico')}}">
                                                                    <option>Troca de óleo</option>
                                                                    <option>Troca de relação</option>
                                                                    <option>Troca de pneu</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-default" onclick="ConfirmSubmit()" style="padding-left: 20px; left: 350px;">Enviar</button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <!-- Argon Scripts -->
                <!-- Core -->
                <script src="http://motomechanics.online/public/assets/vendor/jquery/dist/jquery.min.js"></script>
                <script src="http://motomechanics.online/public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="http://motomechanics.online/public/assets/vendor/js-cookie/js.cookie.js"></script>
                <script src="http://motomechanics.online/public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
                <script src="http://motomechanics.online/public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
                <!-- Argon JS -->
                <script src="http://motomechanics.online/public/assets/js/argon.js?v=1.2.0"></script>
</body>




</html>
