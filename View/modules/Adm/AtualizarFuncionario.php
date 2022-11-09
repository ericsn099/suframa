<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="../css/styleIndex.css" /> -->
	<link rel="stylesheet" href="../../../css/atualizar-fun.css" />

	<title>Atualizar Funcionario</title>
</head>

<body>
	<div class="container">
		<div class="container-area">
			<form action="/adm/update" method="POST">
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-file-signature"></i>
					</div>
					<input type='hidden' name='id' value="<?= $modelFuncionario->funcId ?>" required />
					<input type='text' name='nome' placeholder='Digite seu nome' value="<?= $modelFuncionario->fnome ?>" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-id-card"></i>
					</div>
					<input type="number" name="cpf" placeholder="Digite seu cpf" value="<?= $modelFuncionario->cpf ?>" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-sharp fa-solid fa-user"></i>
					</div>
					<input type="text" name="login" placeholder="Digite seu login" value="<?= $modelFuncionario->login ?>" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-lock"></i>
					</div>
					<input type="password" name="senha" placeholder="Digite sua senha" value="<?= $modelFuncionario->senha ?>" required />
				</div>
				<div class="info-select">
					<label for="">Área de atuação atual: <?= $modelFuncionario->area ?></label><br>
					<label for="">Cargo atual: <?= $modelFuncionario->cargo ?></label><br>
					<?php
					if ($modelFuncionario->tipouser == 1) {
						$usuario = "Administrador";
					} else {
						$usuario = "Usuário";
					}
					?>
					<label for="">Tipo de usuário atual: <?= $usuario ?></label><br>
				</div>

				<div class="input-item">
					<select name="area_atuacao_id" id="area_atuacao_id" class="select" required>
						<option value="">Área de Atuação </option>
						<?php foreach ($modelAreaAtuacao->rows as $item) : ?>
							<option value="<?= $item->id ?>"> <?= $item->nome ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-item">
					<select name="cargo_id" id="cargo_id" class="select" required>
						<option value="">Cargo</option>
						<?php foreach ($modelCargo->rows as $item) : ?>
							<option value="<?= $item->id ?>"> <?= $item->nome ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-item">
					<select name="usuario" id="usuario" class="select" required>
						<option value="">Tipo de usuário </option>
						<option value="2">Usuário</option>
						<option value="1">Administrador </option>
					</select>
				</div>

				<div class=" entrar">
					<input type="submit" value="salvar" />
				</div>
				<a href="/adm">VOLTAR</a>
			</form>
		</div>
	</div>
</body>

</html>
<?php
if (isset($_GET['message'])) {
    include 'View/feedbackAdm/salvar.php';
}
?>