<?php 
    session_start();
    require_once('../funcoes/fu_loja.php');
    require_once('../class/cl_painel.php');
    require_once('../class/Select_DB.php');
    require_once('../logica/infor_dados.php');
    require_once('../class/IMG_avatar.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel</title>
</head>
<body id="backgroundBody">
<div class="ui attached secondary stackable shadow menu border-0" id="menuPainelBars">
    <div class="card-body">
        <!-- logo here! -->
        <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="">
    </div>
</div>
<section class="ui container bg-white shadow m-4">
    <!-- box configuração do menu top -->
    <?php
        if(isset($_SESSION['id_user'])){
            // id da session
            $id_empresa = $_SESSION['id_user'];
            $select_loja = new Funcoes();
            $select_loja->loja($id_empresa);

            // Class com os dados de moradia do usuario online
            $select_dados = new \Dados_Moradias\Dados();
            $select_dados->infor_dados($id_empresa);

            //Obter os registro de vendas feitas hoje e nos ultimos dias
            $select_registro = new cl_Painel();
            $el = $select_registro->registros_Vendas($id_empresa);
            // obter o avatar do usuario online
            $img_avatar = new IMG_avatar();
            $img_avatar->get_avatar($id_empresa);
        }
        ?>
<!-- menu painel -->
<div class="ui attached stackable secondary menu border-0">
    <div class="card-body text-center">
        <img src="../img/logo_oficial/logo-super.market.png" width="100em" alt="">
    </div>
    <div class="item justify-content-center">
        <a class="nav-link" href="../" style="color:#aeaeae;"><i class="fas fa-home"></i> <strong>Home Page</strong></a>
    </div>
    <div class="item justify-content-center">
        <a class="nav-link" href="./painel.php" style="color:#aeaeae;"><i class="fas fa-chart-area"></i> <strong>Vendas</strong></a>
    </div>
    <div class="item justify-content-center">
        <a class="nav-link" href="./configuracoes.php" style="color:#aeaeae;"><i class="fas fa-cogs"></i> <strong>Configurações</strong></a>
    </div>
    <div class="item justify-content-center">
        <a class="nav-link" href="./loja/<?php echo $id_empresa; ?>" style="color:#aeaeae;"><i class="fas fa-store"></i> <strong>Minha Loja</strong></a>
    </div>
    <div class="right menu">
        <div class="card-body d-flex justify-content-center align-content-center">
            <?php
                echo '<div class="text-muted">';
                echo '<strong>'.$select_loja->getUsername().'</strong>';
                echo '</div>';
                if($img_avatar->getImg()){
                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                }else{
                        echo '<img src="../assets/avatar_perfil/empresa_avatar_padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                }
            ?>
        </div>
        <div class="item justify-content-center">
            <a class="nav-link" href="../logica/logout.php">Sair</a>
        </div>
    </div>
</div>
<div class="row">

<div class="col-md-12">
        <!-- ===== -->
    <!-- seção body do painel -->
<div class="row">
        <?php
        if(isset($_SESSION['id_user'])):
            // id da session
            $id_empresa = $_SESSION['id_user'];
            $id_loja = $_SESSION['id_user'];
    
            // class cl_painel
            $select = new cl_Painel();
            $elCategoria = $select->Categoria($id_loja);

            $select->getValor_Total($id_loja);
            $elPreco = $select->PrecoTotal($id_loja);
            // caso não seja null o retorno de categorias
            if(count($elCategoria) != null){
            foreach($elPreco as $values){
                $total_vendas = $values['total_valor'];
            }
        ?>
        <!-- box_1 box_2 box_3 -->
            
    <div class="col-md-12">

        <div class="card-body d-flex justify-content-center align-content-center flex-wrap bg-white">
            <?php
                foreach($elCategoria as $values):
                    substr($values['registro'], -4);
                    $vendas_totais = $values['vendas_totais'];
                    $total_produto_preco = $values['total'];
                    
            ?>
            <div class="ui card shadow m-3">
                    <div class="content">
                            <div class="value">
                                <?php 
                                    if($values['registro'] == 0){
                                        echo '<span class="ui horizontal divider header">Hoje</span>';
                                    }else{
                                        echo '<span class="ui horizontal divider header">'.$values['registro'].' Dias Antes</span>';
                                    }
                                ?>
                            </div>
                            <div class="m-3 header text-muted">
                                <span class="category"><i class="fas fa-box"></i> QTY Produto: <?php echo $total_produto_preco ?></span>
                            </div>
                            <div class="m-3 small header text-muted">
                                <span class="category">R$: <?php echo number_format($vendas_totais, 2, ',', '.'); ?></span>
                            </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            <?php
                endforeach;
            }
                    
            if(count($elCategoria) == 1 && count($elCategoria) <= 2):
            ?>
            <div class="ui raised card m-3">
                    <div class="content">
                        <div class="ui negative message m-3">
                            <div class="header">
                                Avisor
                            </div>
                            <p>No momento ainda não temos informações suficiente</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            <div class="ui raised card m-3">
                    <div class="content">
                        <div class="ui negative message m-3">
                            <div class="header">
                                Avisor
                            </div>
                            <p>No momento ainda não temos informações suficiente</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            <?php elseif(count($elCategoria) == 2 ): ?>
            <div class="ui raised card m-3">
                <div class="content">
                    <div class="ui negative message m-3">
                        <div class="header">
                            Avisor
                        </div>
                        <p>No momento ainda não temos informações suficiente</p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="right floated author">
                        <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                        <?php
                            if($img_avatar->getImg()){
                                echo '<div class="field text-muted">';
                                    echo $select_loja->getUsername();
                                    echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                echo '</div>';
                            }else{
                                echo '<div class="field text-muted">';
                                    echo $select_loja->getUsername();
                                    echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php elseif(count($elCategoria) == null): ?>
            
            <div class="ui raised card m-3">
                    <div class="content">
                        <div class="ui negative message m-3">
                            <div class="header">
                                Avisor
                            </div>
                            <p>No momento ainda não temos informações suficiente</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            <div class="ui raised card m-3">
                    <div class="content">
                        <div class="ui negative message m-3">
                            <div class="header">
                                Avisor
                            </div>
                            <p>No momento ainda não temos informações suficiente</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            <div class="ui raised card m-3">
                    <div class="content">
                        <div class="ui negative message m-3">
                            <div class="header">
                                Avisor
                            </div>
                            <p>No momento ainda não temos informações suficiente</p>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="right floated author">
                            <!-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt -->
                            <?php
                                if($img_avatar->getImg()){
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }else{
                                    echo '<div class="field text-muted">';
                                        echo $select_loja->getUsername();
                                        echo ' <img src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil" class="ui avatar image">';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
            </div>
            
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- <p class="card-title font-weight-light">Receita de Ganhos:</p> -->
<div class="row">
    <div class="col-md-12">
        <div class="card-body d-flex justify-content-end align-content-end flex-column flex-wrap">
        <h5 class="card-title text-muted">Total de Vendas</h5>
            <h3>
                <?php
                    $valor = $total_vendas ?? '0.00';
                    if($valor != NULL){
                        echo '<p class="ui red massive label">R$'.number_format($valor, 2, ',', '.').'</p>';
                    }else{
                        echo '<p>R$'.number_format(0.00,2).'</p>';
                    }
                ?>
            </h3>
        </div>
    </div>
</div>
<!-- Chart Reloatorio -->
<section class="ui container-fluid">
    <div class="card">
        <div class="card-body">
            <canvas id="chartRelatorio" height="100"></canvas>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- FOOTER -->
    <footer>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                        <div class="ui orange header font-weight-bold">Power by <strong class="text-muted font-weight-light">agency.creative</strong></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <p class="text-muted">© 2019 all rights reserved Todo os direitos reservados</p>
                </div>
            </div>
        </div>
    </footer>
<!-- ======== -->
</div>

</div>
</section>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="../node_modules/angular/angular.min.js"></script>
<script src="../node_modules/chart.js/dist/chart.min.js"></script>
<script src="../js/js/ChartRelatorio.js"></script>
</body>
</html>