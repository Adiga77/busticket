<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "busticket";

    protected function connect(){
       try {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
        echo $e->getMessage();
        die;
       }

        return $pdo;
    }

}

?>