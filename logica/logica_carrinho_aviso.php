<?php
    switch($type_loja->getTipo_conta()){
        case 'usuario':
        echo '<section class="row border d-flex justify-content-center">';
            echo '<div class="col-md-6">';
                echo '<div class="card m-5 card-body text-center">';
                        echo '<h1 class="text-muted">Violação na alteração da URL</h1>';
                        echo '<h2 class="ui small header text-muted">Você esta violando os <a class="nav-link" href="#!">Termos de uso!</a></h2>';
                        echo '<p class="alert alert-danger"><a class="ui red button" href="../../">Retorne a home-page</a></p>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
        break;
        // case 'empresa':
        // break;    
    }
?>