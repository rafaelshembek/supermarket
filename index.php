<!-- iniciar um sessão -->
<?php session_start(); ?>
<?php require_once('logica/autoload.php'); ?>
<?php require_once('interface/_header.php'); ?>
<div class="pusher">
                <!-- <section ng-view></section> -->
        <div id="analise_netWork">
                <?php require_once('interface/menu_top.php'); ?>
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