<?php
require_once("../../config/query/Files.php");
require_once("../../config/core/Autoload.php");

$objFiles = new Files();

if ($_POST) {

  $nombre = $_POST['name_file'];
  $extension = $_FILES['files_selected']['type'];
  $archivo_temporal = $_FILES['files_selected']['tmp_name'];
  $file = $_FILES['files_selected']['name'];
  $url = "/filesets/assets/files/".$file;
  // Recupera la información del archivo
  $informacion = $_FILES['files_selected'];
  // Extrae el archivo
  $nombre = $informacion['name'];
  // Extrae su tipo MIME
  $tipo_mime = $informacion['type'];
  // Extrae su tamaño
  $tamanio = $informacion['size'];
  // Extrae su ubicación del archivo temporal
  $archivo_temporal = $informacion['tmp_name'];
  // Extrae el codigo de error
  $codigo_error = $informacion['error'];


  switch ($codigo_error) {
    case UPLOAD_ERR_OK:

    $destino = $_SERVER['DOCUMENT_ROOT']."/filesets/assets/files/".$file;
    if (move_uploaded_file($archivo_temporal, $destino)) {
      $mensaje  = true;
    } else {
      $mensaje = false;
    }
    break;

    case UPLOAD_ERR_NO_FILE:
    $mensaje = 'Sin archivo.';
    break;
    case UPLOAD_ERR_INI_SIZE:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (tamaño > UPLOAD_MAX_FILESIZE).';
    break;
    case UPLOAD_ERR_FORM_SIZE:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (tamaño > MAX_FILE_SIZE).';
    break;
    case UPLOAD_ERR_PARTIAL:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (problema durante la tranferencia).';
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (sin directorio temporal).';
    break;
    case UPLOAD_ERR_CANT_WRITE:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (error durante la escritura del archivo en disco).';
    break;
    case UPLOAD_ERR_EXTENSION:
    $mensaje  = "Archivo '$nombre' no transferido ";
    $mensaje .= ' (transferencia detenida por la expresión).';
    break;
    default:
    $mensaje  = "Archivo no transferido ";
    $mensaje .= " (error desconocido: $codigo_error ).";
  }



  if($insert  = $objFiles->subir_archivo($nombre, $extension, $url)){

    // redireccionar

  }else{

    // error al direccionar

  }

}else{

  echo "no es por metodo post";

}


?>
