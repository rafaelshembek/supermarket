<?php
    session_start();
    require_once('../logica/infor_dados.php');
    require_once('../class/IMG_avatar.php');
    require_once('../class/Cl_config.php');

    if(isset($_SESSION['id_user'])){
        $id_empresa = $_SESSION['id_user'];
        // Class com os dados de moradia do usuario online
        $select_dados = new \Dados_Moradias\Dados();
        $select_dados->infor_dados($id_empresa);

        $select_informacoes = new Configuracoes();
        $select_informacoes->infor_usuario($id_empresa);
        // obter o avatar do usuario online
        $img_avatar = new IMG_avatar();
        $img_avatar->get_avatar($id_empresa);
    }
?>
<div class="row d-flex justify-content-center align-content-center flex-wrap">
    <div class="col-md-4">
        <div class="card-body">
            <div class="ui header">
                <div class="h3 text-muted font-weight-light">
                    <i class="map marker alternate icon"></i> Seu endereço:
                </div>
            </div>
            <div class="ui relaxed divided list">
                <div class="item">
                    <div class="content">
                        <li class="header">Rua:</li>
                        <div class="description"> <?php echo $select_dados->getRua(); ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <li class="header">Numero:</li>
                        <div class="description"> <?php echo $select_dados->getNumero(); ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <li class="header">Bairro:</li>
                        <div class="description"> <?php echo $select_dados->getBairro(); ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <li class="header">Referencia:</li>
                        <div class="description"> <?php echo $select_dados->getReferencia(); ?></div>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <li class="header">Cidade:</li>
                        <div class="description"> <?php echo $select_dados->getCidade(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 d-flex justify-content-center align-content-center flex-wrap">  
        <div class="card-body text-muted mb-3 text-center" style="border-radius: 5px; background: #fff;">
            <img src="../img/logo_oficial/figura.png" alt="" srcset="">
            <div class="h1 font-weight-light text-center">Opis!</div>
            <div class="font-weight-light text-center">No momento estamos em versão beta</div>
        </div>
    </div>
</div>