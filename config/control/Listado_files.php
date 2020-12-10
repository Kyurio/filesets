<?php
require_once("../../config/query/Files.php");
require_once("../../config/core/Autoload.php");

$objFiles = new Files();



if($select  = $objFiles->Listar_archivos()){

  echo json_encode($select);

}else{

  echo json_encode($select);

}

?>
