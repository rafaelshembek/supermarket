<?php
    session_start();
    require_once('../funcoes/fu_loja.php');
    require_once('../class/IMG_avatar.php');
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="addProdutos">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cadastrar_produtos.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Cadastrar Produtos</title>
</head>
<body id="backgroundInsertProdutos" ng-controller="getProdutosCtrl">
    <?php
    if(isset($_SESSION['id_user'])){
        $id_empresa = $_SESSION['id_user'];

        $select_loja = new Funcoes();
        $select_loja->loja($id_empresa);

        $img_avatar = new IMG_avatar();
        $img_avatar->get_avatar($id_empresa);
    }
    ?>
    <!-- menu top -->
    <div class="ui secondary menu border-0 shadow" id="menu-top">
        <div class="card-body">
            <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="">
        </div>
    </div>
<section class="ui container bg-white shadow" style="border-radius: 15px;">
<!-- MENU -->
<div class="ui attached secondary stackable small menu border-0">
            <div class="card-body text-center">
                <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="">
            </div>
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="../"><i class="fas fa-home"></i><strong>Pagina Inicial</strong></a>
            </div>
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="./painel.php"><i class="fas fa-chart-area"></i> <strong>Painel Inicial</strong></a>
            </div>
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="./configuracoes.php"><i class="fas fa-cogs"></i> <strong>Configurações</strong></a>
            </div>
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="./loja/<?php echo $id_empresa; ?>"><i class="fas fa-store"></i> <strong>Minha Loja</strong></a>
            </div>
        <!-- loja so mostra para o usuario de conta empresa -->
        <div class="right menu">
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="../logica/logout.php"><strong>Sair</strong></a>
            </div>
        </div>
</div>
<div class="row">
        <!--messagem informativa -->
    <div class="col-md-12">
        <div class="card-body">
            <div class="card-body">
            <h4 class="ui header text-muted font-weight-bold text-muted">Precisando de ajuda?</h4>
                <p class="alert alert-warning shadow-sm">Em caso de dificuldade nos podemos adicionar em sua loja seus produtos nos envier  sua lista de produtos a imagens serão abistraidar dos sites oficiais de cada produtos email para o apoio <strong>agenciaatech@gmail.com</strong></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- ============================== -->
        <!-- CONTAINER FORMULARIO -->
        <!-- ============================== -->
        <div class="shadow-lg bg-white card-body" style="border-radius: 10px;">
            <form class="ui form" action="../logica/logica_cadastrar_produtos.php" method="post" enctype="multipart/form-data">
                        <div class="field">
                            <input type="hidden" name="id_loja" id="id_loja" value="<?php echo $_SESSION['id_user']; ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-body ui image">
                                    <img src="../img/logo_oficial/carrinho_vazio@2x-8.png" width="" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ui equal width fields">
                                    <div class="field">
                                    <label class="font-weight-normal">Produto:</label>
                                        <div class="ui large input">
                                            <input type="text" name="produto" id="produto" placeholder="produto">
                                        </div>
                                    </div>
                                    <div class="field">
                                    <label class="font-weight-normal">Descrição:</label>
                                        <input type="text" name="descricao" id="descricao" placeholder="descrição">
                                    </div>
                                    <div class="field">
                                    <label class="font-weight-normal">Categoria:</label>
                                        <select name="categorias" id="categorias">
                                            <option value="{{tag.id_categoria}}" ng-repeat="tag in tags">{{tag.categoria}}</option>
                                        </select>
                                        <!-- <input type="text" name="categoria" id="categoria" placeholder="categoria"> -->
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="field">
                                        <label class="font-weight-light">foto com tamanho maximo (2mb) largura: 180 x 180 de altura</label>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                        <input id="file" type="file" name="img_produto">
                                    </div>
                                    <div class="field">
                                        <label class="font-weight-normal">Preço:</label>
                                        <input type="text" name="preco" id="preco" placeholder="preço Ex: 1000.00">
                                    </div>
                                </div>
                                <button class="ui button" id="btn-cadastrar-produtos">Adicionar <i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>

    <footer class="ui container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="font-weight-light"><strong class="ui orange header">Power By</strong> Creative Agency</div>
                </div>
            </div>
        </div>
    </footer>

</section>


    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="../js/js/getCategoria.js"></script>
</body>
</html>