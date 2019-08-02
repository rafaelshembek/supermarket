<?php
session_start();
require_once('../class/Select_DB.php');
require_once('../funcoes/fu_calc.php');
require_once('../class/IMG_avatar.php');
require_once('../logica/infor_dados.php');
require_once('../funcoes/fu_loja.php');

/* buscar o total de produto que foi adicionado no carrinho de compra */
if(isset($_SESSION['id_user']) || isset($_GET['refLoja'])){
    $id_online = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : "";
    $total_produto = new Calc();
    $id_url = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
    $total = $total_produto->total_produto($id_online, $id_url);

    $loja = new Select_DB();
    $lojaID = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
    $el = $loja->exe_query("SELECT * FROM cadastro WHERE idcadastro = ".$lojaID);
    foreach($el as $value){
    $username = $value['username'];
    $nome_completo = $value['nome_completo'];
    $email = $value['email'];
    $id_loja = $value['idcadastro'];
    }
    // obter o avatar da loja
    $img_avatar = new IMG_avatar();
    $img_avatar->get_avatar($lojaID);

    $infor_loja = new Funcoes();
    $infor_loja->loja($id_online);

    // Class com os dados de moradia da loja
    $select_dados = new \Dados_Moradias\Dados();
    $select_dados->infor_dados($lojaID);
}else if(isset($_SESSION['id_user'])){
    $loja = new Select_DB();
    $lojaID = $_SESSION['id_user'];
    $el = $loja->exe_query("SELECT * FROM cadastro WHERE idcadastro = ". $lojaID);
    foreach($el as $value){
    $username = $value['username'];
    $tipo_conta = $value['tipo_conta'];
    $nome_completo = $value['nome_completo'];
    $email = $value['email'];
    $id_loja = $value['idcadastro'];
    }

    // obter o avatar da loja
    $img_avatar = new IMG_avatar();
    $img_avatar->get_avatar($lojaID);

    // Class com os dados de moradia da loja
    $select_dados = new \Dados_Moradias\Dados();
    $select_dados->infor_dados($lojaID);
    // nome da empresa
}
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="lojaApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="../../css/loja.css">
    <link rel="stylesheet" href="../../css/nav_top.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "Loja | Marketplace"; ?></title>
</head>
<body>
<div class="ui sidebar vertical menu border-0" id="butoes_tags" style="background: #5f1f9c;">
    <!-- views tags aquir -->
