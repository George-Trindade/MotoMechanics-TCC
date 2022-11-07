<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="http://tcc.test/assets/img/motocicletaBranco">
  <link rel="icon" type="image/png" href="../assets/img/motocicletaBranco.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MotoMechanics
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="http://tcc.test/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="http://tcc.test/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
<!--
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html" style="font-size: 1.6rem;">
            <img src="http://tcc.test/assets/img/motocicletaBranco.png" width="100" height="100">
            MotoMechanics
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <div class="dropdown-menu dropdown-with-icons">
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <div class="page-header header-filter" style="background-image: url('http://tcc.test/assets/img/back2.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="{{ route('login') }}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-header card-header-primary text-center">
                <img src="http://tcc.test/assets/img/motocicletaBRanco.png" width="65" height="65">
                    <h3 class="card-title">MotoMechanics</h3>
                    <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    </div>
                </div>
              <p class="description text-center">Ou seja clássico</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name='email' id='email' placeholder="Email..." for="email" :value="__('Email')" required autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">  </i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name='password' id='password' placeholder="Senha..." for="password" :value="__('Password')" required autocomplete="current-password" >
                </div>
              </div>
              <div class="container text-center">
                <a href="" class="btn btn-primary btn-link btn-wd btn-lg" style="padding-bottom: 5px; padding-top: 5px;">
                <button type="submit" class="btn btn-primary btn-sm" style="background-color: #bd2b2b;">Entrar</button>
                </a>
              </div>
              <div class="container text-center" style="font-weight: bold; padding-bottom: 6px;">
                @if (Route::has('password.request'))
                    <a style="color:#bd2b2b;display:block;"  href="{{ route('password.request') }}">Esqueci minha senha &gt;</a>
                @endif
                <a style="color:#bd2b2b"  href="{{ route('register') }}">Não possuo cadastro &gt;</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer" style="padding-top: 0px;">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://">
                MotoMechanics
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/presentation">
                Sobre Nós
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/blog">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenças
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
            Por George Trindade, 2022.
        </div>
      </div>
    </footer>
  </div>
</body>

</html>
