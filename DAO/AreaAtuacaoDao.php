<?php
class AreaAtuacaoDao
{

    private $conexao;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost:3306;dbname=465650";
            $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $this->conexao = new PDO($dsn, '465650', '19019407eric', $opcoes);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select()
    {
        $sql = "SELECT *
        FROM area_atuacao
        ORDER BY nome
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
