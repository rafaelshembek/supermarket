<?php
require_once('Gestor_DB.php');


class Insert_mult extends gestor_DB{
    
    public function insert_multi_query($data, $close_connection = TRUE){
        //executes a multi query to the database (INSERT)

        $connection = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());
        $sql = 'INSERT INTO table (idPedido, id_produto, id_usuario, id_loja, dataPedido) VALUES ';
        $insertQuery = array();
        $insertData = array();
        foreach ($data as $row) {
            $insertQuery[] = '(?, ?, ?, ? , ?)';
            $insertData[] = $row;
        }

        if (!empty($insertQuery)) {
            $sql .= implode(', ', $insertQuery);
            $motor = $connection->prepare($sql);
            $motor->execute($insertData);
        }
        //close connection
        if ($close_connection) {            
            $connection = NULL;
        }
    }
}
?>