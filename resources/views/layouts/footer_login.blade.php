<!-- <div id="footer" class="ui vertical footer segment " style="background:darkred">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="three wide column">
                <h4 class="ui inverted header">About</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Sitemap</a>
                    <a href="#" class="item">Contact Us</a>
                    <a href="#" class="item">Religious Ceremonies</a>
                    <a href="#" class="item">Gazebo Plans</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Services</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Banana Pre-Order</a>
                    <a href="#" class="item">DNA FAQ</a>
                    <a href="#" class="item">How To Access</a>
                    <a href="#" class="item">Favorite X-Men</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Footer Header</h4>
                <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
            </div>
        </div>
    </div>
</div> -->

<footer class="ui inverted vertical segment" style="position: fixed; bottom: 0; width:100%;">
    <div class="ui container">
        <div class="ui stackable grid equal height center aligned">
            <div class="sixteen wide mobile eight wide tablet eight wide computer column">
                <h4 class="ui inverted header">Entre em contato</h4>
                <div class="ui inverted list">
                    <div class="item"><i class="map marker alternate icon"></i>Endereço: Rua Exemplo, 123 - Bairro, Cidade - Estado</div>
                    <div class="item"><i class="phone icon"></i>Telefone: (XX) XXXX-XXXX</div>
                    <div class="item"><i class="envelope icon"></i>E-mail: contato@exemplo.com.br</div>
                </div>
            </div>
            <div class="sixteen wide mobile four wide computer column">
                <h4 class="ui inverted header">Nos siga nas redes sociais</h4>
                <div class="ui inverted huge horizontal list right aligned">
                    <div class="item"><a href="#"><i class="large facebook icon"></i></a></div>
                    <div class="item"><a href="#"><i class="large twitter icon"></i></a></div>
                    <div class="item"><a href="#"><i class="large instagram icon"></i></a></div>
                    <div class="item"><a href="#"><i class="large linkedin icon"></i></a></div>
                </div>

            </div>
            <div class="sixteen wide mobile four wide computer column">
                <h4 class="ui inverted header"></h4>
                <div class="ui inverted large horizontal list center aligned">
                    <img src="https://motomechanics.online/public/assets/img/logodef.png">
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    @media only screen and (min-width: 768px) {
        .ui.inverted.large.horizontal.list.right.aligned {
            justify-content: flex-end;
        }
    }

    @media only screen and (min-width: 768px) {
        .ui.divided.list-white>li {
            display: flex;
            justify-content: space-between;
        }
    }


    .ui.inverted.vertical.segment {
        background-color: darkred !important;
    }
</style>