<?php

class PrioridadeModel
{

   public $id;
   public $nome;


   public function getAllRows()
   {
      include 'DAO/PrioridadeDao.php';

      $dao = new PrioridadeDao();
      $this->rows = $dao->select();
   }
}
