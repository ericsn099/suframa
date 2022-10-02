<?php

class DemandaModel
{

    //CAMPOS DA TABELA FUNCIONARIO
    public $id, $descricao,
        $data_inicio, $data_termino, $observacao,
        $prioridade_id, $tipo_demanda_id, $andamento_id, $funcionario_id, $porcentagem;


    public function save()
    {
        include 'DAO/DemandaDao.php';

        $dao = new DemandaDao();

        if ($dao->insert($this) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function update()
    {
        include 'DAO/DemandaDao.php';
        $dao = new DemandaDao();

        if ($dao->update($this) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getById(int $id)
    {
        include 'DAO/DemandaDao.php';
        $dao = new DemandaDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        }
    }

    public function getAllRows()
    {
        include 'DAO/DemandaDao.php';

        $dao = new DemandaDao();
        $this->rows = $dao->selectAll();
    }
}
