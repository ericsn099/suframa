 <?php

	class FuncionarioModel
	{

		//CAMPOS DA TABELA FUNCIONARIO
		public $id, $avatar,
			$path, $nome, $cpf,
			$login, $senha, $cargo_id, $area_atuacao_id, $tipouser;

		public function save()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			if ($dao->insert($this) === false) {
				return false;
			} else {
				return true;
			}
		}

		public function update()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			if ($dao->update($this) === false) {
				return false;
			} else {
				return true;
			}
		}

		public function getAllRowsSearch(string $search)
		{
			include 'DAO/FuncionarioDao.php';
			$dao = new FuncionarioDao();
			$obj = $this->rows = $dao->selectSearch($search);
			if ($obj) {
				return $obj;
			} else {
				return false;
			}
		}

		public function getAllRows()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			$this->rows = $dao->select();
		}

		public function getById(int $id)
		{
			include 'DAO/FuncionarioDao.php';
			$dao = new FuncionarioDao();

			$obj = $dao->selectById($id);
			if ($obj) {
				return $obj;
			} else {
				return new FuncionarioModel();
			}
		}

		public function delete(int $id)
		{
			include 'DAO/FuncionarioDao.php';
			$dao = new FuncionarioDao();

			if ($dao->delete($id) === false) {
				return false;
			} else {
				return true;
			}
		}
	}
