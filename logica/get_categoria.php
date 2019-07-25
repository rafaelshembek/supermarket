<?php
    require_once('../class/Select_DB.php');
    
    $tegs = new Select_DB();
    $el = $tegs->exe_query("SELECT categoria, count(categoria) as total from produtos where produtos.id_loja = $id_loja group by categoria");

    if(count($el) < 0){
        echo '<p>ERRO: não foi localizado nenhuma categoria na base de dado</p>';
    }else{
        foreach ($el as $value) {
          echo '<a class="ui basic button" href="#!">'.$value['categoria']=utf8_encode($value['categoria']).'</a>';  
        }
    }
?>