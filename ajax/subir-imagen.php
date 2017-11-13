<?php
$respuesta=array();
if (isset($_FILES["file"])){
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../img/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
      $respuesta["mensaje"]="Error, el archivo no es una imagen";
      $respuesta["status"] = false;
    }
    else if ($size > 10*1024*1024){
      $respuesta["mensaje"]="Error, el tamaño máximo permitido es un 10MB";
      $respuesta["status"] = false;
    }
    else if ($width > 4000 || $height > 4000){
        $respuesta["mensaje"]="Error la anchura y la altura maxima permitida es 4000px";
        $respuesta["status"] = false;
    }
    else if($width < 60 || $height < 60){
        $respuesta["mensaje"]="Error la anchura y la altura mínima permitida es 60px";
        $respuesta["status"] = false;
    }
    else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $respuesta["mensaje"]="La imagen se cargó correctamente";
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