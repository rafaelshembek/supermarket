<?php
namespace Case_menu;
class menu_Top{
    // controla a logica do menu empresa ou usuario
    public function menu($type_conta, $id_loja){
        $_GET['loja'] = $id_loja;
        switch($type_conta){
            case 'empresa':
            echo '<div class="ui attached secondary stackable menu bg-white border-0">';
            echo '<div class="card-body text-center">';
                echo '<img src="img/logo_oficial/logo-super.market.png" width="100em" alt="logo marketplace">';
            echo '</div>';
            echo '<div class="card-body text-center">';
                echo '<div class="title font-weight-bold text-muted">Tenha uma otimas compras</div>';
            echo '</div>';
                echo '<ul class="right menu">';
                    echo'<div class="item justify-content-center">';
                    echo '<a href="interface/list_new_compras.php" type="button" style="background: #fff !important;" class="ui button"><strong>Relatorio de Compras</strong></a>';
                    echo '</div>';
                    echo '<div class="item justify-content-center">';
                    echo '<a href="interface/painel.php" class="ui button text-muted" style="background: #fff !important;" type="button"><strong>Painel Administrativo</strong></a>';
                    echo '</div>';
                    echo '<div class="item justify-content-center">';
                    echo '<a class="ui button" style="color: #333;" href="./logica/logout.php"><strong>Sair</strong></a>';
                    echo '</div>';
                echo '</ul>';
            echo '</div>';
                break;
            case 'usuario':
            echo '<div class="ui attached secondary stackable menu border-0 bg-white">';
            echo '<div class="card-body text-center">';
                echo '<img src="img/logo_oficial/logo-super.market.png" width="100em" alt="logo marketplace">';
            echo '</div>';
            echo '<div class="card-body text-center">';
                echo '<div class="title font-weight-bold text-muted">Tenha uma otimas compras</div>';
            echo '</div>';
            echo '<ul class="right menu">';
                echo '<div class="item justify-content-center">';
                echo '<a class="ui blue button" href="interface/PainelUsuario.php"><strong>Painel usuario</strong></a>';
                echo '</div>';
                echo '<div class="item justify-content-center">';
                echo '<a class="nav-link text-muted" href="./logica/logout.php"><strong style="color:#aeaeae;">Sair</strong></a>';
                echo '</div>';
            echo '</ul>';
            echo '</div>';
                break;
        }
    }
}
?>