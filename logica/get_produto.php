<?php
    require_once('Select_DB.php');
    $select = new Select_DB();
    $el = $select->exe_query("SELECT * FROM compras");
    $produtos = [];
    foreach($el as $items){
        $produtos[] = $items;
    }
    echo json_encode($produtos, JSON_PRETTY_PRINT);
?>