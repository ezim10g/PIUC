<?php







class BDD
{
    private $conn;
    private $hostName = "localhost";
    private $username = "ezio";
    private $password = "26112008";
    private $database = "piuc";
    private $port = "3306";

    function __construct(){
        try {
            $this->conn = new PDO("mysql:host=" . $this->hostName . "; dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            echo "erro ao conectar ao banco de dados: " . $erro->getMessage();
            $this->conn = null;
            exit();
        }
    }

    function PrepareSQL($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    function CloseConn(){
        $this->conn = null;
    }
}