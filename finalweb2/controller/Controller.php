<?php

abstract class Controller{
  $protected model;
  $protected view;


  function asignarPermisos(){
    $permisos = [];
    if(isset($_SESSION["user"])) $permisos = $this->modelUsuario->getPermisosDenegados($_SESSION["user"]);
    else $permisos = $this->modelUsuario->getPermisosVisitante();
    $this->view->actualizarPermisos($permisos);
    return $permisos;
  }



}



 ?>
