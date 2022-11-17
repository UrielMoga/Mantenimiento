<?php
	require "menu.php";
	require "BackEnd/funciones/conecta.php";
	$con = conecta();
	
	if($_SESSION['usuario']){
		$usuario = $_SESSION['usuario'];
	}
	
	$sql = "SELECT * FROM pedidos WHERE usuario = $usuario AND status = 0";
	$res = mysql_query($sql, $con);
	$nump = mysql_num_rows($res);
	
	$idP = mysql_result($res, 0, "id");
	//$idP = 2;
	$sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $idP";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
?>

<html>
	<head>
		<script src="BackEnd/JS/jquery-3.3.1.min.js" ></script>
		<script>
			function comprar(nump){
				if(nump == 0){
					alert('No tienes nada que comprar');
				}
				else if(confirm('Confirmar la compra')){
					
				window.location.href='carrito_confirm.php';
				}
			}
			function eliminar(id_, can){
				var fila     = $("#row"+id_).val();
				if(confirm("Eliminar del carrito?")){ 
					$.ajax({
						url       : 'elimina_carrito.php?id='+id_+'&cantidad='+can,
						type      : 'post',
						dataType  : 'text',
						success   : function(res){
							if(res == 1){
								$("#row"+id_).hide();
							}
							else
								alert('No se pudo eliminar');
						}
					});
				}
			}
		</script>
		<style>
			#ver{
				width: 800px;
				height: 500px;
				margin: auto;
				background-color: #FA8072;
			}
			.datos{
				width: 280px;
				height: auto;
				text-align: center;
				border: 2px solid #000;
				float: right;
			}
			#confirm{
				width: 100%;
				text-align: center;
			}
		</style>
	</head>
	
	<body>
		<a href="index.php" style="margin-left: 17%">Regresar</a>
		<?php if($nump == 0){ ?>
			<table id="ver">
				<tr>
					<td>
						<h1 style="text-align: center">Todavia no tienes productos agregado</h1>
					</td>
				</tr>
			</table>
		<?php } ?>
		<table id="ver">
		<?php for($i = 0; $i < $num; $i++){ 
				$id = mysql_result($res,$i,"id_producto");
				$cantidad = mysql_result($res, $i, "cantidad");
				$precio = mysql_result($res, $i, "precio");
				
				$sql2 = "SELECT * FROM productos WHERE id = $id";
				$res2 = mysql_query($sql2, $con);
				
				$nombre = mysql_result($res2, 0, "nombre");
				$img  = mysql_result($res2, 0, "archivo");
		?>
		<tr id="row<?php echo "$id" ?>">
			<br>
			<td id="imagen"><a><img src="BackEnd/productos/archivos/<?php echo "$img" ?>" width="100%" align="center" style="border: 2px double #000"></a></td>
			<td class="datos"><h3>Nombre: <?php echo "$nombre" ?></h3></td>
			<td class="datos"><h3>Cantidad: <?php echo "$cantidad" ?></h3></td>
			<td class="datos"><h3>Precio: <?php echo "$precio" ?></h3></td>
			<td class="datos"><input type="button" value="Eliminar" onClick="eliminar(<?php echo "$id, $cantidad" ?>)">
			<br>
		</tr>
		<?php } ?>
		
		</table>
		<div id="confirm"><input type="button" value="Confirmar" onClick="comprar(<?php echo "$nump" ?>)" ></div>
		<?php require "footer.php"; ?>
	<body>
</html>