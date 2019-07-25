<?php
require_once('../class/cl_Dias.php');
session_start();
if(isset($_SESSION['id_user'])){

    $dia = getdate();

    define('NOME_DIAS', [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday'
        ]);
        switch ($dia['weekday']) {
            case NOME_DIAS['1']:
                
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['1'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);

                break;
            case NOME_DIAS['2']:

                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['2'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);
                
                break;
            case NOME_DIAS['3']:
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['3'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);

                break;
            case NOME_DIAS['4']:
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['4'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);

                break;
            case NOME_DIAS['5']:
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['5'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);

                break;
            case NOME_DIAS['6']:
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['6'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);
                
                break;
            case NOME_DIAS['7']:
                $notify_compras = new Dias();
                $el = $notify_compras->search_id_clientes($_SESSION['id_user'], NOME_DIAS['7'], $dia['month']);
                
                echo json_encode($el, JSON_PRETTY_PRINT);

                break;
        }
}
?>