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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../../css/loja.css">
    <link rel="stylesheet" href="../../css/nav_top.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "Loja | Marketplace"; ?></title>
</head>
<body>
    <input id="id_loja" type="hidden" value="<?php echo $_GET['refLoja']?>">
    <?php 
        if(isset($_SESSION['id_user'])){
            require_once('barra_top_loja.php');
        }else{
            echo '<div class="ui attached secondary stackable menu border-0 shadow" style="background: #56d465;">';
            echo '<div class="card-body"><img src="../../img/logo_oficial/logo-super-market-2.png" width="100em" alt=""></div>';
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
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-content-center flex-wrap">
            <div class="card-body text-center">
                <img src="../../img/logo_oficial/logo-marca.png" width="155em" alt="">
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-content-center flex-wrap">
            <div class="ui massive teal label"><i class="fas fa-store"></i> Nome de sua loja</div>
        </div>
        <div class="col-md-4">
            <div class="card-body">
                <div class="ui stackable card-body d-flex justify-content-center align-self-center" style="background: #fff;">
                    <?php
                            $resultado = $total ?? 0;
                            if(isset($_SESSION['id_user']) || isset($_GET['refLoja'])){
                                if($total == 0)
                                {   
                                    echo '<a  class="ui steps" href="../carrinho/'.$_GET['refLoja'].'">';
                                    echo '<div class="step">';
                                    echo '<i class="cart icon"></i>';
                                    echo '<div class="content">';
                                        echo '<div class="title">Carrinho de Compras</div>';
                                        echo '<div class="description">'.$resultado.'</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</a>';
                                }else
                                {

                                    echo '<a  class="ui mini shadow-sm steps border-0" href="../carrinho/'.$_GET['refLoja'].'">';
                                    echo '<div class="step">';
                                    echo '<i class="cart icon"></i>';
                                    echo '<div class="content">';
                                        echo '<div class="title">Carrinho de Compras</div>';
                                        echo '<div class="description">'.$resultado.'</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</a>';
                                }
                            }else if(!isset($_SESSION['id_user']) && isset($_GET['refLoja'])){
                                
                                echo '<a  class="ui steps" href="../carrinho/'.$_GET['refLoja'].'">';
                                echo '<div class="step">';
                                echo '<i class="cart icon"></i>';
                                echo '<div class="content">';
                                    echo '<div class="title">Carrinho de Compras</div>';
                                    echo '<div class="description">'.$resultado.'</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <!--=========================-->
    <!--=========================-->
    <!-- <header id="sessao_perfil"> -->
        <div id="sessao_perfil" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="height: 400px;" role="listbox">
            <div class="carousel-item active" style="width: 100%; height:100%;">
                <div class="a-block w-100 h-100 d-flex justify-content-center align-content-center flex-column">
                        <h1 class="text-white font-weight-light align-self-center text-center">Espaço dedicado para sua <strong class="ui massive teal label"><i class="fas fa-store"></i> Loja</strong>!</h1>
                        <p class="text-white text-center align-self-center font-weight-light">Tenha as melhores promoções de nossos produtos</p>
                </div>
            </div>
            <div class="carousel-item text-center" style="width: 100%; height:100%;">
                <div class="d-block w-100 h-100 d-flex justify-content-center align-content-center flex-column">
                        <h1 class="text-whiter align-self-center font-weight-light ui massive teal label text-center"><i class="bullhorn icon"></i> Banner de sua loja ou promoções de seus produtos</h1>
                        <h2 class="alert text-white align-self-center text-center">Duvidas ou Sugestões</h2>
                        <p class="text-white align-self-center text-center">Entre <strong>Em Contato</strong> Agora Mesmo</p>
                        <a class="ui red button align-self-center" href="../../"><i class="coffee icon"></i> Contato Dev</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#sessao_perfil" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#sessao_perfil" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    <!-- </header> -->
    <!-- barra de categoria -->
    <section class="card-body barra-tags shadow " style="background: #5f1f9c;">
        <h4 class="card-body text-white font-weight-bold m-1">Categorias <i class="tags icon"></i></h4>
        <div class="ui attached stackable secondary menu border-0" id="butoes_tags">
            <!-- views tags aquir -->
        </div>
    </section>
    <section class="row d-flex justity-content-center flex-column">
        <!-- mostrar os produtos na pagina -->
        <section class="d-flex justity-content-center flex-wrap m-2 align-self-center col-md-10 bg-white produto">
            <!-- ====== produtos aqui viar ajax -->
            <?php require_once('body_produto.php'); ?>
        </section>
    </section>
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
    <footer class="container-fluid" style="background: #f1f1f1;">
        <div class="ui container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
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
                <div class="col-md-4 text-center text-muted">
                    <div class="card-body m-2 d-flex justify-content-center">
                        <img class="ui small image d-flex align-self-center" src="../../img/logo_oficial/logo-small-top-page-cadastro.png" alt="logo marca super.market">
                    </div>
                    <div class="card-body m-2 text-muted">
                        <h3 class="font-weight-light">Grupo Empresarial <i class="flag br"></i></h3>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center flex-column text-muted">
                    <div class="card-body text-center">
                        <h5 class="text-center font-weight-light">Plataforma com foco em dar apoio aos setores Varejos e Atacados.</h5>
                        <p class="text-center font-weight-light">Seja Bem Vindo e Junte-se a nós</p>
                    </div>
                </div>
            </div>
        </div>
<div class="row" style="background: #56d465;">
    <div class="col-md-12">
        <div class="card-body">
                    <div class="content">
                        <div class="title"><strong class="text-white">&copy 2019 all rights reserved</strong> Todo os direitos reservados</div>
                        <div class="description">Plataforma de Comercio Online</div>
                        <a class="ui facebook circular icon button" href="#!">
                            <i class="facebook icon"></i></a>

                        <a href="#!" class="ui instagram icon circular button">
                        <i class="instagram icon"></i></a>
                    </div>
        </div>
    </div>
</div>
    </footer>

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/angular/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../js/jQuery/tags_produtos_loja.js"></script>
    <script src="../../js/js/lojaApp.js"></script>
    <script src="../../js/js/lojaController.js"></script>
</body>
</html>