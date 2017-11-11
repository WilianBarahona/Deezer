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
      $respueta["mensaje"]="Error, el archivo no es una imagen";
      $respueta["status"] = false;
    }
    else if ($size > 10*1024*1024){
      $respueta["mensaje"]="Error, el tamaño máximo permitido es un 10MB";
      $respueta["status"] = false;
    }
    else if ($width > 4000 || $height > 4000){
        $respueta["mensaje"]="Error la anchura y la altura maxima permitida es 4000px";
        $respueta["status"] = false;
    }
    else if($width < 60 || $height < 60){
        $respueta["mensaje"]="Error la anchura y la altura mínima permitida es 60px";
        $respueta["status"] = false;
    }
    else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $respueta["mensaje"]=$nombre;
        $respueta["status"] = true;
    }
    echo json_encode($respueta);
}else{
    $respueta["mensaje"]="No se seleccionó archivo";
    $respueta["status"] = false;
    echo json_encode($respueta);
}
?>