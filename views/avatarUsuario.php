<?php
session_start();
require_once('../class/IMG_avatar.php');
require_once('../class/Cl_config.php');

    if(isset($_SESSION['id_user'])){
        $id_empresa = $_SESSION['id_user'];
        // obter o avatar do usuario online
        $img_avatar = new IMG_avatar();
        $img_avatar->get_avatar($id_empresa);
    }
?>
<div class="card-body">
    <div class="row card-body">
        <div class="col-md-12">
            <h3 class="text-center" style="color: #999; "><i class="icon image"></i> Alteração do seu Avatar</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body border">
                <div class="ui dividing small header"><i class="info icon"></i> Informações do envior</div>
                <li class="alert alert-info">Fotografia com o tamanho maximo <strong>(2mb)</strong></li>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body border">
                <!-- formulario para trocar o avatar -->
                <form class="ui attarched form" action="../logica/add_avatar.php" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <input type="hidden" name="id_avatar" id="id_avatar" value="<?php echo $img_avatar->getId_img(); ?>">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <input type="hidden" name="id_loja" value="<?php echo $_SESSION['id_user']; ?>">
                    </div>
                    <div class="field">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                        <input id="file" type="file" name="imagem_avatar">
                    </div>
                    <div class="field">
                            <button type="submit" class="ui red button"><i class="upload icon"></i> Salvar Alterações</button>
                            
                    </div>
                </form>
                <!-- ------------------------------ -->
            </div>
        </div>
    </div>
</div>