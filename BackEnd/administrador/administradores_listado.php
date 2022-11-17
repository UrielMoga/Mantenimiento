<?php
	include 'menu.php';
?>
<html>
	<head>
		<?php 
			require "funciones/conecta.php";
			$con = conecta();
			
			$sql = "SELECT *
			FROM administradores
			WHERE status = 1 AND eliminado = 0";
	
			$res = mysql_query($sql, $con);
			$num = mysql_num_rows($res);
			
		?>
		
		<title>Listado de Administradores</title>
		
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		<script>
			function eliminar(val){
				var id     = $("#id"+val).text();
				var fila     = $("#fila"+val).val();
				if(confirm("Eliminar registro?")){ 
					$.ajax({
						url       : 'administradores_elimina.php?id='+id,
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
				window.location.href='administradores_update.php?id='+id_;
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
				width: 140px;
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
		</style>
	</head>
	<body style="background-color:#F0F8FF;">
		<div id="titulo">
		<h1 align="center">Listado de Administradores</h1>
		<h2 align="center">Ingresar un nuevo registro: <input type="button" onClick="window.location.href = 'administradores_alta.php'" value="Nuevo Registro"></h2>
		</div>
		<table id="tabla">
			<tr>
				<th  id="titulot"><h1 align="center" style="color:#FFF">Registros</h1></th>
			</tr>
			<tr id="fila">
				<th class="caja"><h1 align="center">Id</h1></th>
				<th class="caja"><h1 align="center">Nombre</h1></th>
				<th class="caja"><h1 align="center">Correo</h1></th>
				<th class="caja"><h1 align="center">Rol</h1></th>
				<th class="caja"><h1 align="center">Ver detalle</h1></th>
				<th class="caja"><h1 align="center">Editar</h1></th>
				<th class="caja"><h1 align="center">Elliminar</h1></th>
			</tr>
			<?php for($i = 0; $i<$num; $i++){
					$id = mysql_result($res, $i, "id");
					$nombre = mysql_result($res, $i, "nombre");
					$apellido = mysql_result($res, $i, "apellido");
					$correo = mysql_result($res, $i, "correo");
					$rol = mysql_result($res, $i, "rol");
					$val = $i + 1;
					
					if($rol == 1)
						$rol = 'Gerente';
					else
						$rol = 'Ejecutivo';
				  ?>
			<tr id="fila<?php echo $val; ?>">
				<th class="caja" ><h2 align="center" id="id<?php echo $val; ?>"><?php echo "$id";?></h2></th>
				<th class="caja"><h2 align="center"><?php echo "$nombre $apellido";?></h2></th>
				<th class="caja"><h4 align="center"><?php echo "$correo";?></h4></th>
				<th class="caja"><h2 align="center"><?php echo "$rol";?></h2></th>
				<th class="caja"><input onClick="ver_detalle(<?php echo $id; ?>);" type="button" value="Ver" class="contenido"></th>
				<th class="caja"><input onClick="editar(<?php echo $id; ?>);" type="button" value="Editar" class="contenido"></th>
				<th class="caja"><input onClick="eliminar(<?php echo $val; ?>);" type="button" value="Eliminar registro"  class="contenido"></th>
			</tr>
			<?php } ?>
			
		</table>
	</body>
</html>