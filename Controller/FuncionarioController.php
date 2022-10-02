<?php

class FuncionarioController
{

	public static function index()
	{
		include 'Model/LoginModel.php';
		include 'Model/TipoDemandaModel.php';
		include 'Model/PrioridadeModel.php';
		include 'Model/AndamentoModel.php';
		include 'Model/DemandaModel.php';

		$modelTipoDemanda = new TipoDemandaModel();
		$modelTipoDemanda->getAllRows();

		$modelPrioridade = new PrioridadeModel();
		$modelPrioridade->getAllRows();

		$modelAndamento = new AndamentoModel();
		$modelAndamento->getAllRows();


		$modelLogin = new LoginModel();
		if (isset($_SESSION['login'])) {
			$modelLogin = $modelLogin->getByLogin($_SESSION['login']);
		}
		$modelDemanda = new DemandaModel();
		if (isset($_SESSION['login'])) {
			$modelDemanda = $modelDemanda->getById($modelLogin->funcId);
		}
		include 'View/modules/Funcionario/PaginaInicial.php';
	}

	public static function update()
	{
		include 'Model/FuncionarioModel.php';

		$model = new FuncionarioModel();
		$model->id = $_POST['id'];
		$model->nome = $_POST['nome'];
		$model->cpf = $_POST['cpf'];
		$model->login = $_POST['login'];
		$model->senha = $_POST['senha'];
		$model->cargo_id = $_POST['cargo_id'];
		$model->area_atuacao_id = $_POST['area_atuacao_id'];
		$model->tipouser = $_POST['usuario'];

		$obj = $model->update();
        if ($obj === true) {
            header('location: /adm?message=success-create');
        } else if ($obj === false) {
            header('location: /adm?message=error-create');
        }
	}

	public static function delete()
    {
        include 'Model/FuncionarioModel.php';
        $modelFuncionario = new FuncionarioModel();

        $obj = $modelFuncionario->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /adm?message=success-delete');
        } else if ($obj === false) {
            header('location: /adm?message=error-delete');
        }
    }

	public static function save()
	{
		include 'Model/FuncionarioModel.php';

		$model = new FuncionarioModel();

		$arquivo = $_FILES['avatar'];
		if ($arquivo["error"])
			die("falha ao enviar arquivo");

		$pasta = "upload/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


		$model->nome = $_POST['nome'];
		$model->cpf = $_POST['cpf'];
		$model->login = $_POST['login'];
		$model->senha = $_POST['senha'];
		$model->cargo_id = $_POST['cargo_id'];
		$model->area_atuacao_id = $_POST['area_atuacao_id'];
		$model->tipouser = $_POST['usuario'];

		$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

		$model->avatar = $nomeDoArquivo;
		$model->path = $path;

		if ($extensao !== "jpg" && $extensao !== "png" && $extensao !== "jpeg" && $extensao !== 'gif')
			die("Tipo de arquivo não aceito");

		move_uploaded_file($arquivo["tmp_name"], $path);

		$obj = $model->save();
        if ($obj === true) {
            header('location: /adm?message=success-create');
        } else if ($obj === false) {
            header('location: /adm?message=error-create');
        }
	}
}
