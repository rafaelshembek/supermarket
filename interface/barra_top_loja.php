
<?php
    // verificar se tem um sessão online
    barra_top($infor_loja->getTipo_conta());
    function barra_top($params){
        switch ($params) {
            case 'empresa':
                    echo '<div class="ui attached secondary stackable medium menu shadow border-0" style="background: #fff;">';
                    echo '<div class="d-flex justify-content-center">';
                        echo '<div class="card-body"><img src="../../img/logo_oficial/logo-super.market.png" width="100em" alt="logo oficial"></div>';
                    echo '</div>';
                    echo '<div class="right menu">';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link" style="color:#aeaeae;" href="../../"><strong>Inicio</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link" style="color:#aeaeae;" href="../painel"><strong>Painel</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link" style="color:#aeaeae;" href="../../logica/logout"><i class="fas fa-sign-out-alt"></i> <strong>Sair</strong></a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                break;
            
            case 'usuario':
                    echo '<div class="ui attached secondary stackable menu shadow border-0" style="background: #fff;">';
                    echo '<div class="item">';
                        echo '<img src="../../img/logo_oficial/logo-super.market.png" width="200em" alt="mercado facil">';
                    echo '</div>';
                    echo '<div class="right menu">';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link m-2" style="color:#aeaeae;" href="../../"><strong>inicio</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link m-2" style="color:#aeaeae;" href="../../logica/logout"><i class="fas fa-sign-out-alt"></i> <strong>Sair</strong></a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                break;
        }
    }
?>