</div>
<section class="dimmer pusher">

    <input id="id_loja" type="hidden" value="<?php echo $_GET['refLoja']?>">
    <?php 
        if(isset($_SESSION['id_user'])){
            require_once('barra_top_loja.php');
        }else{
            echo '<div class="ui attached secondary stackable menu border-0 shadow" style="background: #56d465;">';
            echo '<div class="card-body"><img src="../../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt=""></div>';
            echo '<div class="right menu">';
            echo '<div class="item justify-content-center">';
                echo '<a class="nav-link text-white" href="../../"><strong>inicio</strong></a>';
            echo '</div>';
            echo '<div class="item justify-content-center">';
            echo '<a class="nav-link text-white" href="../../interface/signup"><strong>Cadastre-se</strong></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
     ?>
     <!-- verificar a alteração da url -->
    <?php
        $loja = new Funcoes();
        $loja->loja($id_url);
    if($loja->getTipo_conta() == 'usuario'):?>
        <section class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="m-5 card-body text-center">
                        <h1 class="text-muted">Violação na alteração da URL</h1>
                        <h2 class="ui small header text-muted">Você esta violando os <a class="nav-link" href="#!">Termos de uso!</a></h2>
                        <div class="card-body"><a class="ui red button" href="../../">Retorne a home-page</a></div>
                </div>
            </div>
        </section>
    <?php return; ?>
    <?php elseif($loja->getTipo_conta() == 'empresa'):?>
    <div class="ui attached stackable secondary menu bg-white shadow">
        <div class="item justify-content-center">
            <div class="h3 font-weight-light text-muted"><i class="fas fa-store"></i> Nome de sua loja</div>
        </div>
        <div class="right menu">
            <div class="item justify-content-center">
                <?php
                    $resultado = $total ?? 0;
                    if(isset($_SESSION['id_user']) || isset($_GET['refLoja'])){
                        if($total == 0)
                        {   
                            echo '<a  class="nav-link" href="../carrinho/'.$_GET['refLoja'].'">';
                            echo '<i class="cart icon"></i>';
                            echo 'Carrinho de Compras';
                            echo '<strong class="m-3 font-weight-bold" style="font-size: 30px;">'.$resultado.'</strong>';
                            echo '</a>';
                        }else
                        {

                            echo '<a  class="nav-link" href="../carrinho/'.$_GET['refLoja'].'">';
                            echo '<i class="cart icon"></i>';
                                echo '<div class="title">Carrinho de Compras</div>';
                                echo '<div class="description">'.$resultado.'</div>';
                            echo '</a>';
                        }
                    }else if(!isset($_SESSION['id_user']) && isset($_GET['refLoja'])){
                        
                        echo '<a  class="ui steps" href="../carrinho/'.$_GET['refLoja'].'">';
                        echo '<i class="cart icon"></i>';
                            echo '<div class="title">Carrinho de Compras</div>';
                            echo '<div class="description">'.$resultado.'</div>';
                        echo '</a>';
                    }
                ?>
                
            </div>
        </div>
    </div>
    <!--=========================-->
    <!--=========================-->
    <header>
        <div id="sessao_perfil" class="carousel slide" data-ride="carousel">
                    <!-- informações banner aquir -->
            </div>
        </div>
    </header>
    <!-- barra de categoria -->
<div id="btnbarsLoja" class="ui attached secondary stackabled menu border-0" style="background: #4AC767; width: 100%">
    <div class="item m-2">
        <button class="ui circular green icon button"><i class="bars icon"></i></button>
    </div>
    <div class="h3 item font-weight-bold text-white">Categorias</div>
</div>
    <!-- mostrar os produtos na pagina -->
    <?php require_once('body_produto.php'); ?>
    <?php else: ?>
        <!-- AVISO DE VIOLAÇÃO DA URL -->
        <section class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="m-5 card-body text-center">
                        <h1 class="text-muted">Violação na alteração da URL</h1>
                        <h2 class="ui medium header text-muted">Você acabar de violar os <a class="nav-link" href="#!">Termos de uso!</a></h2>
                        <div class="card-body">
                            <span><strong>Estamos registrando as suas informações do ponto de accesso!</strong></span>
                        </div>
                        <div class="card-body">
                            <li>OS: Windows .NET 10 System: 64bits</li>
                            <li>Nome do Computador: DESKTOP-PAS5E7N</li>
                            <li>Cidade: Itinga do Maranhão</li>
                            <li>Horario: 11:36</li>
                        </div>
                        <p class="alert alert-danger"><a class="ui red button" href="../../">Retorne a home-page</a></p>
                </div>
            </div>
        </section>
        <?php return; ?>
    <?php endif;?>
    <!-- =================== -->
    <!-- ===== rodaper ===== -->
    <!-- =================== -->
    <footer class="ui container-fluid bg-white">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="h4 font-weight-light text-muted">Localidade</div>
                        <div class="ui relaxed divided list text-muted">
                            <?php
                                if(isset($_GET['refLoja'])){
                                    echo '<div class="item">';
                                        echo '<div class="content">Rua: '.$select_dados->getRua().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Bairro: '.$select_dados->getBairro().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Numero: '.$select_dados->getNumero().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Cidade: '.$select_dados->getCidade().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Estado: '.$select_dados->getEstado().'</div>';
                                    echo '</div>';
                                    echo '<i class="br flag"></i>';
                                }else if(!isset($_GET['refLoja'])){
                                    echo '<div class="item">';
                                        echo '<div class="content">Rua: '.$select_dados->getRua().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Bairro: '.$select_dados->getBairro().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Numero: '.$select_dados->getNumero().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Cidade: '.$select_dados->getCidade().'</div>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                        echo '<div class="content">Estado: '.$select_dados->getEstado().'</div>';
                                    echo '</div>';
                                    echo '<i class="br flag"></i>';
                                }else{
                                echo '<div class="item">';
                                    echo '<div class="content">Rua: Vazio</div>';
                                echo '</div>';
                                echo '<div class="item">';
                                    echo '<div class="content">Bairro: Vazio</div>';
                                echo '</div>';
                                echo '<div class="item">';
                                    echo '<div class="content">Numero: Vazio</div>';
                                echo '</div>';
                                echo '<div class="item">';
                                    echo '<div class="content">Cidade: Vazio</div>';
                                echo '</div>';
                                echo '<div class="item">';
                                    echo '<div class="content">Estado: Vazio</div>';
                                echo '</div>';
                                echo '<i class="br flag"></i>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 bg-dark text-center">
                    <div class="card-body m-2 d-flex justify-content-center">
                        <img class="ui small image d-flex align-self-center" src="../../img/logo_oficial/logo-super.market.png" alt="logo marca super.market">
                    </div>
                    <div class="card-body m-2 text-white">
                        <h3 class="font-weight-light">Grupo Empresarial <i class="flag br"></i></h3>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-content-center flex-column text-muted">
                    <div class="card-body d-flex align-content-center justify-content-center flex-wrap flex-column">
                        <h5 class="text-center font-weight-light">Plataforma com foco em dar apoio aos setores Varejos e Atacados.</h5>
                        <p class="text-center font-weight-light">Seja Bem Vindo e Junte-se a nós</p>
                    </div>
                </div>
            </div>
<div class="row bg-dark">
    <div class="col-md-12">
        <div class="card-body">
                    <div class="content">
                        <div class="title text-white"><strong class="text-white">&copy 2019 all rights reserved</strong> Todo os direitos reservados</div>
                        <div class="description text-white">Plataforma de Comercio Online</div>
                    </div>
        </div>
    </div>
</div>
    </footer>
</section>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/angular/angular.min.js"></script>
    <script src="../../Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../js/jQuery/tags_produtos_loja.js"></script>
    <script src="../../js/js/lojaApp.js"></script>
    <script src="../../js/js/lojaController.js"></script>
</body>
</html>