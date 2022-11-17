<?php
require_once "BackEnd/controladores/productos.controlador.php";
require_once "BackEnd/modelos/productos.modelo.php";

require "menu.php";
?>

<html>
    <head>
        <title>Productos</title>
        <script src="BackEnd/JS/jquery-3.3.1.min.js" ></script>
        <script>
            function add(id_, i, stock) {

                var can = $('#cantidad' + i).val();

                if (can > stock || can == '') {
                    alert('Esta cantidad no es valida');
                } else {
                    window.location.href = "agregaCarrito.php?id=" + id_ + "&cantidad=" + can;
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
            <?php
            $prod = ControladorProductos::ctrMostrarProductos("");
            foreach ($prod as $key => $value) {
                echo'<td class="prod">
                    <a><img src="BackEnd/productos/archivos/'  . $value["archivo"] . '" width="100" style="border: 2px double #000"></a>
                    <h3><a href="ver.php?id='  . $value["id"] . '">'  . $value["nombre"] . '</a></h3>
                    <h3>'  . $value["costo"] . '</h3>
                    <input  type="number" min="1" max="'  . $value["stock"] . '" name="cantidad" id="cantidad'  . $key . '" placeholder="cantidad" >
                    <input type="button" onClick="add('  . $value["id"] . ', '  . $key . ', '  . $value["stock"] . ');" value="Comprar">
                    <br>
                </td>';

                $dat = 0;
                $dat = $key + 1;

                if ($dat == 4 || $dat == 8 || $dat == 12) {
                    echo "<tr class=\"barra\"></tr><br>";
                }
            }
            ?>
        </table>	
        <?php require "footer.php"; ?>
    </body>
</html>