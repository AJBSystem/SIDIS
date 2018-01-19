<?php
	require_once 'class/imagenes.php';
	$imagen = new Imagenes();
	$imagen->del($_GET["id"]);
?>