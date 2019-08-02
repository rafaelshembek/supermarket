<!-- iniciar um sessão -->
<?php session_start(); ?>
<?php require_once('logica/autoload.php'); ?>
<?php require_once('interface/_header.php'); ?>
<?php
        if(!isset($_SESSION['id_user'])){
            require_once('interface/menu_top.php');
        }
    ?>
    <?php require_once('interface/barra_top.php'); ?>
    <?php
        //  require_once('interface/second_menu_top.php');
     ?>
    <?php require_once('interface/body.php'); ?>
        <!-- <section ng-view></section> -->
    <?php require_once('interface/tagsbody.php'); ?>
    <?php 
        require_once('interface/produtos_vitrini.php'); 
    ?>
    <?php 
        // lojas qualidade em vendas
        require_once('interface/product_more_bay.php');
    ?>
<?php require_once('interface/_footer.php'); ?>