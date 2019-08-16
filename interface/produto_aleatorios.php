<?php
require_once('./class/Select_DB.php');
$select_produto_aleatorio = new Select_DB();
$resultDow = $select_produto_aleatorio->exe_query("SELECT * FROM produto LEFT JOIN cadastro ON produto.id_loja = cadastro.idcadastro");

shuffle($resultDow);
?>
<?php if(array_count_values($resultDow) != 0): ?>
<div class="row">
    <div class="col-md-12">
        <div class="card-body produtos_vitrini d-flex justify-content-center align-content-center flex-wrap">
            <?php
                foreach($resultDow as $key => $column){
                   
                    echo '<div class="card card_produtos align-self-center m-1 bg-white">';
                        echo '<div class="card-body" style="background: #fff;">';
                            echo '<h5 class="font-weight-light text-muted"><i class="shopping bag icon"></i>'.utf8_encode($column["produto"]).'</h5>';
                        echo '</div>';
                            echo '<div class="text-center">';
                                echo '<img src="./img/produtos/'.$column["img_produto"].'" height="100">';
                            echo '</div>';
                        echo '<div class="m-0 p-2 font-weight-light text-center text-muted">'.utf8_encode($column["descricao"]).'</div>';
                        echo '<span class="card-body" style="font-size: 15pt;">';
                            echo 'R$'.number_format($column["preco"],2, '.', ',');
                        echo '</span>';
                        echo '<div class="card-body border" style="background: #fafafa;">';
                            echo '<div class="text-muted m-1">';
                                echo '<i class="shopping cart icon"></i> LOJA';
                            echo '</div>';
                                echo '<a class="ui blue button" href="interface/loja/'.$column["id_loja"].'">'.$column["nome_completo"].'</a>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col-md-12">
        <div class="card-body m-5">
            <div class="h3 font-weight-light text-normal text-center"><strong class="ui red massive label">Ainda não temos produto nem loja no momento</strong></div>
        </div>
    </div>
</div>
<?php endif;?>