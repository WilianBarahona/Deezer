<?php
$respuesta=array();
if (isset($_FILES["file"])){
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $carpeta = "../music/";
    
    if ($tipo != 'audio/mpeg3' && $tipo!='audio/x-mpeg-3' && $tipo!='video/mpeg' && $tipo!='video/x-mpeg' && $tipo!='audio/mpeg'){
      $respuesta["mensaje"]="Error, el archivo no es un archivo mp3";
      $respuesta["status"] = false;
    }
    else if ($size > 15*1024*1024){
      $respuesta["mensaje"]="Error, el tamaño máximo permitido es un 15MB";
      $respuesta["status"] = false;
    }
    else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $respuesta["mensaje"]="La cancion se cargó correctamente";
        $respuesta["ruta"]= $nombre;
        $respuesta["status"] = true;
    }
    echo json_encode($respuesta);
}else{
    $respuesta["mensaje"]="No se seleccionó archivo";
    $respuesta["status"] = false;
    echo json_encode($respuesta);
}
?>