
<?php

class DemandaDao
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

	public function insert(DemandaModel $model)
	{
		$sql = "INSERT INTO demanda(descricao,data_inicio,data_termino,observacao,prioridade_id,tipo_demanda_id,andamento_id,
				funcionario_id) 
				VALUES (?,?,?,?,?,?,?,?)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $model->descricao);
		$stmt->bindValue(2, $model->data_inicio);
		$stmt->bindValue(3, $model->data_termino);
		$stmt->bindValue(4, $model->observacao);
		$stmt->bindValue(5, $model->prioridade_id);
		$stmt->bindValue(6, $model->tipo_demanda_id);
		$stmt->bindValue(7, $model->andamento_id);
		$stmt->bindValue(8, $model->funcionario_id);

		try {
			$stmt->execute();
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') {
				return false;
				exit;
			}
		}
	}

	public function update(DemandaModel $model)
	{
		$sql = "UPDATE demanda SET andamento_id=? WHERE id=? ";
		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $model->andamento_id);
		$stmt->bindValue(2, $model->id);
		try {
			$stmt->execute();
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') {
				return false;
				exit;
			}
		}
	}

	public function selectById(int $id)
	{
		$sql = "SELECT demanda.id, descricao, data_inicio, data_termino, observacao, prioridade.nome as prioridade, tipo_demanda.nome as tipoDemanda, andamento.porcentagem, funcionario.id as func 
		FROM demanda, andamento, tipo_demanda, prioridade, funcionario 
		WHERE andamento.id = andamento_id 
		and prioridade.id = prioridade_id 
		and tipo_demanda_id = tipo_demanda.id 
		and funcionario_id = funcionario.id 
		and funcionario_id=?
		ORDER BY demanda.id
		DESC
        ";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	public function selectAll()
	{
		$sql = "SELECT demanda.id, descricao, data_inicio, data_termino, observacao, prioridade.nome as prioridade, tipo_demanda.nome as tipoDemanda, andamento.porcentagem, funcionario.id as func 
		FROM demanda, andamento, tipo_demanda, prioridade, funcionario 
		WHERE andamento.id = andamento_id 
		and prioridade.id = prioridade_id 
		and tipo_demanda_id = tipo_demanda.id 
		and funcionario_id = funcionario.id
		
        ";

		$stmt = $this->conexao->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}
}
