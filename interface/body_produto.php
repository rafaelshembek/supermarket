    <div class="card-body" style="background: #fafafa;">
        <div class="h3 font-weight-light text-muted ml-5">Produtos Variados</div>
    </div>
<div class="row" style="background: #fafafa;">
    <div class="col-md-12 produtos_vitrini d-flex justify-content-center align-content-center flex-wrap">
        <?php
            require_once('../class/Select_DB.php');
                    $id_login = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : "";//usuario online
                    // $id_loja = isset($_GET['username']) ? $_GET['username'] : ""; //id da loja logada
                    $id_refLoja = isset($_GET['refLoja']) ? $_GET['refLoja'] : ''; //id da loja pesquisada
                    
                    $select = new Select_DB();
                    $el = $select->exe_query("SELECT * FROM produto JOIN categorias on produto.id_categoria = categorias.id_categoria WHERE produto.id_loja = $id_refLoja",null,true,true);            
                    if($el != null){
                        foreach($el as $value){
                            $id_produto =  $value['id_produto'];
                            $produto =  $value['produto'];
                            $descricao = $value['descricao'];
                            $categoria = $value['categoria'];
                            $img = $value['img_produto'];
                            $preco = $value['preco'];
                            
                        echo '<form class="ui form shadow-lg align-self-start" id="produto_loja" data-tags="'.$categoria.'" method="post" action="../carrinho/'.$_GET['refLoja'].'">';
                            echo '<div class="font-weight-bold produto m-1">'.ucfirst(utf8_decode($produto)).'</div>';
                            // echo '<div class="icon_float"><i class="fas fa-store"></i></div>';
                            echo '<div class="img_produtos">';
                            if($img){
                                echo '<img height="100" src="../../img/produtos/'.$img.'">';
                            }else{
                                echo '<h1 class="text-muted"><i class="camera icon"></i></h1>';
                            }
                            
                            echo '</div>';
                            echo '<div class="card-title nome_categoria">';
                                echo '<input type="hidden" name="categoria" id="categoria" value="'.$categoria.'">';
                            echo '</div>';
                                    echo '<input type="hidden" name="id_produto" id="id_produto" value="'.$id_produto.'">';
                                    echo '<input type="hidden" name="nome_produto" id="nome_produto" value="'.$produto.'">';
                                    echo '<input type="hidden" name="descricao" id="descricao" value="'.$descricao.'">';
                            echo '<div class="card-body">';
                                echo '<p class="text-muted font-weight-light descricao m-0">'.ucfirst(utf8_decode($descricao)).'</p>';
                            echo '</div>';
                                    echo '<div class="ui mini input m-1">';
                                        echo '<label class="ui basic label">Unit:</label>';
                                        echo '<input type="number" min="1" max="10" name="qty_produto" value="1">';
                                    echo '</div>';
                                echo '<button class="ui left labeled input button" tabindex="0" name="submit" type="submit">';
                                    echo '<div class="text-muted ui basic right pointing label">';
                                        $valor = number_format($preco, 2, '.', ',');    
                                    echo 'R$'.$valor;
                                    echo '</div>';
                                echo '<div class="ui orange button">';
                                    echo '<i class="shopping cart icon"></i>';
                                echo '</div>';
                                echo '</button>';
                                    echo '<input type="hidden" name="preco" id="preco" value="'.$preco.'">';
                        echo '</form>';
                        }
                    }else{
            echo    '<div class="row">';
                echo    '<div class="col-md-12">';
                echo    '<div class="card-body"></div>';
                    echo    '<div class="row d-flex justify-content-center align-content-center flex-wrap">';
                            echo    '<div class="col-md-6 shadow-lg" style="border-radius: 10px;">';
                                echo    '<div class="card-body m-0 text-center">';
                                    echo    '<img src="../../img/logo_oficial/cart-vazio.png" width="100em" alt="">';
                                echo    '</div>';
                                echo    '<div class="card-body">';
                                    echo    '<div class="h2 font-weight-bold text-muted text-center"><strong>Essa loja não cadastrou nenhum produto no momento</strong></div>';
                                echo    '</div>';
                                echo    '<div class="card-body">';
                                    echo    '<div class="title text-muted">&copy 2019 all rights reserved Todo os direitos reservados</div>';
                                    echo    '<div class="text-muted">Plataforma de Comercio Online</div>';
                                echo    '</div>';
                            echo    '</div>';
                    echo    '</div>';
                echo    '<div class="card-body"></div>';        
                echo    '</div>';
            echo    '</div>';
                    }
        ?>
    </div>
</div>