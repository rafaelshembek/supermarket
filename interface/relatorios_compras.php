<?php
session_start();
require_once('../class/cl_GetRelatorioCompras.php');
if(isset($_SESSION['id_user']) && isset($_GET['cliente']) && isset($_GET['data'])){

    $idCliente = $_GET['cliente'];
    $data = $_GET['data'];

    $my_dados_cliente = new GetRelatorioCompras();
    if($idCliente && $data){
        $dados_row = $my_dados_cliente->getInformation($idCliente, $data);
        $resultMoradiaCliente = $my_dados_cliente->getRelatorio($idCliente);
        $getdados_moradia = $my_dados_cliente->getForma_pagamento2($idCliente, $data);
                 
        // print_r($getdados_moradia);
        foreach($getdados_moradia as $column){
            $valor_pagor = $column['valor_pago'];
            $forma_pagamento = $column['pagamento'];
        }
        foreach($resultMoradiaCliente as $column){
            $rua = $column['rua_moradia'];
            $numero = $column['numero_moradia'];
            $bairro = $column['bairro_moradia'];
            $cidade = $column['cidade_moradia'];
            $estado = $column['estado_moradia'];
            $referencia = $column['referencia_moradia'];

            // nome do cliente
            $nome_cliente = $column['nome_completo'];
        }
        foreach($dados_row as $column){
            $total_compras[] = $column['valor_total'];
        }
    }else{
        $dados_row = $my_dados_cliente->getInformation(null, null);
        return;
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/print.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fichar de Compras</title>
</head>
<body style="background: #f1f1f1;">
    <!-- ====================================== -->
    <nav id="menu_top" class="ui attached stackable secomdary menu border-0 bg-white">
        <!-- <button type="button" id="btnConfirma" class="ui button shadow-sm border" title="Arquivar a Compra" style="background: #fff;"><i class="archive icon"></i></button> -->
        <div class="card-body d-flex justify-content-center align-content-center">
            <a class="nav-link" href="./list_new_compras.php"><i class="reply icon"></i> voltar</a>
            <a href="#!" onclick="printButton(this)" class="ui button shadow-sm border" title="Imprimir lista da Compra" style="background: #fff;"><i class="print icon"></i></a>
            <a href="#!" class="ui button shadow-sm border" id="btnConfir" title="Informa o envior da compra" style="background: #fff;"><i class="shipping fast icon"></i>Informe o envior dos produto ao cliente</a>
        </div>
    </nav>
    <!-- ====================================== -->
    <section class="ui container bg-white shadow m-3" style="border-radius: 10px;" id="pagePrint">
        <div class="row">
            <div class="col-12">
            <div class="card-body">
                    <h3 class="card-title font-weight-light">Relatorio de Compras</h3>
            </div>
            </div>
        </div>
        <div class="row text-muted">
            <div class="col-md-6">
                <div class="card-body d-flex justify-content-center align-content-center">
                    <div class="ui border-0 vertical steps">
                        <div class="step">
                            <div class="content">
                                <div class="title">Cliente:</div>
                                <div class="description"><strong><?php echo $nome_cliente; ?></strong></div>
                            </div>
                        </div>
                        <div class="step">
                            <div class="content">
                                <div class="title">Total da Compras:</div>
                                <div class="description"><strong>R$<?php echo number_format(array_sum($total_compras), 2, '.', ','); ?></strong></div>
                            </div>
                        </div>
                        <div class="step">
                            <div class="content">
                                <div class="title">Troco:</div>
                                <?php
                                // echo $valor_pagor;
                                if($valor_pagor == '0.00'){
                                    // $a = array_sum($total_compras);
                                    // echo '<div class="description"><strong>R$0.00</strong></div>';
                                    echo '<div class="description"><strong>Sem troco</strong></div>';
                                    
                                }else{
                                    $a = (array_sum($total_compras) - $valor_pagor);
                                    echo '<div class="description"><strong>R$'.number_format(substr($a,1),2).'</strong></div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="step">
                            <div class="content">
                                <div class="title">Pagamento</div>
                                <div class="description"><strong><?php echo $forma_pagamento; ?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title font-weight-light text-muted align-self-center">Endereço do Cliente</h3>
                    <div class="ui relaxed divided list">
                        <div class="item">
                            <div class="content">
                                <p class="header">Rua</p>
                                <span class="description"><?php echo $rua; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <p class="header">Numero</p>
                                <span class="description"><?php echo $numero; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">    
                                <p class="header">Bairro</p>
                                <span class="description"><?php echo $bairro; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">    
                                <p class="header">Cidade</p>
                                <span class="description"><?php echo $cidade; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">    
                                <p class="header">Estado</p>
                                <span class="description"><?php echo $estado; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">    
                                <p class="header">Referencia</p>
                                <span class="description"><?php echo $referencia; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- tabela -->
                <div class="card-body">
                    <table class="ui single line table">
                            <!-- header da tabela -->
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Descrição</th>
                                <th>Qty</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                            <!-- body da tabela -->
                        <tbody>
                            <?php foreach($dados_row as $column): ?>
                            <tr>
                                <td><?php echo $column['produto']; ?></td>
                                <td class="text-muted font-weight-light"><?php echo $column['descricao']; ?></td>
                                <td><?php echo $column['qty_produto']; ?></td>
                                <td><?php echo 'R$'.number_format($column['preco'], 2, '.', ','); ?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/angular/angular.min.js"></script>
<script src="../js/js/realatorio_compras.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>