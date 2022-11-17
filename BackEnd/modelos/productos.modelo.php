<?php

require_once "BackEnd/funciones/conecta.php";

class ModeloProductos {
    /* =============================================
      MOSTRAR PRODUCTOS
      ============================================= */

    static public function mdlMostrarProductos($tabla, $limite) {
        switch ($limite) {
            case 1:
                $stmt = conecta::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0 AND stock != 0 ORDER BY rand() LIMIT $limite");

                $stmt->execute();

                return $stmt->fetch();

                $stmt->close();

                $stmt = null;
                ;
            case "":
                $stmt = conecta::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0 AND stock != 0");

                $stmt->execute();

                return $stmt->fetchAll();

                $stmt->close();

                $stmt = null;
                ;
            default:
                $stmt = conecta::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0 AND stock != 0 LIMIT $limite");

                $stmt->execute();

                return $stmt->fetchAll();

                $stmt->close();

                $stmt = null;
        }
        if ($limite != "") {
            
        }
    }

    /* =============================================
      MOSTRAR INFO PRODUCTO
      ============================================= */

    static public function mdlMostrarProductosId($tabla, $item, $valor) {

        $stmt = conecta::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      LISTAR PRODUCTOS
      ============================================= */

    static public function mdlListarProductos($tabla, $ordenar, $item, $valor) {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR BANNER
      ============================================= */

    static public function mdlMostrarContacto($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarDestacado($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR BANNER
      ============================================= */

    static public function mdlMostrarBanner($tabla, $ruta) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      BUSCADOR
      ============================================= */

    static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' "
                . "OR descripcion like '%$busqueda%' OR titular like '%$busqueda%' OR contenido like"
                . " '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      BUSCADOR
      ============================================= */

    static public function mdlListarProductosBusqueda($tabla, $busqueda) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' "
                . "OR descripcion like '%$busqueda%' OR titular like '%$busqueda%' OR contenido like"
                . " '%$busqueda%'");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

}
