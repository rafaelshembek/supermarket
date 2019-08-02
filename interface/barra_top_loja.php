
<?php
    // verificar se tem um sessão online
    barra_top($infor_loja->getTipo_conta());
    function barra_top($params){
        switch ($params) {
            case 'empresa':
                    echo '<div class="ui attached secondary stackable medium menu shadow border-0" style="background: #095CE8;">';
                    echo '<div class="d-flex justify-content-center">';
                        echo '<div class="card-body"><img src="../../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="mercado bay"></div>';
                    echo '</div>';
                    echo '<div class="right menu">';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link text-white font-weight-bold" href="../../"><strong>Inicio</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link text-white font-weight-bold" href="../painel"><strong>Painel</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link text-white font-weight-bold" href="../../logica/logout"><i class="fas fa-sign-out-alt"></i> <strong>Sair</strong></a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                break;
            
            case 'usuario':
                    echo '<div class="ui attached secondary stackable menu shadow border-0" style="background: #095CE8;">';
                    echo '<div class="card-body">';
                        echo '<img src="../../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="mercado bay">';
                    echo '</div>';
                    echo '<div class="right menu">';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link m-2 text-white" href="../../"><strong>inicio</strong></a>';
                        echo '</div>';
                        echo '<div class="item justify-content-center">';
                            echo '<a class="nav-link m-2 text-white" href="../../logica/logout"><i class="fas fa-sign-out-alt"></i> <strong>Sair</strong></a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                break;
        }
    }
?>