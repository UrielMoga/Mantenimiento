<?php
	include 'menu.php';
?>
<html>
	<head>
		<?php 
			require "funciones/conecta.php";
			$con = conecta();
			
			$sql = "SELECT *
			FROM pedidos
			WHERE status = 1";
	
			$res = mysql_query($sql, $con);
			$num = mysql_num_rows($res);
			
		?>
		
		<title>Listado de Productos</title>
		
		<script src="../JS/jquery-3.3.1.min.js" ></script>
		
		<script>
			function ver_detalle(id_){
				window.location.href='ver_detalle.php?id='+id_;
			}
		</script>
		
		<style>
			#titulo{
				width: 985px;
				height: 100px;
				border: 10px double #010;
				margin: auto;
			}
			#tabla{
				width: 1000px;
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
				width: 242px;
				height: 80px;
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
		<h1 align="center">Listado de Productos</h1>
		</div>
		<table id="tabla">
			<tr>
				<th  id="titulot"><h1 align="center" style="color:#FFF">Registros</h1></th>
			</tr>
			<tr id="fila">
				<th class="caja"><h1 align="center">Id</h1></th>
				<th class="caja"><h1 align="center">Fecha</h1></th>
				<th class="caja"><h1 align="center">Usuario</h1></th>
				<th class="caja"><h1 align="center">Ver detalle</h1></th>
			</tr>
			<?php for($i = 0; $i<$num; $i++){
					$id = mysql_result($res, $i, "id");
					$fecha = mysql_result($res, $i, "fecha");
					$usuario = mysql_result($res, $i, "usuario");
					$val = $i + 1;
				  ?>
			<tr id="fila<?php echo $val; ?>">
				<th class="caja" ><h2 align="center" id="id<?php echo $val; ?>"><?php echo "$id";?></h2></th>
				<th class="caja"><h2 align="center"><?php echo "$fecha";?></h2></th>
				<th class="caja"><h4 align="center"><?php echo "$usuario";?></h4></th>
				<th class="caja"><input onClick="ver_detalle(<?php echo $id; ?>);" type="button" value="Ver" class="contenido"></th>
			</tr>
			<?php } ?>
			
		</table>
	</body>
</html>