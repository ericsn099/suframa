<?php

class TipoDemandaModel
{
    public $id;
    public $nome;

	public function getAllRows()
    {
        include 'DAO/TipoDemandaDao.php';

        $dao = new TipoDemandaDao();
        $this->rows = $dao->select();
    }
}
