<?php
	require "funciones/conecta.php";
	$con  = conecta();
	
	$id   = $_REQUEST['id'];
	
	$sql  = "SELECT * FROM administradores WHERE id = $id";

	$res  = mysql_query($sql, $con);
	$nombre     = mysql_result($res, 0, "nombre");
	$apellidos  = mysql_result($res, 0, "apellido");
	$correo     = mysql_result($res, 0, "correo");
	$rol        = mysql_result($res, 0, "rol"); 
	$status     = mysql_result($res, 0, "eliminado");
	$imagen     = mysql_result($res, 0, "archivo");
	
	if($imagen == ''){
		$imagen = 'default.png';
	}
	
	
	$rol = ($rol == 1) ? "Gerente" : "Ejecutivo";
	$st  = ($status > 0) ? "Inactivo" : "Activo";
	
	include 'menu.php';
?>

<html>
	<head>
		<title>Ver Detalle</title>
		<style>
			#tabla{
				width: 800px;
				height: 180px;
				margin: auto;
			}
			#imagen{
				width: 200px;
				height: 200px;
				border: 5px double #000;
				object-fit: cover;
				object-position: center center;
				float: left;
			}
			.datos{
				width: 550px;
				height: auto;
				border: 2px dotted #000;
				float: right;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;">
		<h1>Ver Detalle</h1>
		<a href="administradores_listado.php">Regresar al listado</a>
		<div style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<div id="tabla">
			<div id="imagen"><a><img src = "archivos/<?php echo $imagen; ?>" width="100%"  align="center"></a></div><br>
			<div class="datos">Nombre: <?php echo "$nombre $apellidos" ?></div><br></br>
			<div class="datos">Correo: <?php echo "$correo" ?></div><br></br>
			<div class="datos">Rol: <?php echo "$rol" ?></div><br></br>
			<div class="datos">Estatus: <?php echo "$st" ?></div><br></br>
		</div>
	</body>
</html>