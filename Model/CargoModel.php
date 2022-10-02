<?php

class CargoModel
{
    public $id;
    public $nome;

	public function getAllRows()
    {
        include 'DAO/CargoDao.php';

        $dao = new CargoDao();
        $this->rows = $dao->select();
    }
}
