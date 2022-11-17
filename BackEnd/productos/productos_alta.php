<?php 
	include 'menu.php';
?>
<html>
	<head>
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		 <script>
		function recibe(){
		var val_nombre = Forma01.nombre.value;
		var val_codigo = Forma01.codigo.value;
		var val_descripcion = Forma01.descripcion.value;
		var val_costo = Forma01.costo.value;
		var val_stock = Forma01.stock.value;
		var val_imagen = Forma01.archivo.value;
		
		
		if(val_nombre == '' || val_codigo == '' || val_descripcion == '' || val_costo == '' || val_stock == '' || val_imagen == ''){
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('')", 5000);
			return false;
			}
		else{
			document.Forma01.method = 'post';
			document.Forma01.action = 'productos_salva.php';
			document.Forma01.submit();
		}
	}
  </script>
  
		<script>
			function verificaCodigo(){
				var id     = $('#id_sel').val();
				var codigo = $('#codigo').val();
				
				if(codigo != ''){
					$.ajax({
						url       : 'funciones/verificaCodigo.php',
						type      : 'post',
						dataType  : 'text',
						data      : 'id='+id+'&codigo='+codigo,
						success   : function(res){
							if(res > 0){
								
								$('#mensaje1').html('El codigo '+codigo+' ya esta registrado');
								$('#codigo').val('');
								setTimeout("$('#mensaje1').html('')", 5000);
							}
						},error: function(){
							alert('Error al conectar al servidor...');
						}
					});
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
		<h1>Alta Productos</h1>
		<a href="productos_listado.php">Regresar al listado</a>
		<div  style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<form name="Forma01" enctype="multipart/form-data">
		<label>
			Nombre:
			<input type="text" name="nombre" placeholder="Escribe el nombre" required>
		</label>
		<br>
		<label>Codigo:</label>
		<input type="text" name="codigo" id="codigo" placeholder="Escribe el codigo" onblur="verificaCodigo();">
		<div id="mensaje1" class="error"> </div>
		<br>
		<label>Descripcion:</label>
		<input type="text" name="descripcion" placeholder="Escribe la descripcion">
		<br>
		<label>Costo:</label>
		<input type="text" name="costo" placeholder="Escribe el costo">
		<br>
		<label>Stock:</label>
		<input type="text" name="stock" placeholder="Escribe el stock">
		<br>
		<label>Imagen:</label>
		<input type="file"  name="archivo"><br>
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Guardar">
		<div id="mensaje2" class="error"> </div>
		<input type="hidden" id="id_sel" name="id_sel" value="0">
		</form>
	</body>
</html>