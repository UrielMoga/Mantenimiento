<?php
require_once "BackEnd/controladores/productos.controlador.php";
require_once "BackEnd/modelos/productos.modelo.php";

$id = $_REQUEST['id'];

$sql = "SELECT * FROM productos WHERE id = $id";
$item = "id";
$prod = ControladorProductos::ctrMostrarProductosId($item, $id);



$idp = $prod["id"];
$nombre = $prod["nombre"];
$costo =  $prod["costo"];
$codigo =  $prod["codigo"];
$stock = $prod["stock"];
$descripcion =  $prod["descripcion"];
$img =  $prod["archivo"];
$i = 4;
require "menu.php";
?>

<html>
    <head>
        <title>Ver Producto</title>
        <script src="BackEnd/JS/jquery-3.3.1.min.js" ></script>
        <script>
            function add(id_, i, stock) {

                var can = $('#cantidad' + i).val();
                alert(can);
                if (can > stock || can == '') {
                    alert('Esta cantidad no es valida');
                } else {
                    window.location.href = "agregaCarrito.php?id=" + id_ + "&cantidad=" + can;
                }
            }
        </script>
        <style>
            .productos{
                margin: auto;
                width: 75%;
                height: auto;
                background-color: #E9967A;
                text-align: center;
                display: flex;
                position: relative;
            }
            .prod{

                width: 275px;
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
            #imagen{
                width: 200px;
                height: 200px;
                border: 5px double #000;
                object-fit: cover;
                object-position: center center;
                float: left;
            }
            .datos{
                width: 280px;
                height: auto;
                text-align: center;
                border: 2px solid #000;
                float: right;

            }
            #desc{
                width: 566px;
                height: auto;
                text-align: center;
                border: 2px solid #000;
                float: right;
            }
            #ver{
                width: 800px;
                height: 500px;
                margin: auto;
                background-color: #FA8072;
            }
        </style>
    </head>

    <body>
        <a href="index.php" style="margin-left: 17%">Regresar</a>
        <br><br>
        <table id="ver">
            <td id="imagen"><a><img src="BackEnd/productos/archivos/<?php echo "$img" ?>" width="100%" align="center" style="border: 2px double #000"></a></td>
            <td class="datos"><h3>Nombre: <?php echo "$nombre" ?></h3></td>
            <td class="datos"><h3>Costo: <?php echo "$$costo" ?></h3></td>
            <td class="datos"><h3>Codigo: <?php echo "$codigo" ?></h3></td>
            <td class="datos"><h3>Stock: <?php echo "$stock" ?></h3></td>
            <td id="desc"><?php echo "$descripcion" ?></td>
            <td class="datos"><input type="number" min="1" max="<?php echo "$stock" ?>" name="cantidad" id="cantidad<?php echo "$i" ?>" placeholder="cantidad" ></td>
            <td class="datos"><input type="button" onClick="add(<?php echo "$id, $i, $stock" ?>);" value="Comprar"></td>
            <br>
        </table>
        <br><br>
        <div><h3 style="text-align: center;">Productos Recomendados</h3><div>
                <table class="productos">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        $productos = ControladorProductos::ctrMostrarProductos(1);
                        
                        $id = $productos["id"];
                        $nombre = $productos["nombre"];
                        $costo = $productos["costo"];
                        $img =$productos["archivo"];
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

                        if ($dat == 4 || $dat == 8) {
                            echo "<tr class=\"barra\"></tr><br>";
                        }
                    }
                    ?>
                </table>
                <?php require "footer.php"; ?>
                </body>
                </html>