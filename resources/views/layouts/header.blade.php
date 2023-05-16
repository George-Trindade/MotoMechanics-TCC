<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button">Log in</a>
            </div>
            <div class="item">
                <a class="ui primary button">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <div class="item">
        <img class="ui avatar image" src="{{ asset('public/assets/users/' . Auth::user()->avatar) }}">
        <span class="ui text medium">{{ Auth::user()->name }}</span>
    </div>
    <a class="item" href="{{ route('agendamentos.index') }}">Agendamentos <i class="calendar outline icon"></i> </a>
    <a class="item" href="{{ route('orcamentos.index') }}">Orçamentos <i class="donate icon"></i></a>
    <a class="item" href="{{ route('veiculos.index') }}">Meus veículos <i class="motorcycle icon"></i></a>
    <a class="item">Meus dados <i class="user alternate icon"></i></a>
    <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Sair
        <i class="sign out alternate icon"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>