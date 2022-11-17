<?php 
	include 'menu.php';
?>
<html>
	<head>
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		<script>
		function recibe(){
		var val_nombre = Forma01.nombre.value;
		var val_img = Forma01.archivo.value;
		
		if(val_nombre == '' || val_img == ''){
			$('#mensaje').html('Faltan campos por llenar');
			setTimeout("$('#mensaje').html('')", 5000);
			return false;
			}
		else{
			document.Forma01.method = 'post';
			document.Forma01.action = 'banners_salva.php';
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
	
	<body style="background-color:#F0F8FF;" >
		<h1>Alta Banners</h1>
		<a href="banners_listado.php">Regresar al listado</a>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<form name="Forma01" enctype="multipart/form-data">
		<label>
			Nombre:
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
		<br>
		<label>
			Imagen:
			<input type="file"  name="archivo"><br>
		</label>
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Guardar">
		<div id="mensaje" class="error"> </div>
		<input type="hidden" id="id_sel" name="id_sel" value="0">
		</form>
	</body>
</html>