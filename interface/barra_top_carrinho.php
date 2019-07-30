
        <?php
        session_start();
        //verificar a sessão barra do topoo
        if(isset($_SESSION['id_user'])){

            $id = $_SESSION['id_user'];
            $select = new Select_DB();
            $el = $select->exe_query("SELECT * FROM cadastro WHERE idcadastro =".$id);
            foreach($el as $values){
                $idloja_online = $values['idcadastro'];
                $nome = $values['username'];
                $tipo_conta = $values['tipo_conta'];
                $email = $values['email'];
            }

            
                    switch ($tipo_conta) {
                        case 'empresa':
                            echo '<div class="ui attached secondary stackable small menu shadow border-0" style="background: #4AC767;">';
                                echo '<div class="card-body text-center"><img src="../../img/logo_oficial/logo-super-market-2.png" width="100em"></div>';
                                echo '<div class="right menu">';
                                    echo '<div class="item">';
                                    echo '<a class="nav-link text-white" href="../../"><strong>inicio</strong></a>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                    echo '<a class="ui green button" href="../loja/'.$idloja_online.'"><i class="fas fa-store"></i> <strong>Minha Loja</strong></a>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                    echo '<a class="nav-link text-white" href="../painel"><strong>Painel</strong></a>';
                                    echo '</div>';
                                    echo '<div class="item">';
                                    echo '<a class="nav-link text-white" href="../../logica/logout"><strong>Sair</strong></a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            break;
                        case 'usuario':
                            echo '<div class="ui attached secondary stackable small menu shadow border-0" style="background: #4AC767;">';
                            echo '<div class="card-body text-center"><img src="../../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em"></div>';

                                    echo '<div class="right menu">';
                                            echo '<div class="item justify-content-center">';
                                                echo '<a class="nav-link text-white" href="../../"><strong>inicio</strong></a>';
                                            echo '</div>';
                                            echo '<div class="item justify-content-center">';
                                                echo '<a class="nav-link text-white" href="../../logica/logout"><strong>Sair</strong></a>';
                                            echo '</div>';
                                    echo '</div>';

                            echo '</div>';
                            echo '</div>';
                            break;
                    }
        
        }else if(!isset($_SESSION['id_user']) && !isset($_GET['refLoja']) || isset($_GET['refLoja'])){
            echo '<div class="ui attached secondary stackable small menu shadow border-0"style="background: #4AC767;">';
            echo '<div class="card-body text-center"><img src="../../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em"></div>';
            echo '<div class="right menu">';
                echo '<div class="item justify-content-center">';
                    echo '<a class="nav-link text-white" href="../../">inicio</a>';
                echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>