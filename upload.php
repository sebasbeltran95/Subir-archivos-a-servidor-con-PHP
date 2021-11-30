<?php

// var_dump($_FILES["file"]["name"]);

$directorio = "uploads/";
$archivo = $directorio. basename($_FILES["file"]["name"]); 

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

// validar que es imagen
$checarImagen = getimagesize($_FILES["file"]["tmp_name"]);

// var_dump( $size);

if($checarImagen != false){

    //validando el tamaño del archivo
    $size = $_FILES["file"]["size"];  
    if($size > 500000){
        echo "El archivo tiene que ser menor a 500kb";
    } else {

        //validar tipo de imgaen
        if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
            //se valido el archivo correctamente
            if(move_uploaded_file($_FILES["file"] ["tmp_name"], $archivo)){
                echo "El archivo se subio correctamente";
            } else {
                echo "Hubo un error en la subida del archivo";
            }
        } else{
            echo "Solo se permiten archivos jpg/jpeg";
        }
    }
} else {
    echo"El documento no es una imagen";
}













