<?php

class AndamentoDao
{

	private $conexao;

    public function __construct()
    {
        include_once "Conn/Conn.php";

        $conn = new Conn();
        $this->conexao = $conn->returnConnection();
    }

    public function select()
    {
        $sql = "SELECT *
        FROM andamento
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
