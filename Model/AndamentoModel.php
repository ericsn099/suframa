<?php

class AndamentoModel
{
    public $id;
    public $nome;

	public function getAllRows()
    {
        include 'DAO/AndamentoDao.php';

        $dao = new AndamentoDao();
        $this->rows = $dao->select();
    }
}
