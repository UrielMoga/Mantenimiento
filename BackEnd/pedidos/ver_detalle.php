<?php
	require "funciones/conecta.php";
	$con  = conecta();
	$con2  = conecta();
	$id   = $_REQUEST['id'];
	
	$sql  = "SELECT * FROM pedidos_productos WHERE id_pedido = $id";
	$res  = mysql_query($sql, $con);
	$num = mysql_num_rows($res);

	$total = 0;

	include 'menu.php';
?>

<html>
	<head>
		<title>Ver Detalle</title>
		<style>
			#tabla{
				width: 800px;
				height: auto;
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
			.producto{
				width: 100%;
				height: auto;
				overflow-x:hidden;
				border: 1px solid #000;
				background-color: #6495ED;
			}
			#total{
				width: 800px;
				height: auto;
				border: 2px dotted #000;
				text-align: center;
				margin: auto;
				background-color: #6495ED;
			}
		</style>
	</head>
	
	<body style="background-color:#F0F8FF;">
		<h1>Ver Detalle</h1>
		<a href="pedidos_listado.php">Regresar al listado</a>
		<div style="width: 100%; height: auto; border: 1px solid #010;"></div><br></br>
		<div id="tabla">
		<?php for($i=0; $i<$num; $i++){ 
			
			$id     = mysql_result($res, $i, "id");
			$id_pedido  = mysql_result($res, $i, "id_pedido");
			$id_producto  = mysql_result($res, $i, "id_producto");
			$cantidad        = mysql_result($res, $i, "cantidad"); 
			$precio   = mysql_result($res, $i, "precio");
			
			$sql2 = "SELECT * FROM productos WHERE id = $id_producto";
			$res2 = mysql_query($sql2, $con);
			
			$nombre  = mysql_result($res2, 0, "nombre");
			$imagen  = mysql_result($res2, 0, "archivo");
			
			$subtotal = $precio * $cantidad;
			$total = $total + $subtotal;
		?>
		<div class="producto">
			<div id="imagen"><a><img src = "../productos/archivos/<?php echo $imagen; ?>" width="100%"  align="center"></a></div><br>
			<div class="datos">Nombre: <?php echo "$nombre" ?></div><br></br>
			<div class="datos">Costo: <?php echo "$precio" ?></div><br></br>
			<div class="datos">Cantidad: <?php echo "$cantidad" ?></div><br></br>
		</div>
		<div id="total">Sub total: <?php echo "$$subtotal" ?></div>
			<br>
		<?php } ?>
		</div>
		
		<div id="total">Total: <?php echo "$$total" ?></div>
		<br><br>
	</body>
</html>