<?php


namespace Case_menu;

class menu_Top{
    // controla a logica do menu empresa ou usuario
    public function menu($type_conta, $id_loja){
        $_GET['loja'] = $id_loja;
        switch($type_conta){
            case 'empresa':
            echo '<div class="ui attached secondary stackable menu border-0" style="background: #fff;">';
            echo '<div class="card-body bg-warning">';
                echo '<img src="img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="logo marketplace">';
            echo '</div>';
            echo '<div class="item d-felx justify-content-center align-content-center flex-wrap">';
                    echo '<img src="assets/avatar_perfil/padrao.jpg" class="ui avatar image border">';
                    echo '<span>Usuario</span>';
            echo '</div>';
                echo '<ul class="right menu">';
                    echo'<div class="item justify-content-center">';
                    echo '<a href="interface/list_new_compras.php" class="nav-link font-weight-bold"><strong>Relatorio de Compras</strong></a>';
                    echo '</div>';
                    echo '<div class="item justify-content-center">';
                    echo '<a href="interface/painel.php" class="nav-link font-weight-bold"><strong>Painel Administrativo</strong></a>';
                    echo '</div>';
                    echo '<div class="item justify-content-center">';
                    echo '<a class="nav-link font-weight-bold" href="./logica/logout.php"><strong>Sair</strong></a>';
                    echo '</div>';
                echo '</ul>';
            echo '</div>';
                break;
            case 'usuario':
            echo '<div class="ui attached secondary stackable menu border-0" style="background: #fff;">';
            echo '<div class="card-body bg-warning">';
                echo '<img src="img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="logo marketplace">';
            echo '</div>';
            echo '<ul class="right menu">';
                echo '<div class="item justify-content-center">';
                echo '<a class="nav-link font-weight-bold" href="interface/PainelUsuario.php"><strong>Painel usuario</strong></a>';
                echo '</div>';
                echo '<div class="item justify-content-center">';
                echo '<a class="nav-link font-weight-bold" href="./logica/logout.php"><strong>Sair</strong></a>';
                echo '</div>';
            echo '</ul>';
            echo '</div>';
                break;
        }
    }
}
?>