<?php

class FuncionarioDao
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


	public function insert(FuncionarioModel $model)
	{
		$sql = "INSERT INTO funcionario(avatar,path,nome,cpf,login,senha,cargo_id,area_atuacao_id,tipouser) 
				VALUES (?,?,?,?,?,?,?,?,?)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $model->avatar);
		$stmt->bindValue(2, $model->path);
		$stmt->bindValue(3, $model->nome);
		$stmt->bindValue(4, $model->cpf);
		$stmt->bindValue(5, $model->login);
		$stmt->bindValue(6, $model->senha);
		$stmt->bindValue(7, $model->cargo_id);
		$stmt->bindValue(8, $model->area_atuacao_id);
		$stmt->bindValue(9, $model->tipouser);

		try {
			$stmt->execute();
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') {
				return false;
				exit;
			}
		}
	}

	public function update(FuncionarioModel $model)
	{
		$sql = "UPDATE funcionario SET nome=? ,cpf=? ,login=? ,senha=? ,cargo_id=? ,area_atuacao_id=? ,tipouser=? WHERE id=? ";
		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $model->nome);
		$stmt->bindValue(2, $model->cpf);
		$stmt->bindValue(3, $model->login);
		$stmt->bindValue(4, $model->senha);
		$stmt->bindValue(5, $model->cargo_id);
		$stmt->bindValue(6, $model->area_atuacao_id);
		$stmt->bindValue(7, $model->tipouser);
		$stmt->bindValue(8, $model->id);
		try {
			$stmt->execute();
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') {
				return false;
				exit;
			}
		}
	}

	public function selectSearch(string $search)
	{
		$sql = "SELECT funcionario.id AS funcId, avatar, path, funcionario.nome AS fnome, cpf, login, senha, cargo.nome AS cargo, area_atuacao.nome AS area 
        FROM funcionario, cargo, area_atuacao WHERE cargo.id = cargo_id AND area_atuacao.id = area_atuacao_id AND funcionario.nome LIKE '%$search%' ORDER BY funcionario.nome ASC;";


		$stmt = $this->conexao->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	public function select()
	{
		$sql = "SELECT funcionario.id AS funcId, avatar, path, funcionario.nome AS fnome, cpf, login, senha, cargo.nome AS cargo, area_atuacao.nome AS area 
        FROM funcionario, cargo, area_atuacao WHERE cargo.id = cargo_id AND area_atuacao.id = area_atuacao_id ORDER BY funcionario.nome ASC;";

		$stmt = $this->conexao->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	public function selectById(int $id)
	{
		include_once "Model/FuncionarioModel.php";

		$sql = "SELECT funcionario.id AS funcId, avatar, path, funcionario.nome AS fnome, cpf, login, senha, cargo.nome AS cargo, area_atuacao.nome AS area, tipouser 
        FROM funcionario, cargo, area_atuacao WHERE cargo.id = cargo_id AND area_atuacao.id = area_atuacao_id AND funcionario.id=?";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $stmt->fetchObject("FuncionarioModel");
	}

	public function delete(int $id)
	{
		$sql = "DELETE FROM funcionario WHERE id = ?";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		
		try {
			$stmt->execute();
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') {
				return false;
				exit;
			}
		}
	}
}
