<?php

if (isset($_FILES["imagefile"]))
{
   $reporte = null;
     for($x=0; $x<count($_FILES["imagefile"]["name"]); $x++)
    {
        $file = $_FILES["imagefile"];// nombre del input type file de la imagen
            $nombre = $file["name"][$x];// captura el nombre de la imagen como tal 
                $tipo = $file["type"][$x]; //indica el tipo de imagen
                    $ruta_provisional = $file["tmp_name"][$x]; // carpeta temporal dende se guardará la imagen 
                        $size = $file["size"][$x]; // indica tamaño de imagen
                            $dimensiones = getimagesize($ruta_provisional); 
                                $width = $dimensiones[0];
                                    $height = $dimensiones[1];
                                        $carpeta = "../img/";
        
        if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
            $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
        }
        else if($size > 1024*1024)
        {
            $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
        }
        else if($width > 500 || $height > 500)
        {
            $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
        }
        else if($width < 100 || $height < 100)
        {
            $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 100px</p>";
        }
        else
        {
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        }
    }
        echo $reporte;
}