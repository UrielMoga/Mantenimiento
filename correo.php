<?php
	$nombre = $_REQUEST['nombre'];
	$correo = $_REQUEST['mail'];
	$fecha = $_REQUEST['fecha'];
	$coment = $_REQUEST['comentario'];
	
	$mensaje = "Nombre: $nombre \n Correo: $correo \n Fecha: $fecha \n Comentarios: $coment \n";
	$mensaje = wordwrap($mensaje, 70, "\r\n");
	
	mail('webMantenimiento@mail.com','Comentarios',$mensaje);
	header("Location: index.php"); 
?>