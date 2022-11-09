<?php
class LoginDao
{
    private $conexao;

    public function __construct()
    {
        include_once "Conn/Conn.php";

        $conn = new Conn();
        $this->conexao = $conn->returnConnection();
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
