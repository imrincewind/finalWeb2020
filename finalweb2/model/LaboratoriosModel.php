<?php
include_once(model/Model.php);

class LaboratoriosModel extends Model{

  function __construct(){
    parent::__construct();
  }


  function getLaboratorios()
  {
    $lotes = $this->db->prepare("SELECT * FROM laboratorio");
    $lotes->execute();
    return $componentes->fetchAll(PDO::FETCH_ASSOC);
  }



}

?>
