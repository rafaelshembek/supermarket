<?php 
// use Carrinho_temp\Carrinho;

        // class para a gestão do banco de dado
        require_once('../class/ID_maximo_tabela.php');
        require_once('../class/Insert_DB.php');
        require_once('../class/Select_DB.php');
        require_once('../class/verifi_dados_user.php');
        require_once('../funcoes/fu_calc.php');
        require_once('../funcoes/fu_loja.php');
        require_once('../funcoes/fu_usuario.php');

?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="carrinhoApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/nav_top.css">
    <link rel="stylesheet" href="../../css/layout_carrinho.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seu carrinho de Compra</title>
</head>
<body id="atualizar" style="background: #4AC767;">
    <!-- barra menu do carrinho -->
    <?php require_once('barra_top_carrinho.php'); ?>
    <!-- corpo do carrinho -->

<section class="ui container fluid shadow bg-white m-2">

    <?php $id_loja = isset($_GET['refLoja']) ? $_GET['refLoja'] : ''; ?>
        <!-- ============================================ -->
        <?php
        
        if(isset($_SESSION['id_user'])){
            
            // //////  faz a submição dos produto da loja para o carrinho
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $id_online = $_SESSION['id_user']; // //// obtenha o ID da session online
                
                // class verificar ser o usuario tem dados de moradia

                $id_maximo = new ID_maximo_tabela();
                $idMaximo = $id_maximo->exe_idMaximo("id_carrinho", "carrinho");

                $qty_produto = $_POST['qty_produto'];
                $preco_produto = $_POST['preco'];

                $multiplic = $qty_produto * $preco_produto;
                
                $insert = new Insert_DB();
                $param = array(
                    ':id_maximo' => $idMaximo,
                    ':id_loja' => $id_loja,
                    ':id_online' => $id_online,
                    ':id_produto' => $_POST['id_produto'],
                    ':produto' => $_POST['nome_produto'],
                    ':descricao' => $_POST['descricao'],
                    ':categoria' => $_POST['categoria'],
                    ':qty' => $_POST['qty_produto'],
                    ':preco' => $_POST['preco'],
                    ':preco_total' => $multiplic
                );
                $insert->exe_insert("INSERT INTO carrinho VALUES(:id_maximo, :id_loja, :id_online, :id_produto, :produto, :descricao, :categoria, :qty, :preco, :preco_total)", $param);
                // evitar que o usuario atualizar apagina e acaba adicinando produto duplicado
                header('Location: ../carrinho/'. $_GET['refLoja']);
            }
            $id_online = $_SESSION['id_user'];
                /* buscar o total de produto que foi adicionado no carrinho de compra */
                $total_produto = new Calc();
                $result = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
                $total = $total_produto->total_produto($id_online, $result);

                 // CLASS COM FUNÇÃO QUE FAZ A SOMA DE TODOS OS PRODUTO DO USUARIO ONLINE E MOSTRA O TOTAL
                 $calc = new Calc();
                 $result = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
                 $valor_total = $calc->calcular($id_online, $result);
                

                // multiplicar o valor com a quantidade de produto
                //  $my_resultado = $valor_total * $total;

                 // buscar as informações da loja visitada pelo usuario pasando o id da loja pelo $_GET[]
                $type_loja = new Funcoes();
                $result = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
                $type_loja->loja($result);

        }else if(!isset($_SESSION['id_user']) && isset($_GET['refLoja'])){
            // buscar as informações da loja visitada pelo usuario pasando o id da loja pelo $_GET[]
            $type_loja = new Funcoes();
            $result = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
            $type_loja->loja($result);
        }
        ?> 
            <!-- verificar se o tipo de conta do usuario online é [usuario] -->
            <?php if($type_loja->getTipo_conta() == 'usuario'):?>

                <section class="row border d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card m-5 card-body text-center">
                                <h1 class="text-muted">Violação na alteração da URL</h1>
                                <h2 class="ui small header text-muted">Você esta violando os <a class="nav-link" href="#!">Termos de uso!</a></h2>
                                <p class="alert alert-danger"><a class="ui red button" href="../../">Retorne a home-page</a></p>
                        </div>
                    </div>
                </section>

            <?php return; ?>
            <!-- verificar se o tipo de conta do usuario online é [empresa] -->
            <?php elseif($type_loja->getTipo_conta() == 'empresa'): ?>
        <!-- ======== BARRA INFORMAÇÕES SOBRE A COMPRA DO CLIENTE ====== -->
            <nav class="ui stackable attached segment secondary border-0 menu">
                <div class="left menu">
                    <div class="item">
                        <div class="h3 font-weight-bold text-muted">Carrinho de Compras</div>
                    </div>
                </div>
                <div class="right menu">
                    <?php
                    if(isset($_SESSION['id_user'])){
                        $id = $_SESSION['id_user'];
                        $select = new Select_DB();
                        $el = $select->exe_query("SELECT * FROM cadastro WHERE idcadastro =".$id);
                        foreach($el as $values){
                            $nome = $values['username'];
                            $tipo_conta = $values['tipo_conta'];
                            $email = $values['email'];
                        }
                    }
                    ?>
                    <div class="item justify-content-center text-muted">
                        <div class="h4 alert font-weight-bold text-muted">
                        <?php
                        // verificar se tem uma session online
                            $resultado_qty = isset($total) ? $total : 0;
                            echo $resultado_qty;
                        ?>
                        Items 
                        </div> 
                    </div>
                    <div class="item justify-content-center">
                        <div class="h4 alert font-weight-bold text-muted">
                        Total:
                        <?php
                        // verificar se tem uma session online
                        $resultado = isset($_SESSION['id_user']) ?  $valor_total : 0.00;
                        echo 'R$'.number_format($resultado, 2, '.', ','); //mostra o valor total de todos os produtos
                        ?>
                        </div>
                    </div>
                </div>
            </nav>
        <!-- ======== LOGICA ======== -->
        <?php
            //  IF();
            /* selecionar apenas as compra de que esta online */
            if(isset($_SESSION['id_user'])):
                
                $id_online = $_SESSION['id_user'];
                /* buscar o total de produto que foi adicionado no carrinho de compra */
                $total_produto = new Calc();
                $result = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
                $total = $total_produto->total_produto($id_online, $result);
                
                
                // buscar as informações do usuario que esta online
                $usuario_online = new Usuario();
                $usuario_online->online_Usuario($_SESSION['id_user']);
            // FIM DO IF();
        ?>

            <?php
                // selecionar apenas as compra do usuario online
                $select = new Select_DB();
                $el = $select->exe_query("SELECT * FROM carrinho Where carrinho.id_loja = $id_loja and carrinho.id_usuario = $id_online",null, true, false);
                if($el == null):
            ?>
            <!-- VERIFICAR SE TEM COMPRAS NO CARRINHO -->
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center text-center">
                        <div class=" m-3">
                            <div class="card-body">
                                <h3 class="text-muted font-weight-light">Sem compras no seu Carrinho</h3>
                            </div>
                            <img class="ui medium centered image" src="../../img/logo_oficial/carrinho_vazio@2x-8.png" alt="">
                            <div class="card-body">
                                <?php
                                    $id = $_GET['refLoja'];
                                    if(isset($_SESSION['id_user']) && isset($_GET['refLoja'])){
                                        echo '<a class="red ui button" href="../loja/'.$id.'" class="btn btn-success"><i class="fas fa-shopping-bag"></i> Vamos as compras!</a>';
                                    }else if(isset($_GET['refLoja'])){
                                        echo '<a class="teal ui button" href="../../" class="btn btn-success"><i class="sign-out"></i> sair do carrinho</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            // ======================================
            // senão mostra os produto
                else:
            ?>
            <!-- PRODUTOS -->
<section class="ui container fluid m-1">
<div class="row">
<div class="col-md-9">
    <?php
    foreach($el as $items):
    $codigo = $items['id_carrinho'];
    $produto = $items['produto'];
    $categoria = $items['categoria'];
    $descricao = $items['descricao'];
    $qty = $items['qty'];
    $preco = $items['preco'];
    ?>
    <div class="row ui items" style="background: #fafafa;">
        <div class="col-md-3 item">
            <div class="content d-flex justify-content-center align-content-center flex-column flex-wrap">
                <div class="header" style="font-size: 15pt;">
                <i class="cart icon"></i>
                <strong><?php echo utf8_decode($produto); ?></strong>
                </div>
                <div class="meta">
                    <span class="price">
                        <strong>Categoria:</strong>
                        <?php echo $categoria; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 item">
            <div class="content d-flex justify-content-center align-content-center flex-column flex-wrap">
                <div class="extra p-3"><strong>Descrição:</strong> <?php echo utf8_decode($descricao); ?></div>
            </div>
        </div>
        <div class="col-sm item">
            <div class="content">
                <div class="extra p-3"><strong>Qty:</strong><?php echo $qty; ?></div>
                <div class="extra p-3"><strong>Preço:</strong> R$<?php echo number_format($preco, 2, '.', ','); ?></div>
            </div>
        </div>
        <div class="col-md-2 d-flex text-primary align-content-center flex-wrap">
            <div class="card-body d-flex text-primary align-content-center">
            <?php
            echo '<a class="ui circular icon button" href="../../logica/del/'.$_GET['refLoja'].'/'.$codigo.'"><i class="fas fa-trash-alt"></i></a>';
            ?>
            </div>
        </div>
    </div>
    <?php 
        endforeach; 
    ?>
</div>
<div class="col-md-3">
    <?php
    // ///// Class com logica buscar os dados de moradia do cliente se existe
    $verify_dados = new Verific_user();
    // /////// adicionar os dados de moradia em uma array $dados[]
    foreach ($verify_dados->verifyIdUser($_SESSION['id_user']) as $value) {
        $dados[] = $value;
    }
    // /// verificar se o cliente tem dados de moradia
    if($dados[0]['rua_moradia'] == null): ?>
        <div class="card-body shadow" style="border-radius: 10px; background: #fff;">
            <div class="card-body">
                <div class="h3 text-center" style="color: #CC8645;">Ops!</div>
                <div class="m-2 font-weight-bold text-center" style="color: #CC8645;">Onde você mora?</div>
                <div class="h3 text-center" style="color: #CC8645;"><i class="fas fa-exclamation"></i></div>
                <div class="font-weight-normal text-center" style="color: #CC8645;">O dados de <strong>Moradia</strong> é necessario para a entregar das <strong>Compras</strong></div>
            </div>
            <div class="text-center">
                <button id="btnShowModalCasdastraMoradia" class="ui red shadow button">Cadastrar dados de moradia</button>
            </div>
        </div>
    <?php
    // //// se tiver dados de moradia ele mostra o button para finalizar o pagamento         
    else:
    ?>
    <div class="card-body">
        <?php if(isset($_SESSION['id_user'])&& isset($_GET['refLoja'])):?>        
        <form id="form_pagamento" class="ui form" method="post" action="../add_produto/<?php echo $_GET['refLoja']; ?>">

            <input type="hidden" name="qty_produto" id="qty_produto" value="<?php echo $total; ?>">
            <input type="hidden" name="preco_total_produto" id="preco_total_produto" value="<?php echo $valor_total; ?>">

            <div class="field text-center">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="public" ng-model="pagamento_yes">
                    <label class="ui label" style="background: #fff;">Pagamento necessita de troco ?</label>
                </div>
            </div>
            <div class="field" ng-if="pagamento_yes">
                        <div class="description">Valor pagor no local da entregar</div>
                        <input type="number" name="valor_pago" placeholder="R$0.00">
            </div>
            <div class="field">
                    <button class="ui green button font-weight-light" type="submit"><i class="shopping basket icon"></i> Finalizar Pagamento</button>
            </div>
        </form>
        <?php endif; ?>
    </div>
    <?php endif;?>
    <div class="card-body">
        <?php
            $resultado = isset($_SESSION['id_user']) ? '<i class="cart icon"></i> Continuar Comprando' : '<i class="fas fa-shopping-bag"></i> Voltar para loja';
            echo '<a class="ui button" style="background: transparent;" href="../loja/'.$_GET['refLoja'].'">'.$resultado.'</a>';
        ?>
    </div>
</div>
</div>
</section>
            <!-- ================================ -->
            <?php 
            
            // fim da strutura if verificar o carrinho
                endif; 
            ?>
        <!-- fim da estrutura if  verificar a session -->
        <?php endif; ?>
        <?php
        // verificar se não esta logado e foi passado o id da loja onde entra no carrinho
        // mostra a messsagem de não online
            if(!isset($_SESSION['id_user']) && isset($_GET['refLoja'])): 
        ?>
                    <div class="container text-center">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h3 class="alert alert-warning font-weight-light">Você esta deslogado da conta</h3>
                                </div>
                                <div class="card-body">
                                    <img src="../../img/logo_oficial/login-password.svg" width="100" alt="" srcset="">
                                    <p class="ui header text-dark font-weight-light">Para ver as compra no carrinho precisa esta logado com seus dados de login</p>
                                </div>
                                <div class="card-body">
                                    <a class="ui red button m-1" href="../../">Entra com sua Senha</a>
                                    <?php $id_direcLoja = isset($_GET['refLoja']) ? '?refLoja='.$_GET['refLoja'] : ''; ?>
                                    <a class="ui button" style="background: transparent;" href="../loja/<?php echo $_GET['refLoja']; ?>"><i class="fas fa-shopping-bag"></i> voltar para a loja</a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
        // fim da condição if()
            endif; 
        ?>
    <!-- ============================================ -->
    <?php else: ?>
    <!-- AVISO SOBRE ALTERAÇÃO DA URL -->
    <section class="row border d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card m-5 card-body text-center">
                    <h1 class="text-muted">Violação na alteração da URL</h1>
                    <h2 class="ui medium header text-muted">Você acabar de violar os <a class="nav-link" href="#!">Termos de uso!</a></h2>
                    <div class="card-body">
                        <span><strong>Estamos registrando as suas informações do ponto de accesso!</strong></span>
                    </div>
                    <div class="card-body card">
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

    <footer class="ui container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="title"><strong class="text-primary">&copy 2019 all rights reserved</strong> Todo os direitos reservados</div>
                    <div class="description">Plataforma de Comercio Online</div>
                </div>
            </div>
        </div>
    </footer>


</section>

<!-- MODAL FORMULARIO PARA CADASTRAR OS DADOS DE MORADIA -->
<div class="modalCarrinho ui modal">
    <div class="header d-flex justify-content-center align-content-center" style="background: #4AC767;">
        <div class="font-weight-light text-white">Fomulario para o cadastro de moradia</div>
    </div>
    <form id="formDadosUsuarioCadastrarMoradia" class="ui form" action="../../logica/logica_dados_usuario.php" method="post">
        <div class="scrolling content card-body">
            <div class="field">
                <label class="font-weight-normal text-muted" for="rua_moradia">Nome da rua</label>
                <div class="ui big icon input">
                    <input type="text" placeholder="Nome da rua" name="rua_moradia" id="rua_moradia">
                </div>
            </div>
            <div class="field">
                <label class="font-weight-normal text-muted" for="numero_moradia">Numero da Casas ou Apartamento</label>
                <div class="ui big icon input">
                    <input type="number" placeholder="Numero da Casa ou Apartamento" min="0" name="numero_moradia" id="numero_moradia">
                </div>
            </div>
            <div class="field">
                <label class="font-weight-normal text-muted" for="bairro_moradia">Nome do Bairro</label>
                <div class="ui big icon input">
                    <input type="text" placeholder="Nome do Bairro" name="bairro_moradia" id="bairro_moradia">
                </div>
            </div>
            <div class="field">
                <label class="font-weight-normal text-muted" for="cidade_moradia">Cidade</label>
                <div class="ui big icon input">
                    <input type="text" placeholder="Cidade" name="cidade_moradia" id="cidade_moradia">
                </div>
            </div>
            <div class="field">
                <label class="font-weight-normal text-muted" for="estado_moradia">Estado Ex: Maranhão</label>
                <div class="ui big icon input">
                    <input type="text" placeholder="Estado ex: Maranhão" name="estado_moradia" id="estado_moradia">
                </div>
            </div>
            <div class="field">
                <label class="font-weight-normal text-muted" for="referencia_moradia">Referencia de sua moradia</label>
                <div class="ui big icon input">
                    <input type="text" placeholder="Referencia de sua moradia" name="referencia_moradia" id="referencia_moradia">
                </div>
            </div>
        </div>
        <div class="extra content">
            <div class="field d-flex justify-content-center align-content-center flex-wrap">
                <button class="ui green button">Salvar e Atualizar</button>
            </div>
        </div>
        </form>
</div>

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="../../node_modules/angular/angular.min.js"></script>
    <script type="module" src="../../js/js/modulesCarrinho.js"></script>

</body>
</html>