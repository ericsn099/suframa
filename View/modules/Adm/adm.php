<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndex.css" />
    <link rel="stylesheet" href="../css/modal.css" />

    <title>Principal</title>
</head>

<body>
    <div class="container">

        <div class="container-area">
            <div class="capa">

            </div>
            <div class="user">
                <div class="user-avatar">
                    <img src="<?= $modelLogin->path ?>" />
                </div>
            </div>

            <div class="modal-big-foto">
                <div class="modal-big-foto-area">
                    <div class="close-big-foto-modal">
                        <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <div class="big-foto">
                        <img src="<?= $modelLogin->path ?>" alt="" />
                    </div>
                </div>
            </div>


            <!-- INFORMAÇÕES DO USUÁRIO -->
            <div class="user-info">
                <span><?= $modelLogin->fnome ?></span>
                <span><?= $modelLogin->cargo ?> </span>
            </div>


            <div class="arrow">
                Funcionarios
            </div>
            <form action="?nome=" method="GET">
                <div class="search-func">
                    <input type="text" name="nome" placeholder="Pesquise um usuário." id="nome" />
                    <input type="submit" value="Procurar">
                </div>
            </form>


            <!--  -->
            <div class="adm">
                <div class="adm-area">
                    <?php foreach ($modelFuncionario->rows as $item) : ?>

                        <div class="area-user">
                            <div class="acoes-user">
                                <!--Editar USUÁRIO -->
                                <label><a href="/atualizarFuncionario?id=<?= $item->funcId ?>">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                    </a>
                                </label>
                                <!--EXCLUIR USUÁRIO -->
                                <label>
                                    <a href="/adm/delete?id=<?= $item->funcId ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </label>
                            </div>

                            <div class="area-user-img">
                                <img src="<?= $item->path ?>" alt="img-user" />
                            </div>
                            <div class="area-user-info">
                                <label><?= $item->fnome ?></label>
                                <label><?= $item->cargo ?></label>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>

            <div class="modal-add-user">
                <div class="close-modal-user">
                    <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                </div>
                <div class="container-area-cad">
                    <form method="POST" action="/adm/save" enctype="multipart/form-data">

                        <div class="lado-a">
                            <div class="input-item upload">

                                <div class="img-perfil">
                                    <img src="../image/cam.png">
                                </div>
                                <input type="file" name="avatar" id="avatar" required />
                            </div>
                            <h2>Imagem de Perfil</h2>
                        </div>
                        <div class="lado-b">
                            <div class="input-item">
                                <div class="icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>
                                <input type="text" name="nome" placeholder="Digite seu nome" required id="nome_user" />
                            </div>
                            <div class="input-item">
                                <div class="icon">
                                    <i class="fa-solid fa-id-card"></i>
                                </div>
                                <input type="number" id="cpf" name="cpf" placeholder="Digite seu cpf" required />
                            </div>
                            <div class="input-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-user"></i>
                                </div>
                                <input type="text" name="login" id="login" placeholder="Digite seu login" required />
                            </div>
                            <div class="input-item">
                                <div class="icon">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required />
                            </div>

                            <div class="input-item">
                                <select name="area_atuacao_id" id="area_atuacao_id" class="select">
                                    <option value="2">ÁREA DE ATUAÇÃO</option>
                                    <?php foreach ($modelAreaAtuacao->rows as $item) : ?>
                                        <option value="<?= $item->id ?>"> <?= $item->nome ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>
                            <div class="input-item">
                                <select name="cargo_id" id="cargo_id" class="select">
                                    <option value="">Cargo</option>
                                    <?php foreach ($modelCargo->rows as $item) : ?>
                                        <option value="<?= $item->id ?>"> <?= $item->nome ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-item">
                                <select name="usuario" id="usuario" class="select">
                                    <option value="">Tipo de usuário </option>
                                    <option value="2">Usuário</option>
                                    <option value="1">Administrador </option>
                                </select>
                            </div>

                            <div class=" entrar">
                                <input type="submit" value="salvar" />
                            </div>

                        </div>

                    </form>
                </div>
            </div>


            <div class="button-close">
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>


            <div class="menu-lateral">

                <div class="menu">
                    <div data-key="0" class="menu-option active">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="">Home</a>
                    </div>
                    <div data-key="1" class="menu-option" id="addUsuario">
                        <i class="fa-solid fa-book-medical"></i>
                        <a href="#">Cadastrar Usuário</a>
                    </div>
                    <div data-key="0" class="menu-option ">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a href="../Controller/sair.php">Sair</a>
                    </div>
                </div>
            </div>
        </div> <!-- Container-area -->

    </div>

    <script src="../../../js/slider.js"></script>
    <script src="../js/upload.js"></script>
    <script src="../js/addUser.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
<?php
if (isset($_GET['message'])){
    include 'View/feedbackAdm/salvar.php';
}
?>