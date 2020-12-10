<?php
require_once("../../config/core/Autoload.php");


class Files extends Conexion{

  private $strNombre;
  private $strExtension;
  private $strUrl;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function subir_archivo(string $nombre, string $extension, string $url){

    $this->strNombre = $nombre;
    $this->strExtension = $extension;
    $this->strUrl = $url;

    $sql = "INSERT INTO files(nombre, extension, url) VALUES (?,?,?)";
    $insert = $this->conexion->prepare($sql);
    $arrData = array($this->strNombre, $this->strExtension, $this->strUrl);
    $resInsert = $insert->execute($arrData);

    if($resInsert){

      return true;

    }else{

      return false;

    }


  }


  // select
  public function listar_archivos(){

    try {

      $sql  =  ("SELECT * FROM files");
      $stmt =  $this->conexion->query($sql);
      $row  =  $stmt->fetchAll();

      if ($row ) {

        return $row;

      }else {

        return false;

      }


    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

  }

  // update
  public function update_mapa(){

  }

  // delete
  public function delete_mapa(){}

  }
