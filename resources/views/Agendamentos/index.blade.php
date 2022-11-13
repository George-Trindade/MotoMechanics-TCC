<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Meus agendamentos</title>
    <!-- Favicon -->
    <link rel="icon" href="http://tcc.test/assets/img/motocicleta.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="http://tcc.test/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="http://tcc.test/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="http://tcc.test/assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="http://tcc.test/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="http://tcc.test/assets/css/abas.css" type="text/css">

    <script src="http://tcc.test/assets/js/confirm.js" type="text/javascript"></script>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="">
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
                                <span class="nav-link-text">Orçamentos</span>
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
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
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
                                        <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name }}</span>
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
        <div class="header bg-default pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h1 class="h1 text-white d-inline-block mb-0">Meus Agendamentos</h1>
                        </div>
                        <a class="btn-abas" href="{{route('agendamentos.create')}}">
                            <button class="btn btn-icon btn-primary" type="button">
                                <span class="btn-inner--icon">Novo Agendamento<i class="ni ni-fat-add"></i></span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <!-- Light table -->
                        <div class="card-abas">
                            <nav class="nav_tabs">
                                <ul>
                                    <li>
                                        <input type="radio" id="tab1" class="rd_tab" name="tabs" checked>
                                        <label for="tab1" class="tab_label">Abertos</label>
                                        <div class="tab-content">
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="sort" data-sort="name">Serviço</th>
                                                            <th scope="col" class="sort" data-sort="budget">Data</th>
                                                            <th scope="col" class="sort" data-sort="status">Horário</th>
                                                            <th scope="col">Veículo</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                        @foreach($agendamentos as $agendamento)
                                                        @if($agendamento->status == 'solicitado')
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="name mb-0 text-sm">{{$agendamento->servico}}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{$agendamento->date}}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">{{$agendamento->horario}}</span>
                                                                </span>
                                                            </td>

                                                            <td class="budget">
                                                                @foreach($veiculos as $veiculo)
                                                                @if($agendamento->veiculo_id == $veiculo->id)
                                                                {{$veiculo->Modelo}}
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{route('agendamentos.edit',$agendamento->id)}}">
                                                                    <button class="btn btn-icon btn-primary" type="submit" style=" float:left; right:10px;">
                                                                        <span class="btn-inner--icon">Alterar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                                    </button>
                                                                </a>
                                                                <form action="{{route('agendamentos.destroy',$agendamento->id)}}" method="post" id='Form'>
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button class="btn btn-icon btn-primary" onclick = "ConfirmDelete()" type="submit" >
                                                                        <span class="btn-inner--icon">Cancelar <i class="fa fa-ban" aria-hidden="true"></i></span>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        <tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="tabs" class="rd_tab" id="tab2">
                                        <label for="tab2" class="tab_label">Agendados</label>
                                        <div class="tab-content">
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="sort" data-sort="name">Serviço</th>
                                                            <th scope="col" class="sort" data-sort="budget">Data</th>
                                                            <th scope="col" class="sort" data-sort="status">Horário</th>
                                                            <th scope="col">Veículo</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                        @foreach($agendamentos as $agendamento)
                                                        @if($agendamento->status == 'agendado')
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="name mb-0 text-sm">{{$agendamento->servico}}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{$agendamento->date}}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">{{$agendamento->horario}}</span>
                                                                </span>
                                                            </td>

                                                            <td class="budget">
                                                                @foreach($veiculos as $veiculo)
                                                                @if($agendamento->veiculo_id == $veiculo->id)
                                                                {{$veiculo->Modelo}}
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <form action="" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button class="btn btn-icon btn-primary" type="submit" onclick = "ConfirmDelete()">
                                                                        <span class="btn-inner--icon">Cancelar <i class="fa fa-ban" aria-hidden="true"></i></span>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        <tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="tabs" class="rd_tab" id="tab3">
                                        <label for="tab3" class="tab_label">Concluídos</label>
                                        <div class="tab-content">
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="sort" data-sort="name">Serviço</th>
                                                            <th scope="col" class="sort" data-sort="budget">Data</th>
                                                            <th scope="col" class="sort" data-sort="status">Horário</th>
                                                            <th scope="col">Veículo</th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                        @foreach($agendamentos as $agendamento)
                                                        @if($agendamento->status == 'concluido')
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <span class="name mb-0 text-sm">{{$agendamento->servico}}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{$agendamento->date}}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">{{$agendamento->horario}}</span>
                                                                </span>
                                                            </td>

                                                            <td class="budget">
                                                                @foreach($veiculos as $veiculo)
                                                                @if($agendamento->veiculo_id == $veiculo->id)
                                                                {{$veiculo->Modelo}}
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                        <tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer pt-0">

            </footer>
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
