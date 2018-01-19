<?php
require("class/imagenes.php");
require("class/resize.php");

$obj = new Imagenes;


if (isset($_POST["guardar"])) {
    $titulo = $_POST["titulo"];
    $foto = $_FILES["foto"]["name"];
    $temp = $_FILES["foto"]["tmp_name"];
    $tamano = $_FILES["foto"]["size"];
    $tipod = $_FILES["foto"]["type"];

    $foto = str_replace(" ", "_", $foto);
    copy($temp, "upload/$foto");
    $imagen = "$foto";

    // realiza el resize del tumb
    $thumb = new thumbnail("upload/$foto");
    $thumb->size_width(300);
    $thumb->size_height(200);
    $thumb->jpeg_quality(100);
    $thumb->save("upload/tumb_$foto");
    // Final resize
    $obj->add($titulo, $imagen);

    echo "<script type='text/javascript'>window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Agregar imagen</title>
    </head>

    <body>
        <h2>Agregar imagen</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Título<br>
            <input type="text" name="titulo"><br>
            <input name="foto" type="file" id="foto" value="" /><br>

            <input name="guardar" type="submit" class="btn" id="guardar" value="Guardar" />
        </form>

    </body>
</html>
