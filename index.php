<?php
        require_once "BackEnd/controladores/banners.controlador.php";
	require_once "BackEnd/modelos/banners.modelo.php";

	require_once "BackEnd/controladores/productos.controlador.php";
	require_once "BackEnd/modelos/productos.modelo.php";
        
	$sqlp ="SELECT * FROM productos WHERE eliminado = 0 AND stock != 0";
	
	require "menu.php";
?>
<html>
	<head>
		<title>Inicio</title>
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
			#banner{
				text-align: center;
				margin: auto;
			}
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
		<?php 
                $banner = ControladorSlide::ctrMostrarSlide();
               
                $ban  = $banner["archivo"];
		?>
		<div id="banner"><a><img src = "BackEnd/banners/archivos/<?php echo "$ban" ?>" width="900px" heigth="300px"></a></div>
		
		<table id="productos">
			<?php for($i=0;$i<6;$i++){ 
                                $prod = ControladorProductos::ctrMostrarProductos();
				
				$id = $prod["id"];
				$nombre = $prod["nombre"];
				$costo = $prod["costo"];
				$stock = $prod["stock"];
				$img  = $prod["archivo"];
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
				
				if($dat == 3 || $dat == 6 ){
					echo "<tr class=\"barra\"></tr><br>";
				}
			
			 } ?>
		</table>
		<?php require "footer.php"; ?>
	<body>
</html>