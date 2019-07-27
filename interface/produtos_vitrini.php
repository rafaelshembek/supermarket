<?php
require_once('./class/Select_DB.php');
$select_produto_aleatorio = new Select_DB();
$resultDow = $select_produto_aleatorio->exe_query("SELECT * FROM produto JOIN categorias ON produto.id_categoria = categorias.id_categoria JOIN cadastro ON produto.id_loja = cadastro.idcadastro", null, true, true);

// buscar todas as categorias

?>
<section class="ui container-fluid">
<div class="row">
        <div id="btnbars" class="ui attached secondary stackabled menu border-0">
            <div class="item m-2">
                <button class="ui circular green icon button"><i class="bars icon"></i></button>
            </div>
            <div class="item font-weight-bold text-white">Categorias</div>
        </div>
        <div class="ui sidebar vertical menu border-0" id="butoes_tags" style="background: #5f1f9c;">

        </div>
        <!-- show produtos body inicial plataforma -->
        <?php if(count($resultDow) != 0): ?>
        <!-- <div class="dimmed pusher"> -->
            <div class="col-md-12 d-flex justify-content-center align-content-center">
            <div class="card-body produtos_vitrini bg-white d-flex justify-content-center align-content-center flex-wrap">
                <?php
                    foreach($resultDow as $key => $column){
                    
                        echo '<div class="card_produtos align-self-center m-1 bg-white" data-tags="'.$column['categoria'].'">';
                            echo '<div class="card-body text-center">';
                                echo '<p class="font-weight-bold text-muted">'.utf8_decode($column["produto"]).'</p>';
                            echo '</div>';
                                echo '<div class="text-center">';
                                    echo '<img src="./img/produtos/'.$column["img_produto"].'" height="100">';
                                echo '</div>';
                            echo '<div class="card-body text-center">';
                                echo '<div class="font-weight-light text-center text-muted">'.utf8_decode($column["descricao"]).'</div>';
                            echo '</div>';
                            echo '<div class="preco">';
                                echo '<span class="font-weight-bold cifrao shadow">R$</span>';
                                echo '<div class="font-weight-bold">'.number_format($column["preco"],2, '.', ',').'</div>';
                            echo '</div>';
                            echo '<div class="text-center">';
                                echo $column["nome_empresa"];
                            echo '</div>';
                            echo '<div class="d-flex justify-content-center align-content-center flex-wrap mt-1">';
                                    echo '<a class="ui blue button" style="box-shadow: 0px 5px 12px -5px blue;" href="interface/loja/'.$column["id_loja"].'"><i class="shopping cart icon"></i>Visitar a loja</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
            </div>
        <!-- </div> -->
        <?php else: ?>
        <div class="col-md-12 d-flex justify-content-center align-content-center">
            <div class="row d-flex justify-content-center align-content-center flex-wrap">
                <div class="col-md-6 shadow-lg" style="border-radius: 10px;">
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