<?php
    session_start();
    require_once('../class/ID_maximo_tabela.php');
    require_once('../class/Select_DB.php');
    require_once('../class/Insert_DB.php');
    require_once('../funcoes/fu_loja.php');
    require_once('../checkout/end.php');

// DEFINIR AS FORMA DE PAGAMENTO
define('STATUS_PAGO', 'Pagamento efetuado com sucesso');
define('STATUS_EM_ANDAMENTO', 'Pagamento em Analise');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../../css/add_produto.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- LOGICA PARA A FINALIZAÇÃO DO PAGAMENTO -->
<section>
    <?php
// verificar se tem uma sessão online
if(isset($_SESSION['id_user']) && isset($_GET['refLoja'])){

                // verificar se foi submetido o formulario
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id_loja = $_GET['refLoja'];
        $id_usuario = $_SESSION['id_user'];
        $total_compras = isset($_POST['qty_produto']) ? $_POST['qty_produto'] : '';
        $vendas_produto = isset($_POST['preco_total_produto']) ? $_POST['preco_total_produto'] : '';
        $valor_pago = isset($_POST['valor_pago']) ? $_POST['valor_pago'] : '';
        
        // class funcoes();
        $type_loja = new Funcoes();
        $idLoja = isset($_GET['refLoja']) ? $_GET['refLoja'] : '';
        $type_loja->loja($idLoja);

        $el = new \Finaly_Compra\end_compras();

        // selecionar id maximo da tabela forma_pagamento
        $id_maximo = new \ID_maximo_tabela();
        $idMaximo = $id_maximo->exe_idMaximo('id_pagamento', 'forma_pagamento');
        
        // selecionar id maximo da tabela pedidos
        $id_maximo_peidos = new \ID_maximo_tabela();
        $idPedidos = $id_maximo_peidos->exe_idMaximo('idPedido', 'pedido');
        $dataPedido = date('Y-m-d H:i:s', time());
        // echo $dataPedido;
        $select_produtos_carrinho = new Select_DB();
        $params = array(
            ':id_loja' => $idLoja,
            ':id_usuario' => $id_usuario
        );
        $produtos_carrinho = $select_produtos_carrinho->exe_query("SELECT * FROM carrinho WHERE carrinho.id_loja = :id_loja and carrinho.id_usuario = :id_usuario", $params);

        // echo '<pre>';
        // print_r($produtos_carrinho);
        // echo '</pre>';

        $insert = new Insert_DB();

        $tipo_pagamento = $_POST['optionPagamento'];

        switch ($tipo_pagamento) {
            case 'Cartao':
                # code...
                $forma_pagamento = 'Cartão';
                break;
            
            case 'Dinheiro':
                # code...
                $forma_pagamento = 'Dinheiro';
                break;
        }

        $data_pagamento = date('Y-m-d H:i:s', time());
        // verificar se existe valor para troco
        if(isset($_POST['valor_pago'])){
            $dados = array(
                ':id_maximo' => $idMaximo,
                ':forma_pagamento' => 'Pagamento na hora da entregar',
                ':total_compra' => $total_compras,
                ':id_loja' => $id_loja,
                ':id_usuario' => $id_usuario,
                ':modalidade_pagamento' => $forma_pagamento,
                ':data_pagamento' => $data_pagamento,
                ':valor_paga' => $_POST['valor_pago']
            );
            $insert->exe_insert("INSERT INTO forma_pagamento (id_pagamento, pagamento, id_loja, id_usuario, qty_compras, modalidade_pagamento, data_paga, valor_pago)VALUES(:id_maximo, :forma_pagamento, :id_loja, :id_usuario, :total_compra, :modalidade_pagamento, :data_pagamento, :valor_paga)", $dados);
        }else{
            $dados = array(
                ':id_maximo' => $idMaximo,
                ':forma_pagamento' => 'Pagamento na hora da entregar',
                ':total_compra' => $total_compras,
                ':id_loja' => $id_loja,
                ':id_usuario' => $id_usuario,
                ':modalidade_pagamento' => $forma_pagamento,
                ':data_pagamento' => $data_pagamento
            );
            
            $insert->exe_insert("INSERT INTO forma_pagamento (id_pagamento, pagamento, id_loja, id_usuario, qty_compras, modalidade_pagamento, data_paga)VALUES(:id_maximo, :forma_pagamento, :id_loja, :id_usuario, :total_compra, :modalidade_pagamento, :data_pagamento)", $dados);
        }
        // $el->dados_pagamento($dados); //adicionar as inforamções do pagamento na tabela
        foreach($produtos_carrinho as $key => $column){
            $produtos[':id_usuario'] = $id_usuario;
            $produtos[':id_loja'] = $id_loja;
            $produtos[':id_produto'] = $column['id_produto'];
            $produtos[':qty'] = $column['qty'];
            $produtos[':valor_total'] = $column['preco_total'];
            $produtos[':dataPedido'] = $dataPedido;
            
            $el->produtos($produtos); // adicionar o produtos na tabela pedido
        }
            $el->checkout($id_usuario, $id_loja); // finalizar a compra

    }else{
        // AVISO SOBRE ALTERAÇÃO DO URL
    echo '<section class="row border d-flex justify-content-center">';
    echo '<div class="col-md-6">';
        echo '<div class="card m-5 card-body text-center">';
            echo '<h1 class="text-muted">Violação na alteração da URL</h1>';
            echo '<h2 class="ui medium header text-muted">Você acabar de violar os <a class="nav-link" href="#!">Termos de uso!</a></h2>';
                echo '<div class="card-body">';
                    echo '<span><strong>Estamos registrando as suas informações do ponto de accesso!</strong></span>';
                echo '</div>';
                echo '<div class="card-body card">';
                    echo '<li>OS: Windows .NET 10 System: 64bits</li>';
                    echo '<li>Nome do Computador: DESKTOP-PAS5E7N</li>';
                    echo '<li>Cidade: Itinga do Maranhão</li>';
                    echo '<li>Horario: 11:36</li>';
                echo '</div>';
                echo'<div class="alert alert-danger"><a class="ui red button" href="../../">Retorne a home-page</a></div>';
        echo '</div>';
    echo '</div>';
    echo '</section>';
        // ===========================
        return;
    }
}else{
    // $id_loja = isset($_SESSION['id_user'])? $_SESSION['id_user'] : 'Você precisa esta Online para ver essa pagina';
       // AVISO SOBRE ALTERAÇÃO DO URL
    echo '<section class="row border d-flex justify-content-center">';
    echo '<div class="col-md-6">';
        echo '<div class="card m-5 card-body text-center">';
            echo '<h1 class="text-muted">Violação na alteração da URL</h1>';
            echo '<h2 class="ui medium header text-muted">Você acabar de violar os <a class="nav-link" href="#!">Termos de uso!</a></h2>';
                echo '<div class="card-body">';
                    echo '<span><strong>Estamos registrando as suas informações do ponto de accesso!</strong></span>';
                echo '</div>';
                echo '<div class="card-body card">';
                    echo '<li>OS: Windows .NET 10 System: 64bits</li>';
                    echo '<li>Nome do Computador: DESKTOP-PAS5E7N</li>';
                    echo '<li>Cidade: Itinga do Maranhão</li>';
                    echo '<li>Horario: 11:36</li>';
                echo '</div>';
                echo'<div class="alert alert-danger"><a class="ui red button" href="../../">Retorne a home-page</a></div>';
        echo '</div>';
    echo '</div>';
    echo '</section>';
        // ===========================
    return;
}
    ?>
    <!-- MENU TOP ================================== -->
    <div class="ui attached segment stackable medium menu border-0 bg-white shadow">
            <div class="d-flex justify-content-center text-muted">
                    <p class="font-weight-light text-center align-self-center m-2"><i class="fas fa-store"></i>  Marketplace<strong class="m-3">Sua melhor escolha de compras</strong></p>
            </div>
            <div class="right menu">
                <?php
                    if(isset($_GET['refLoja'])){
                        echo '<a class="nav-link text-center" href="../loja/'.$_GET['refLoja'].'"><strong>Voltar para a loja</strong></a>';
                    }else if(isset($_SESSION['id_user'])){
                        echo '<a class="nav-link text-center" href="../loja/'.$_GET['refLoja'].'"><strong>Voltar para a loja</strong></a>';
                    }
                ?>
                <a class="nav-link text-center" href="../../logica/logout"><strong>Sair</strong></a>
            </div>
    </div>
    <!-- ========================================== -->
    <div class="row d-flex align-content-center justify-content-center">
        <div class="col-md-6">
            <div class="card-body d-flex align-content-center justify-content-center">
                <p class="ui green massive label"><strong>A sua compra foi registrada com sucesso</strong> <i class="fas fa-smile-wink"></i></p>
            </div>
        </div>
    </div>
    <div class="ui container">
                <div class="card-body d-flex justify-content-center align-content-center">
                    <div class="ui three steps border-0">
                        <div class="completed step">
                            <i class="completed icon"></i>
                            <div class="content">
                                <div class="title">Agradecemos por sua visitar</div>
                                <div class="description">Temos tudo o que precisamos</div>
                            </div>
                        </div>
                        <div class="completed step">
                            <i class="completed icon"></i>
                            <div class="content">
                            <div class="title">Informações sobre suas Compras</div>
                            <div class="description">Nossos funcionarios estão separando suas compras para a entregar</div>
                            </div>
                        </div>
                        <div class="active step">
                            <i class="truck icon"></i>
                            <div class="content">
                                <div class="title">Saindo para a entrenga do produto</div>
                                <div class="description">Em poucos minutos suas Compras estarão em seu destino <i class="time icon"></i></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="container">
        <div class="row d-flex align-content-center justify-content-center">
            <div class="col-md-6 bg-white">
                <div class="card-body text-center">
                    <h1 class="card-text text-muted font-weight-light">Obrigado por nos visitar.</h1>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <?php
                            if(isset($_GET['refLoja'])){
                                echo '<a class="ui green button" href="../loja/'.$id_loja.'">Voltar para a loja</a>';
                            }else if(isset($_SESSION['id_user'])){
                                echo '<a class="ui red button" href="../loja/'.$id_loja.'">Voltar para a loja</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="ui container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="ui steps border-0">
                    <div class="step">
                        <div class="content">
                            <div class="title"><strong class="text-primary">&copy 2019 all rights reserved</strong> Todo os direitos reservados</div>
                            <div class="description">Plataforma de Comercio Online</div>
                            <a class="ui facebook button" href="#!">
                                <i class="facebook icon"></i>Facebook</a>

                            <a href="#!" class="ui instagram button">
                            <i class="instagram icon"></i>Instagram</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>