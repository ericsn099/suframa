<?php

class AreaAtuacaoModel
{
    public $id;
    public $nome;

	public function getAllRows()
    {
        include 'DAO/AreaAtuacaoDao.php';

        $dao = new AreaAtuacaoDao();
        $this->rows = $dao->select();
    }
}
