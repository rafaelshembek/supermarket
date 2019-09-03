<!-- iniciar um sessão -->
<?php 
// session_cache_expire(10);
 ?>
<?php session_start(); ?>
<?php require_once('class/Select_DB.php'); ?>
<?php require_once('logica/autoload.php'); ?>
<?php require_once('interface/_header.php'); ?>
<?php require_once('class/cl_dados_usuario.php'); ?>
<div class="pusher">

        <div id="analise_netWork">
                <?php
                        $select_type_conta = new Select_DB();
                        $id = $_SESSION['id_user'] ?? null;
                        $arr = array(
                                ':id' => $id
                        );
                        $el = $select_type_conta->exe_query("SELECT * from cadastro Where idcadastro = :id", $arr);
                        foreach($el as $items){
                                $tipo_conta = $items['tipo_conta'];
                                $id_loja = $items['idcadastro'];
                        }
                        $type = $tipo_conta ?? null;
                        $lojaId = $id_loja ?? null;
                        require_once('class/cl_Menu.php');
                        $menu = new \MenuIndex\Menu();
                        $menu->setId($lojaId);
                        $menu->setType($type);
                 ?>
                 <div id="menumain" class="ui attached stackable secondary bg-white menu border-0">
                <?php $menu->displayMenu(); ?>
                 </div>
                <?php require_once('interface/body.php'); ?>
                <?php require_once('interface/barra_information.php'); ?>
                <?php require_once('interface/tagsbody.php'); ?>
                <?php  require_once('interface/produtos_vitrini.php'); ?>
                <?php require_once('interface/product_more_bay.php'); ?>
                <?php require_once('interface/_footer.php'); ?>
        </div>
        <div id="showErrorNetWork">
                <div class="ui container-fluid d-flex justify-content-center align-content-center flex-wrap flex-column">
                        <div class="ui card shadow-lg m-5">
                                <div class="content">
                                        <div class="ui center aligned header text-muted">Você esta sem internet</div>
                                        <div class="ui center aligned description">Verificar os cabos de rede, modem e roteador</div>
                                </div>
                                <div class="extra content">
                                        Mercado.bay
                                </div>
                        </div>
                </div>
        </div>
</div>