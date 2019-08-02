<ul class="ui attached stackable secondary menu border-0 shadow" style="background: #095CE8;">
    <div class="card-body text-white text-center">
        <img src="./img/logo_oficial/logo-small-top-page-cadastro.png" height="30em" alt="mercado.bay">
    </div>
    <div class="right menu manu_top">
        <div class="item justify-content-center">
        </div>
        <div class="item justify-content-center">
            <a id="loginInicialNav" class="nav-link text-white font-weight-normal" href="#!/login"><strong>login</strong> <i class="fas fa-sign-in-alt"></i></a>
            <!-- modal login -->
            <div class="shadow" id="modalLoginNav">
                    <div class="card-body text-center">
                        <img src="./img/logo_oficial/logo-super.market.png" width="100em" alt="mercado bay">
                    </div>
                    <div class="loading_icon_login">
                    <i class="fas fa-spinner"></i>
                    </div>
                    <div class="card-body">
                        <form id="form-login-inicial" class="ui d-flex justify-content-center align-content-center flex-column flex-wrap form" action="./logica/verify_login.php" method="post">
                                <div class="field">
                                        <label for="email">Email</label>
                                        <div class="ui left icon input">
                                                <input type="email" name="email" ng-model="login.email" id="email" placeholder="Email">
                                        <i class="user outline icon"></i>
                                        </div>
                                </div>
                                <div class="field">
                                        <label for="password">Senha</label>
                                        <div class="ui left icon input">
                                                <input type="password" name="password" ng-model="login.password" id="password" placeholder="Senha">
                                                <i class="asterisk icon"></i>
                                        </div>
                                </div>
                                        <button class="ui blue button m-1" id="btn-loginIn">login <i class="fas fa-sign-in-alt"></i></button>
                                        
                                        <a class="ui button" id="btn-cadastra-login" href="interface/signup">cadastre-se</a>
                                        <a class="ui button" id="btn-recovery-senhar" href="interface/esqueceu_senha">esqueceu a senha?</a>
                        </form>
                    </div>
            </div>
        </div>
        <div class="item justify-content-center">
            <a class="ui button" style="background: #ff9b83; color: #fff; box-shadow: 0px 5px 10px -5px #ff9b83; border-radius: 30px;" href="interface/signup">cadastre-se</a>
        </div>
        <div class="item justify-content-center">
            <a class="nav-link text-white font-weight-normal" href="interface/esqueceu_senha"><strong>esqueceu a senha?</strong></a>
        </div>
    </div>
</ul>