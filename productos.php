<?php
	require "BackEnd/funciones/conecta.php";
	$con  = conecta();
	$sql = "SELECT * FROM productos WHERE eliminado = 0 AND stock != 0";
	$res  = mysql_query($sql, $con);
	$nump = mysql_num_rows($res);
	require "menu.php";
?>

<html>
	<head>
		<title>Productos</title>
		<script src="BackEnd/JS/jquery-3.3.1.min.js" ></script>
		<script>
			function add(id_, i, stock){
				
				var can = $('#cantidad'+i).val();
				
				if(can > stock || can == ''){
					alert('Esta cantidad no es valida');
				}
				else{
					window.location.href="agregaCarrito.php?id="+id_+"&cantidad="+can;
				}
			}
		</script>
		<style>
			#productos{
				margin: auto;
				width: 75%;
				height: auto;
				background-color: #E9967A;
				text-align: center;
				display: flex;
				position: relative;
			}
			.prod{
				
				width: 250px;
				height: 300px;
				margin: 10px;
				float: right;
				text-align: center;
				background-color: #DEB887;
			}
			.barra{
				width: 100%;
				border: 1px solid #FFF;
			}
		</style>
	</head>
	
	<body>
		<table id="productos">
			<?php for($i=0;$i<$nump;$i++){ 
				$id = mysql_result($res, $i, "id");
				$nombre = mysql_result($res, $i, "nombre");
				$costo = mysql_result($res, $i, "costo");
				$img  = mysql_result($res, $i, "archivo");
				$stock = mysql_result($res, $i, "stock");
			?>
			
			<td class="prod">
				<a><img src="BackEnd/productos/archivos/<?php echo "$img" ?>" width="100" style="border: 2px double #000"></a>
				<h3><a href="ver.php?id=<?php echo "$id" ?>"><?php echo "$nombre" ?></a></h3>
				<h3><?php echo "$$costo" ?></h3>
				<input  type="number" min="1" max="<?php echo "$stock" ?>" name="cantidad" id="cantidad<?php echo "$i" ?>" placeholder="cantidad" >
				<input type="button" onClick="add(<?php echo "$id, $i, $stock" ?>);" value="Comprar">
				<br>
			</td>
			
			<?php
				$dat = 0;
				$dat = $i + 1;
				
				if($dat == 3 || $dat == 6 || $dat == 9){
					echo "<tr class=\"barra\"></tr><br>";
				}
			
			 } ?>
		</table>	
		<?php require "footer.php"; ?>
	</body>
</html>