<?php
class LoginDao
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

    public function validarUser($login, $senha, $tipouser)
    {
        include_once "Model/LoginModel.php";

        $sql = "SELECT id, login, senha, tipouser 
        FROM funcionario 
        WHERE login = ? 
        AND senha=? 
        AND tipouser=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $login);
        $stmt->bindValue(2, $senha);
        $stmt->bindValue(3, $tipouser);
        $stmt->execute();

        return $stmt->fetchObject("LoginModel");
    }

	public function selectByLogin(string $login)
    {
        include_once "Model/LoginModel.php";

        $sql = "SELECT funcionario.id AS funcId, avatar, path, funcionario.nome AS fnome, cpf, login, senha, cargo.nome AS cargo, area_atuacao.nome AS area 
        FROM funcionario, cargo, area_atuacao WHERE cargo.id = cargo_id AND area_atuacao.id = area_atuacao_id AND login=?;
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $login);
        $stmt->execute();

		return $stmt->fetchObject("LoginModel");

    }
}
