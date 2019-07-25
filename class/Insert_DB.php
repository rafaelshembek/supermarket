<?php
require_once('Gestor_DB.php');
class Insert_DB extends Gestor_DB{
    public function exe_insert($query, $parameters = NULL, $close_connection = TRUE){
        //executes a query to the database (INSERT, UPDATE, DELETE)

        //connection
        $connection = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());

        //execution
        $connection->beginTransaction();
        try {
            if ($parameters != NULL) {
                $gestor = $connection->prepare($query);
                $gestor->execute($parameters);
            } else {
                $gestor = $connection->prepare($query);
                $gestor->execute();
            }
            $connection->commit();
        } catch (PDOException $e) {
            echo '<p>' . $e . '</p>';
            $connection->rollBack();
        }

        //close connection
        if ($close_connection) {
            $connection = NULL;
        }
    }
}
?>