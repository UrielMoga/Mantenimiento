<?php
	include 'menu.php';
?>
<html>
	<head>
		<?php 
			require "funciones/conecta.php";
			$con = conecta();
			
			$sql = "SELECT *
			FROM productos
			WHERE status = 1 AND eliminado = 0";
	
			$res = mysql_query($sql, $con);
			$num = mysql_num_rows($res);
			
		?>
		
		<title>Listado de Productos</title>
		
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		<script>
			function eliminar(val){
				var id     = $("#id"+val).text();
				var fila     = $("#fila"+val).val();
				if(confirm("Eliminar registro?")){ 
					$.ajax({
						url       : 'productos_elimina.php?id='+id,
						type      : 'post',
						dataType  : 'text',
						success   : function(res){
							if(res == 1){
								$("#fila"+val).hide();
							}
							else
								alert('No se pudo eliminar');
						}
					});
				}
			}
			function editar(id_){
				window.location.href='productos_update.php?id='+id_;
			}
			function ver_detalle(id_){
				window.location.href='ver_detalle.php?id='+id_;
			}
		</script>
		
		<style>
			#titulo{
				width: 985px;
				height: 120px;
				border: 10px double #010;
				margin: auto;
			}
			#tabla{
				width: auto;
				height: auto;
				overflow-x:hidden;
				border: 1px solid #010;
				background-color: #00F;
				margin: auto;
			}
			#titulot{
				width: auto;
				height: auto;
				border: 1px solid #010;
				background-color: #708090;
				margin: 1px;
			}
			.caja{
				width: 109px;
				height: 125px;
				border: 1px solid #FFF;
				float: left;
				background-color: #ADD8E6;
				margin-left: 1px;
				margin-right: 1px;
			}
			.contenido{
				padding: 10px;
				margin: 30px auto;
				display: block;
			}
			.descripcion{
				width: 168px;
				height: 125px;
				border: 1px solid #FFF;
				float: left;
				background-color: #ADD8E6;
				margin-left: 1px;
				margin-right: 1px;
			}
			.id{
				width: 50px;
				height: 125px;
				border: 1px solid #FFF;
				float: left;
				background-color: #ADD8E6;
				margin-left: 1px;
				margin-right: 1px;
			}
		</style>
	</head>
	<body style="background-color:#F0F8FF;">
		<div id="titulo">
		<h1 align="center">Listado de Productos</h1>
		<h2 align="center">Ingresar un nuevo registro: <input type="button" onClick="window.location.href = 'productos_alta.php'" value="Nuevo Registro"></h2>
		</div>
		<table id="tabla">
			<tr>
				<th  id="titulot"><h1 align="center" style="color:#FFF">Registros</h1></th>
			</tr>
			<tr id="fila">
				<th class="id"><h2 align="center">Id</h2></th>
				<th class="caja"><h2 align="center">Nombre</h2></th>
				<th class="caja"><h2 align="center">Codigo</h2></th>
				<th class="descripcion"><h3 align="center">Descripcion</h3></th>
				<th class="caja"><h2 align="center">Costo</h2></th>
				<th class="caja"><h2 align="center">Stock</h2></th>
				<th class="caja"><h2 align="center">Ver detalle</h2></th>
				<th class="caja"><h2 align="center">Editar</h2></th>
				<th class="caja"><h2 align="center">Elliminar</h2></th>
			</tr>
			<?php for($i = 0; $i<$num; $i++){
					$id = mysql_result($res, $i, "id");
					$nombre = mysql_result($res, $i, "nombre");
					$codigo = mysql_result($res, $i, "codigo");
					$descripcion = mysql_result($res, $i, "descripcion");
					$costo = mysql_result($res, $i, "costo");
					$stock = mysql_result($res, $i, "stock");
					
					$val = $i + 1;
					
					if($rol == 1)
						$rol = 'Gerente';
					else
						$rol = 'Ejecutivo';
				  ?>
			<tr id="fila<?php echo $val; ?>">
				<th class="id" ><h2 align="center" id="id<?php echo $val; ?>"><?php echo "$id";?></h2></th>
				<th class="caja"><h2 align="center"><?php echo "$nombre";?></h2></th>
				<th class="caja"><h2 align="center"><?php echo "$codigo";?></h2></th>
				<th class="descripcion"><h4 align="center"><?php echo "$descripcion";?></h4></th>
				<th class="caja"><h2 align="center"><?php echo "$costo";?></h2></th>
				<th class="caja"><h2 align="center"><?php echo "$stock";?></h2></th>
				<th class="caja"><input onClick="ver_detalle(<?php echo $id; ?>);" type="button" value="Ver" class="contenido"></th>
				<th class="caja"><input onClick="editar(<?php echo $id; ?>);" type="button" value="Editar" class="contenido"></th>
				<th class="caja"><input onClick="eliminar(<?php echo $val; ?>);" type="button" value="Eliminar"  class="contenido"></th>
			</tr>
			<?php } ?>
			
		</table>
	</body>
</html>