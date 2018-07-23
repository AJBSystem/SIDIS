<?php
require('db.php');
require('conexion.php');



if (isset($_FILES["file"]))
{
   $mensaje = null;
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
        $file = $_FILES["file"];// nombre del input type file de la imagen
        $nombre = $file["name"][$x];// captura el nombre de la imagen como tal 
        $tipo = $file["type"][$x]; //indica el tipo de imagen
        $ruta_provisional = $file["tmp_name"][$x]; // carpeta temporal dende se guardará la imagen 
        $size = $file["size"][$x]; // indica tamaño de imagen
        $dimensiones = getimagesize($ruta_provisional); 
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "img/";
        
        if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
            $mensaje .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
        }
        else if($size > 1024*1024)
        {
            $mensaje .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
        }
        else if($width > 3500 || $height > 3500)
        {
            $mensaje .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 3500px</p>";
        }
        else if($width < 100 || $height < 100)
        {
            $mensaje .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 100px</p>";
        }
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        }
    }
        echo $mensaje;
}

        $sql = "INSERT INTO test_foto (foto) VALUES ('$nombre')";
        $resultado =mysqli_query($con, $sql);
        print_r($sql);

        if(isset($sql)){
        echo "foto agregada correctamente";
        } else
        echo "No se agrego la foto";
?>