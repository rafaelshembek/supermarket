<?php
    session_start();
    require_once('../class/Cl_config.php');
    require_once('../class/cl_painel.php');
    require_once('../class/Select_DB.php');
    require_once('../logica/infor_dados.php');
    require_once('../class/IMG_avatar.php');
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="PaginaConfiguracoes">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../css/configuracoes.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/angular-material/angular-material.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{title_pagina}}</title>
</head>
<body id="backgorundConfiguracoes">
    <?php 
        if(isset($_SESSION['id_user'])){
            // id da session
            $id_empresa = $_SESSION['id_user'];
            $select_informacoes = new Configuracoes();
            $select_informacoes->infor_usuario($id_empresa);
            
            // Class com os dados de moradia do usuario online
            $select_dados = new \Dados_Moradias\Dados();
            $select_dados->infor_dados($id_empresa);
            // obter o avatar do usuario online
            $img_avatar = new IMG_avatar();
            $img_avatar->get_avatar($id_empresa);
        }
    ?>
    <div class="ui attached stackable secondary menu shadow border-0" style="background: #4AC767;">
        <div class="card-body">        <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt=""></div>
    </div>
<section class="ui container m-4 bg-white shadow">
    <!-- MENU -->
    <div class="ui attached secondary stackable small menu border-0 bg-white">
        <div class="card-body">
            <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="logo super.market" srcset="">
        </div>
        <div class="item justify-content-center">
            <a class="nav-link" style="color:#aeaeae;" href="../"><i class="fas fa-home"></i> <strong>Home Page</strong></a>
        </div>
        <div class="item justify-content-center">
            <a class="nav-link" style="color:#aeaeae;" href="./painel.php"><i class="fas fa-chart-area"></i> <strong>Vendas</strong></a>
        </div>
        <div class="item justify-content-center">
            <a class="nav-link" style="color:#aeaeae;" href="./loja/<?php echo $id_empresa; ?>"><i class="fas fa-store"></i> <strong>Minha Loja</strong></a>
        </div>
        <div class="item justify-content-center">
            <a class="ui green button" href="./cadastrar_produtos.php" data-inverted="" data-tooltip="Adicionar produtos em sua loja"><i class="fas fa-plus"></i> <strong>cadastrar produtos</strong> <i class="fas fa-cart-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="item justify-content-center">
                <a class="nav-link" style="color:#aeaeae;" href="../logica/logout.php"><strong>Sair</strong></a>
            </div>
        </div>
    </div>
    </div>
    <!-- SIDE -->
    <aside class="row">
        <div class="col-md-3">
            <!-- card avatar nome_user email_user -->
            <div class="card-body box-center align-self-center">
                <?php
                    if($img_avatar->getImg()){
                        echo '<img id="avatarConfiguracoes" src="../assets/avatar_perfil/'.$img_avatar->getImg().'" alt="avatar perfil" class="ui circular image" width="120" height="120">';
                    }else{
                        echo '<img id="avatarConfiguracoes" src="../assets/avatar_perfil/empresa_avatar_padrao.jpg" alt="avatar perfil" class="rounded-circle border" width="120" height="120">';
                    }
                ?>
            </div>
            <div class="m-2 d-flex justify-content-center flex-wrap text-center text-white">
            <a id="btn_editar" class="text-muted" href="#"><i class="icon edit outline"></i></a>
            <p class="text-muted p-1 font-weight-light"><i class="user circle icon"></i> <?php echo $select_informacoes->getUsuario(); ?></p>
            </div>
            <div class="m-2 text-center">
                <small class="text-muted">Email: <?php echo $select_informacoes->getEmail(); ?></small>
            </div>
            <div class="card-body d-flex justify-content-center flex-wrap">
                <!-- form altera o nome da loja -->
                <form id="input_alter_username" style="display:none;" action="../logica/alter_username.php" class="ui mini form" method="post">
                    <div class="ui dividing header text-white font-weight-light">Nome de sua loja</div>
                    <span class="btnCloseInput"></span>
                    <input type="hidden" id="id_user_online" name="id_user_online" value="<?php echo $id_empresa; ?>">
                    <div class="ui action input">
                        <input type="text" id="alter_username" name="new_username" placeholder=" <?php echo $select_informacoes->getNome_fantasia(); ?>">
                        <button id="btn_alter_username" class="ui icon green button"><i class="icon check"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body d-flex justify-content-center align-content-center">
                <!-- card btn trocar avatar e trocar dados de acesso -->
                <!-- btn da janela modal trocar avatar -->
                <a class="ui mini button" href="#!" data-toggle="modal" data-target="#janela_modal_trocar_avatar"><i class="fas fa-image"></i> Trocar Avatar</a>
                <!-- JANELA MODAL -->
                <div class="modal fade" id="janela_modal_trocar_avatar" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- cabeçalho do modal -->
                                <h5 class="modal-title"><i class="fas fa-image"></i> Sua nova foto de Perfil!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- body do modal -->
                                <div class="card-body">
                                    <form id="formAvatar" class="ui form" action="../logica/add_avatar.php" method="post" enctype="multipart/form-data">
                                        <!-- conteudo do form -->
                                        <div class="fields">
                                            <input type="hidden" name="id_avatar" id="id_avatar" value="<?php echo $img_avatar->getId_img(); ?>">
                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                            <input type="hidden" name="id_loja" value="<?php echo $_SESSION['id_user']; ?>">
                                        </div>
                                        <div class="field">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                            <input id="file" type="file" onchange="previwesAvatar()" name="imagem_avatar">
                                                <pre>foto com tamanho maximo (2mb)</pre>
                                        </div>
                                        <div class="blue ui buttons">
                                                <button type="submit" class="ui button">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- btn da janela modal alter login -->
                <a class="ui mini button" href="#!" data-toggle="modal" data-target="#janela_modal_trocar_login"><i class="fas fa-file-signature"></i> Altera login</a>
                <!-- JANELA MODAL -->
                <div class="modal fade" id="janela_modal_trocar_login" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- cabeçalho do modal -->
                                <h5 class="modal-title">Novos dados de login !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- body do modal -->
                                <div class="card-body">
                                    <form class="ui form" action="../logica/alter_login.php" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $id_empresa; ?>">
                                        <input type="hidden" name="id_loja" value="<?php echo $_SESSION['id_user']?>">
                                        <div class="field">
                                            <div class="ui icon input">
                                                <input class="input_trocar_login" type="email" name="email" id="email" placeholder="Email">
                                                <i class="at icon"></i>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui icon input">
                                                <input class="input_trocar_login" type="text" name="username" id="username" placeholder="Username">
                                                <i class="user outline icon"></i>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui icon input">
                                                <input class="input_trocar_login" type="password" name="senha" id="senha" placeholder="Senha">
                                                <i class="asterisk icon"></i>
                                            </div>
                                        </div>
                                        <div class="blue ui buttons">
                                                <button type="submit" class="ui button">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ativar conta -->
            <div class="text-center" ng-controller="AtivarContarCtrl">
                <div class="card-body" id="btn_ativar_conta">{{alert}}
                        <div class="card-title text-muted">{{aviso}}</div>
                        <button class="ui {{colore}} button" ng-click="ativar_conta()">{{act_conta}}</button>
                        <div class="newBtn"></div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-flex justify-content-center align-content-center flex-wrap">
            <!-- corpo central da pagina configurações -->
                <div class="row">
                    <div class="col-md-4">
                        <!-- Title Dados Pessoais -->
                        <!-- Campo informações dos dados -->
                        <div class="card-body">
                            <h4 class="font-weight-light"><i class="fas fa-address-card"></i> Dados Pessoais</h4> 
                            <div class="item">
                                <p class="font-weight-light">Rua: <?php echo $select_dados->getRua(); ?></p>
                            </div>
                            <div class="item">
                                <p class="font-weight-light">Numero: <?php echo $select_dados->getNumero(); ?></p>
                            </div>
                            <div class="item">
                                <p class="font-weight-light">Bairro: <?php echo $select_dados->getBairro(); ?></p>
                            </div>
                            <div class="item">
                                <p class="font-weight-light">Estado: <?php echo $select_dados->getEstado(); ?></p>
                            </div>
                            <div class="item">
                                <p class="font-weight-light">Cidade: <?php echo $select_dados->getCidade(); ?></p>
                            </div>
                            <div class="item">
                                <p class="font-weight-light">Referencia: <?php echo $select_dados->getReferencia(); ?></p>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card-body">
                            <form class="ui form" id="formAddDadosPessoais" action="../logica/trocar_dados.php" method="post">
                                <div class="field">
                                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_empresa; ?>">
                                    <input type="hidden" name="id_loja" id="id_loja" value="<?php echo $_SESSION['id_user']?>">
                                    <input type="hidden" name="id_dados" id="id_dados" value="<?php echo $select_dados->getId(); ?>">
                                </div>
                                
                                <div class="two fields">
                                    <div class="field">
                                        <label for="rua">
                                            Nome da Rua
                                        </label>
                                        <input type="text" name="rua" id="rua" class="form-control-sm" placeholder="Sua rua">
                                        
                                    </div>
                                    <div class="field">
                                        <label for="numero">
                                            Numº Casa / Apartamento
                                        </label>
                                        <input type="number" min="0" max="1000" name="numero" id="numero" class="form-control-sm" placeholder="Nº">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="bairro">
                                        Seu Bairro
                                    </label>
                                    <input type="text" name="bairro" id="bairro" class="form-control-sm" placeholder="Seu bairro">
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label for="cidade">
                                            Cidade
                                        </label>
                                        <input type="text" name="cidade" id="cidade" class="form-control-sm" placeholder="Cidade">
                                    </div>
                                    <div class="field">
                                        <label for="estado">
                                            Estado
                                        </label>
                                        <input type="text" name="estado" id="estado" class="form-control-sm" placeholder="Estado ex: Goiais">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="referencia">
                                        Referencia da Localidade
                                    </label>
                                    <input type="text" name="referencia" id="referencia" class="form-control-sm" placeholder="Referencia de sua localidade">
                                </div>
                                <!-- btn salvar e atualizar -->
                                <div class="blue ui buttons shadow-lg">
                                        <button type="submit" class="ui button"><i class="fas fa-check"></i> salvar & atualizar</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </aside>
</section>
 

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/angular/angular.min.js"></script>

    <script src="../node_modules/angular-material/angular-material.min.js"></script>
    <script src="../js/js/configuracoes.js"></script>
    <script src="../js/js/logica_alter_username.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script src="../js/jQuery/logica_ativar_conta.js"></script>
</body>
</html>