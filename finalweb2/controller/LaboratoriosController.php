<?php
include_once("controller/Controller.php");



class LaboratoriosController extends Controller{

  function __construct(){
    parent::__construct();
    $this->view = new ViewLaboratorios();
    $this->model = new LaboratoriosModel();


  }



  function updateData(){
    $lotes = $this->modelLotes->getLotes();
    $laboratorios = $this->model->getLaboratorios();
    foreach ($laboratorios as $key => $laboratorio) {
      $laboratorios[$key['suma']] = 0;
      foreach ($lotes as $k => $lote) {
        if ( $lotes[$k]["id_laboratorio"] ==   $laboratorios[$key['id']]) {
          $laboratorios[$key['suma']] = $laboratorios[$key['suma']]+ $laboratorios[$key['costo_lote']];
        }
      }
    }

    $data = ["laboratorios" => $laboratorios];
    $this->view->asignarDatos($data);
  }


}


 ?>
