<?php
require_once('Gestor_DB.php');
class Create_table extends Gestor_DB{

    // para criar uma tabela
    /*
    create temporary table [tabela](

    )
    */
    public function create_table($close_conexao = true){
        try{
            $ligacao = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());
            $query = $ligacao->prepare(
                "CREATE temporary table if not exists teste("
                ."id_compras			int not null primary key,"
                ."id_loja				int,"
                ."id_usuario			int,"
                ."id_produto			int,"
                ."nome_produto		varchar(50) collate utf8_general_ci,"
                ."categoria			varchar(30) collate utf8_general_ci,"
                ."descricao			text collate utf8_general_ci,"
                ."preco				decimal(6,2)"
                .")default collate utf8_unicode_ci;"
            );
            $query->execute();
            
            if($close_conexao){
                $close_conexao = null;
            }
        }catch(Exception $e){
            echo '<p>'.$e->getMessage().'</p>';
        } 
    }

}
?>