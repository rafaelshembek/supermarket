<?php
session_start();
require_once('../class/IMG_avatar.php');
require_once('../class/Cl_config.php');

    if(isset($_SESSION['id_user'])){
        $id_empresa = $_SESSION['id_user'];
        
        $select_informacoes = new Configuracoes();
        $select_informacoes->infor_usuario($id_empresa);
        // obter o avatar do usuario online
        $img_avatar = new IMG_avatar();
        $img_avatar->get_avatar($id_empresa);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="painelUsuario">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboardusuario.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel</title>
</head>
<body style="background: #4AC767;">
<!-- menu top -->
<div class="ui stackable attached menu border-0 shadow" style="background: #4AC767;">
    <div class="card-body"></div>
</div>
<section class="ui container m-4 bg-white shadow-lg" id="bodydashboardUsuario">
    <div class="ui attached secondary stackable menu border-0">
        <div class="card-body text-center">
            <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="logo marca super.market">
        </div>
        <div class="item text-center">
            <a class="active item " style="color:#aeaeae;" href="#!/"><strong>Painel Inicio</strong></a>
        </div>
        <div class="item text-center">
            <a class="item" style="color:#aeaeae;" href="#!/dadosPessoais"><strong>Dados Pessoais</strong></a>
        </div>
        <div class="item text-center">
            <a class="item" style="color:#aeaeae;" href="#!/contaUsuario"><strong>Conta Usuario</strong></a>
        </div>
        <div class="item text-center">
            <a class="item" style="color:#aeaeae;" href="#!/minhascompras"><strong>Suas Compras</strong></a>
        </div>
        <div class="right menu">
            <div class="item text-center">
                <a class="nav-link" style="color:#aeaeae;" href="../"><i class="home icon"></i> Home Page</a>
            </div>
            <div class="item text-center">
                <a class="nav-link" style="color:#aeaeae;" href="../logica/logout.php"><i class="sign-out icon"></i> Sair</a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- column left -->
        <div class="col-md-3 d-flex justify-content-center align-content-center flex-column flex-wrap">
            <?php
                if($img_avatar->getImg()){
                    echo '<img id="previewsImage" class="ui circular image border centered" src="../assets/avatar_perfil/'.$img_avatar->getImg().'" width="100em" alt="avatar perfil">';
                }else{
                    echo '<img id="previewsImage" class="ui circular image border centered"  width="100em" src="../assets/avatar_perfil/padrao.jpg" alt="avatar perfil">';
                }
            ?>
        <div class="card-body">    
                        <div class="font-weight-bold text-muted text-center font-weight-light"><?php echo $select_informacoes->getUsuario();?></div>
                        <h2 class="text-muted font-weight-light small m-1 text-center"><?php echo $select_informacoes->getEmail();?></h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- formulario para trocar o avatar -->
                                    <form  id="avatarFormAvatar" class="ui attarched form" action="../logica/painel_usuario_avatar.php" method="POST" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="hidden" name="id_avatar" id="id_avatar" value="<?php echo $img_avatar->getId_img(); ?>">
                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                            <!-- <input type="hidden" name="id_loja" value="<?php echo $_SESSION['id_user']; ?>"> -->
                                        </div>
                                        <div class="field">
                                            <label for="file" class="ui  basic button text-white font-weight-light">
                                                Update Avatar
                                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                                <input id="file" type="file" name="imagem_avatar" onchange="previewsImage()" style="display: none;">
                                            </label>
                                        </div>
                                        <div class="field">
                                            <button type="submit" class="ui blue shadow button font-weight-light">Salvar Alterações</button>
                                        </div>
                                    </form>
                                    <!-- ------------------------------ -->
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- column right -->
        <div class="col-md-9">
            <section ng-view></section>
        </div>
    </div>
    <footer class="ui container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                    <p class="font-weight-light" style="color:#aeaeae;">© 2019 all rights reserved Todo os direitos reservados</p>
                    </div>
                </div>
            </div>
    </footer>
</section>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../node_modules/angular-route/angular-route.min.js"></script>
    <script src="../js/js/painel_usuario.js"></script>
    <script src="../js/js/avatarpainelusuario.js"></script>
</body>
</html>