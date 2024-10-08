
<!-- =========================  -->
<div class="container-fluid box_search d-flex justify-content-center align-content-center flex-column">
        <div class="row d-flex justify-content-center align-content-center flex-wrap">
            <div class="col d-flex justify-content-center align-content-center flex-wrap">
                <div class="card-body text-center" id="info_comercio_online">
                    <div class="text-white font-weight-bold justify-content-center align-contentcenter">
                        <!-- <h3 id="horanow">0 : 0 : 0</h3> -->
                    </div>
                    <div class="h1 font-weight-bold text-white">Plataforma de Mercados Online</div>
                    <div class="ui massive yellow label font-weight-light">Suas compras em poucos passos</div>
                </div>
            </div>
            <div class="col d-flex justify-content-center align-content-center flex-wrap">
                <?php if(!isset($_SESSION['id_user'])): ?>
                <div class="card-body text-center">
                    <img src="./img/logo_oficial/logo-super.market.png" width="35%" alt="mercado bay">
                </div>
                <div class="loading_icon_login">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="card-body">
                    <form id="form-login-inicial" class="ui form d-flex justify-content-center align-content-center flex-column flex-wrap form" action="./logica/verify_login.php" method="post">
                        <div class="field">
                                <label class="text-white" for="email">Email</label>
                                <div class="ui left icon input">
                                        <input type="email" name="email" ng-model="login.email" id="email" placeholder="Email">
                                <i class="user outline icon"></i>
                                </div>
                        </div>
                        <div class="field">
                            <label class="text-white" for="password">Senha</label>
                            <div class="ui left icon input">
                                    <input type="password" name="password" ng-model="login.password" id="password" placeholder="Senha">
                                    <i class="asterisk icon"></i>
                            </div>
                        </div>
                        <div class="field">
                        </div>
                            <button class="ui green button" id="btn-loginIn">login <i class="fas fa-sign-in-alt"></i></button>
                        <!-- <a class="ui text-white button" id="btn-cadastra-login" href="interface/signup">cadastre-se</a>
                        <a class="ui text-white button" id="btn-recovery-senhar" href="interface/esqueceu_senha">esqueceu a senha?</a> -->
                    </form>
                </div>
                <?php else:?>
                    <div class="row">
                        <div class="col">
                            <div class="card-body m-5">
                                <div class="d-flex justify-content-center align-content-center flex-column">
                                    <?php 
                                        $dados = new \dadosOfUsuario\DadosUsuario();
                                        $dados->onDados($_SESSION['id_user']);
                                    ?>
                                        <?php $resImage = $dados->getImg() ?? 'padrao.jpg'; ?>
                                        <div class="avatarImage">
                                            <img class="shadow-lg bg-white" src="./assets/avatar_perfil/<?php echo $resImage; ?>" alt="<?php echo $dados->getNameUsuario(); ?>" srcset="">
                                        </div>
                                </div>
                                <div class="content text-center">
                                    <div class="h2 font-weight-bold text-white pt-3"><?php echo $dados->getNameUsuario(); ?></div>
                                    <div class="ui label"><?php echo $dados->getTipoConta(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
</div>