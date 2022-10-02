<?php

class LoginModel
{
    public $id;
    public $nome;
    public $avatar;
    public $cpf;
    public $login;
    public $senha;
    public $tipouser;

    public function validarLogin(string $login, string $senha, string $tipouser)
    {
        include 'DAO/LoginDao.php';
        $dao = new LoginDao();

        $obj = $dao->validarUser($login, $senha, $tipouser);
        if($obj){
            return $obj;
        }else{
            return false;
        }
    }

	public function getByLogin(string $login)
    {
        include 'DAO/LoginDao.php';
        $dao = new LoginDao();

        $obj = $dao->selectByLogin($login);
        if($obj){
            return $obj;
        }
    }

}
