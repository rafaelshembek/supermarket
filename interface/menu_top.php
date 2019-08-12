<?php if(!isset($_SESSION['id_user'])): ?>
<ul class="ui attached stackable secondary menu border-0" style="background: #fff;">
    <div class="card-body bg-warning">
        <img src="./img/logo_oficial/logo-small-top-page-cadastro.png" height="30em" alt="mercado.bay">
    </div>
    <div class="right stackable attached secondary menu manu_top">
        <div class="item justify-content-center">
        </div>
        <div class="item justify-content-center">
        
            <!-- modal login -->
            <div class="shadow-lg" id="modalLoginNav">
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
            <div class="ui buttons">
                <a id="loginInicialNav" class="ui yellow button text-white font-weight-bold" style="box-shadow: 0px 7px 7px -5px yellow;" href="#!/login"><strong>login</strong>
                <a class="ui orange button font-weight-bold" style="box-shadow: 0px 7px 7px -5px orange;" href="interface/signup">cadastre-se</a>
                <a class="ui button font-weight-bold" href="interface/esqueceu_senha"><strong>esqueceu a senha?</strong></a>
            </div>
        </div>
    </div>
</ul>
<?php else: ?>
<?php
require_once("./funcoes/fu_case_menu.php");
require_once("./class/Select_DB.php");
$id = $_SESSION['id_user'];

function menuTop($id){
    $select_type_conta = new Select_DB();
    $el = $select_type_conta->exe_query("SELECT * from cadastro Where idcadastro = $id");
    foreach($el as $items){
        $tipo_conta = $items['tipo_conta'];
        $id_loja = $items['idcadastro'];
        $username = $items['username'];
    }
    $menu_case = new \Case_menu\menu_Top();
    $menu_case->menu($tipo_conta, $id_loja);
}
menuTop($id);
?>
<?php endif;?>