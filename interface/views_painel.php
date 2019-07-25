<?php
// obter os arquivos
require_once('../funcoes/fu_loja.php');
require_once('../class/cl_painel.php');

class Views_Painel{
    // mostrar os conteudo no painel
    public function views(){
        $loja = $_GET['loja'];
        $painel = new cl_Painel();
        $produtos = $painel->Categoria($loja);
        
        foreach($produtos as $values){
            echo '<h1>Categoria: '.$values['categoria'].'</h1>';
            echo '<h2>Preço: '.$values['preco'].'</h2>';
            echo '<p>'.$values['valor_total'].'</p>';
            echo '<hr>';
        }
    }
}

Views_Painel::views();
?>