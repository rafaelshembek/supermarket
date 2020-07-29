<?php
require_once('./class/Select_DB.php');
$select_produto_aleatorio = new Select_DB();
$resultDow = $select_produto_aleatorio->exe_query("SELECT * FROM produto JOIN categorias ON produto.id_categoria = categorias.id_categoria JOIN cadastro ON produto.id_loja = cadastro.idcadastro", null, true, true);

// buscar todas as categorias

?>
<section class="ui container-fluid bg-success">
<div class="row">
        <div id="btnbars" class="ui attached secondary stackabled menu border-0 shadow-lg">
            <div class="item m-2">
                <button class="ui circular icon button" style="background: #fff !important;"><i class="bars icon"></i></button>
            </div>
            <div class="h2 item font-weight-bold text-white">Categorias</div>
        </div>
        <!-- show produtos body inicial plataforma -->
        <?php if(count($resultDow) != 0): ?>
        <!-- <div class="dimmed pusher"> -->
            <div class="card-body">
                <div class="ui big label font-weight-bold">Produtos Variados</div>
            </div>
            <div class="col-md-12 d-flex justify-content-center align-content-center flex-wrap">
            <!-- <div class="ui three stackable cards"> -->
                <?php
                    foreach($resultDow as $key => $column){
                    
                        echo '<div class="card_produtos text-center align-self-start m-1 bg-white" data-tags="'.$column['categoria'].'">';
                            echo '<div class="card-body text-center">';
                                echo '<p class="font-weight-bold text-muted">'.utf8_decode($column["produto"]).'</p>';
                            echo '</div>';
                                echo '<div class="text-center ui tiny image">';
                                    echo '<img src="./img/produtos/'.$column["img_produto"].'" height="100">';
                                echo '</div>';
                            echo '<div class="card-body text-center">';
                                echo '<div class="font-weight-light text-center text-muted descriptionsProduct">'.utf8_decode($column["descricao"]).'</div>';
                            echo '</div>';
                            echo '<div class="preco">';
                                echo '<span class="font-weight-bold cifrao shadow">R$</span>';
                                echo '<div class="font-weight-bold">'.number_format($column["preco"],2, '.', ',').'</div>';
                            echo '</div>';
                            echo '<div class="text-center">';
                                echo $column["nome_empresa"];
                            echo '</div>';
                            echo '<div class="d-flex justify-content-center align-content-center flex-wrap m-2">';
                                    echo '<a class="ui green button" href="interface/loja/'.$column["id_loja"].'"><i class="shopping cart icon"></i>Visitar a loja</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
            <!-- </div> -->
            </div>
        <!-- </div> -->
        <?php else: ?>
        <div class="col-md-12 d-flex justify-content-center align-content-center m-5">
            <div class="row d-flex justify-content-center align-content-center flex-wrap">
                <div class="col-md-6 shadow-lg bg-light" style="border-radius: 10px;">
                    <div class="card-body m-0 text-center">
                        <img src="img/logo_oficial/cart-vazio.png" width="100em" alt="">
                    </div>
                    <div class="card-body">
                        <div class="h2 font-weight-light text-normal text-muted text-center"><strong>Ainda não temos produtos e nem lojas no momento</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="title text-muted">&copy 2019 all rights reserved Todo os direitos reservados</div>
                        <div class="text-muted">Plataforma de Comercio Online</div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
</div>
</section>