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
        <div id="logo" class="center item">
            <img id="img_logo" src="https://motomechanics.online/public/assets/img/logodef.png">
        </div>
        <a id="logo-nome" class="center item" style="display:none">
            <img id="logo_mobile" src="https://motomechanics.online/public/assets/img/logodef.png">
        </a>
        <div id="span_user" class="right item" style="align-self: center !important; margin-left:0!important">
            <span class="ui avatar image" style="width:3em !important;height: 3em!important;">
                <img id="img_user" alt="Image placeholder" src="http://motomechanics.online/public/assets/img/tiringa.jpg">
            </span>
            <p style="
                font-weight: bold;
                font-size: 20px;
                margin-left: 5px;
                margin-top: 5px;">Tiringa</p>
        </div>

    </div>
</div>