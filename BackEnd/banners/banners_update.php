<?php 
	require "funciones/conecta.php";
	$con  = conecta();
	
	$id   = $_REQUEST['id'];

	$sql  = "SELECT * FROM banners WHERE id = $id";

	$res  = mysql_query($sql, $con);
	
	$nombre     = mysql_result($res, 0, "nombre");
	
	include 'menu.php';
?>

<html>
	<head>
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		 <script>
		function recibe(){
		var val_nombre = Forma01.nombre.value;
		
		if(val_nombre == ''){
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('')", 5000);
			return false;
		}
		else{
			document.Forma01.method = 'post';
			document.Forma01.action = 'update.php';
			document.Forma01.submit();
		}
	}
		</script>
		
		<style>
			.error{
				display: inline;
				color: FF0000;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;">
		<h1>Modificar Datos</h1>
		<a href="banners_listado.php">Regresar al listado</a>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<form name="Forma01" enctype="multipart/form-data">
		<label>
			Nombre:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" value="<?php echo $nombre; ?>">
		</label>
		<br>
		<label>
			Imagen:
			<input type="file"  name="archivo">
		</label>
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Actualizar">
		<div id="mensaje2" class="error"></div>
		<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id; ?>">
		</form>
	</body>
</html>