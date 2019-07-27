<ul class="ui attached stackable secondary menu border-0 shadow">
    <div class="card-body text-white text-center">
        <img src="./img/logo_oficial/logo-super.market.png" height="30em" alt="">
        <span class="ui label m-2" style="background: #06C202; color: #fff;">Comprou Chegou!</span>
    </div>
    <div class="right menu manu_top">
        <div class="item justify-content-center">
            <!-- <a class="nav-link font-weight-normal" style="color:#aeaeae;" href="#!/"><strong><i class="fas fa-home"></i> Inicio</strong></a> -->
        </div>
        <div class="item justify-content-center">
            <a id="loginInicialNav" class="nav-link font-weight-normal" href="#!/login"><strong>login</strong> <i class="fas fa-sign-in-alt"></i></a>
            <!-- modal login -->
            <div class="shadow" id="modalLoginNav">
                    <div class="card-body text-center">
                        <img src="./img/logo_oficial/logo-marketplace-small-page-cadastro.png" width="100em" alt="">
                    </div>
                    <div class="loading_icon_login">
                    <i class="fas fa-spinner"></i>
                    </div>
                    <div class="card-body">
                        <form id="form-login-inicial" class="ui d-flex justify-content-center align-content-center flex-column flex-wrap form" action="./logica/verify_login.php" method="post">
                                <div class="field">
                                        <div class="ui left icon input">
                                                <input type="email" name="email" ng-model="login.email" id="email" placeholder="Email">
                                        <i class="user outline icon"></i>
                                        </div>
                                </div>
                                <div class="field">
                                        <div class="ui left icon input">
                                                <input type="password" name="password" ng-model="login.password" id="password" placeholder="Senha">
                                                <i class="asterisk icon"></i>
                                        </div>
                                </div>
                                        <button class="ui button m-1" id="btn-loginIn">login <i class="fas fa-sign-in-alt"></i></button>
                                        
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
            <a class="nav-link" href="interface/esqueceu_senha"><strong>esqueceu a senha?</strong></a>
        </div>
    </div>
</ul>