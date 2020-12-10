<?php
include_once("controller/Controller.php");



class LotesController extends Controller{

  function __construct(){
    parent::__construct();
    $this->view = new ViewLotes();
    $this->model = new LotesModel();


  }

  function mostrarLotes(){
      session_start();
      $this->asignarPermisos(); //asignamos el permiso del usuario
      $this->view->mostrarHome(); //mostramos el home, correspondiente al permiso asignado, en caso
                                  //que el usuario no sea administrador, en el view no lo verá.

  }

  function agregarLote(){
    $newLote =[];
    if ((isset($_POST['nro_lote']) && (isset($_POST['anio_vencimiento']) && (isset($_POST['id_laboratorio']) && (is_int($_POST['id_laboratorio'])  )){


      $newLote['nro_lote'] = $_POST['nro_lote'];
      $newLote['anio_vencimiento'] = $_POST['anio_vencimiento'];
      $newLote['id_laboratorio'] = $_POST['id_laboratorio'];
    }  //verificamos que esten escritos, el nro de lote, el año de vencimiento y el id del laboratorio,
    // tambien que el id del laboratorio sea int
    return $newLote;
  }


}


 ?>
