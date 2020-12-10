<?php
include_once(model/Model.php);

class LotesModel extends Model{

  function __construct(){
    parent::__construct();
  }


  function addLote($lte){
    if ($this->verificarCiudad($lte[id_ciudad]) && $this->verificarLaboratorio($lte[id_laboratorio])) { //verificamos que existan
      if($this->verificarTemperaturaCiudad($lte[id_ciudad],$lte[id_laboratorio])){ //verificamos ciudad temperatura correcta
    $lote = $this->db->prepare("INSERT INTO lote(nro_lote,anio_vencimiento,id_ciudad,id_laboratorio) VALUES (?,?,?,?)");
    $lote-> execute(array($lte[nro_lote],$lte[anio_vencimiento],$lte[id_ciudad],$lte[id_laboratorio]));
          }
    }
  }

  function verificarCiudad($id){
    $lote = $this->db->prepare("SELECT * FROM ciudad WHERE id=?");
    return sizeof( $lote-> execute(array($id))) > 0;
  }

  function verificarLaboratorio($id){
    $lote = $this->db->prepare("SELECT * FROM laboratorio WHERE id=?");
    return sizeof( $lote-> execute(array($id))) > 0;

  }

  function verificarTemperaturaCiudad($id_ciudad,$id_laboratorio){;
    $ciudad = $this->db->prepare("SELECT temperatura_conservacion FROM ciudad WHERE id=?");
    $lote = $this->db->prepare("SELECT temperatura_requerida FROM laboratorio WHERE id=?");
    if($ciudad <= $lote){
      return true;
    }
    return false;


  }

  function getLotes()
  {
    $lotes = $this->db->prepare("SELECT * FROM lote");
    $lotes->execute();
    return $componentes->fetchAll(PDO::FETCH_ASSOC);
  }



}
?>
