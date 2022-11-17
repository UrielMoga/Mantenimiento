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
	$sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $idP";
	$res = mysql_query($sql, $con);
	$num = mysql_num_rows($res);
?>

<html>
	<head>
		<script>
			function cerrar(){
					window.location.href='cerrar_pedido.php';
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
			#total{
				width: 800px;
				height: auto;
				margin: auto;
				background-color: #E9967A;
				text-align: center;
			}
		</style>
	
	</head>
	
	<body>
		<a href="carrito.php" style="margin-left: 17%">Regresar</a>
		
		<table id="ver">
		<?php for($i = 0; $i < $num; $i++){ 
				$id = mysql_result($res,$i,"id_producto");
				$cantidad = mysql_result($res, $i, "cantidad");
				$precio = mysql_result($res, $i, "precio");
				
				$sql2 = "SELECT * FROM productos WHERE id = $id";
				$res2 = mysql_query($sql2, $con);
				
				$nombre = mysql_result($res2, 0, "nombre");
				$img  = mysql_result($res2, 0, "archivo");
				
				$subtotal = $cantidad * $precio;
				
				$total = $total + $subtotal;
		?>
		<tr>
			
			<td id="imagen"><a><img src="BackEnd/productos/archivos/<?php echo "$img" ?>" width="100%" align="center" style="border: 2px double #000"></a></td>
			<td class="datos"><h3>Nombre: <?php echo "$nombre" ?></h3></td>
			<td class="datos"><h3>Cantidad: <?php echo "$cantidad" ?></h3></td>
			<td class="datos"><h3>Subtotal: <?php echo "$$subtotal" ?></h3></td>
			<td class="datos"><h3>Precio: <?php echo "$$precio" ?></h3></td>
			<br>
		<tr>
		<?php } ?>
		</table>
		<div id="total"><h3>Total: <?php echo "$$total" ?></h3></div><br>
		<div id="confirm"><input type="button" value="Comprar" onClick="cerrar()" ></div>
	<?php require "footer.php"; ?>
	</body>
</html>