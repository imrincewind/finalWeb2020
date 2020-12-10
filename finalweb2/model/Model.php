<?php

abstract class Model{

  function __construct(){
    try {
      $this->db = new PDO ('mysql:host=' .HOST. 'dbname=' .rtrim(dbname), ';charset = utf8', user(dbpass));

    } catch (PDOException $e) {
      header('Location: /index.php'); //no anda, reenviamos al usuario al index

      die();
    }


  }
}

 ?>
