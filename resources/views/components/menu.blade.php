<?php

use Illuminate\Support\Facades\Auth;

$nomeCompleto = Auth::user()->name;
$primeiroNome = explode(' ', $nomeCompleto)[0];
?>

<div class="ui container" style="width: 100%!important;background:darkred;margin-left:0px;">
    <div id="div_menu" class="ui inverted large secondary pointing menu" style="border-bottom: 0;margin-left: 15px;margin-right: 15px;">
        <div style="display:flex">
            <a class="toc item" style="align-self: center !important;">
                <i class="sidebar large icon"></i>
            </a>
            <a id="agendamentos" class="active item" href="{{route('agendamentos.index')}}" style="align-self: center;">Agendamentos</a>
            <a id="orçamentos" class="item" style="align-self: center;">Orçamentos</a>
            <a id="veiculos" class="item" href="{{route('veiculos.index')}}" style="align-self: center;">Meus veículos</a>
            <!-- <a class="item" style="align-self: center;">Careers</a> -->
        </div>
        <div id="logo" class="center item" style="width: 565px;">
            <img id="img_logo" src="https://motomechanics.online/public/assets/img/logodef.png">
        </div>
        <a id="logo-nome" class="center item" style="display:none">
            <img id="logo_mobile" src="https://motomechanics.online/public/assets/img/logodef.png">
        </a>
        <div class="" style=" display: flex;align-items: center; margin-bottom: 10px;padding: 0px;">
            <div id="drop-user" class="ui dropdown item">
                <img class="ui avatar image" src="{{ asset('public/assets/users/' . Auth::user()->avatar) }}">
                <span class="ui text large"><strong>{{ $primeiroNome }}</strong></span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{route('usuario.index')}}">Meus dados</a>
                    <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#drop-user').dropdown();
    });
</script>