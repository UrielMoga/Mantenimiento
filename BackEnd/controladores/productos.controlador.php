<?php

class ControladorProductos {

    /* =============================================
      MOSTRAR PRODUCTOS
      ============================================= */

    static public function ctrMostrarProductos($limite) {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $limite);

        return $respuesta;
    }

    /* =============================================
      MOSTRAR INFO PRODUCTO
      ============================================= */

        static public function ctrMostrarProductosId($item, $valor) {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductosId($tabla, $item, $valor);

        return $respuesta;
    }

    
    static public function ctrMostrarInfoNoticia($item, $valor) {

        $tabla = "noticia";

        $respuesta = ModeloProductos::mdlMostrarInfoNoticias($tabla, $item, $valor);

        return $respuesta;
    }

    /* =============================================
      LISTAR PRODUCTOS
      ============================================= */

    static public function ctrListarProductos($ordenar, $item, $valor) {

        $tabla = "noticia";

        $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

        return $respuesta;
    }
    
        static public function ctrListarArt($ordenar, $item, $valor) {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

        return $respuesta;
    }
     /* =============================================
      MOSTRAR Contacto
      ============================================= */

    static public function ctrMostrarContacto() {

        $tabla = "empresa";

        $respuesta = ModeloProductos::mdlMostrarContacto($tabla);

        return $respuesta;
    }
    
    /* =============================================
      MOSTRAR CATEGORÍAS
      ============================================= */

    static public function ctrMostrarBannerDestacado() {

        $tabla = "destacado";

        $respuesta = ModeloProductos::mdlMostrarDestacado($tabla);

        return $respuesta;
    }

    /* =============================================
      MOSTRAR CATEGORÍAS
      ============================================= */

    static public function ctrMostrarBanner($ruta) {

        $tabla = "banner";

        $respuesta = ModeloProductos::mdlMostrarBanner($tabla, $ruta);

        return $respuesta;
    }
    /* =============================================
      BUSCADOR
      ============================================= */
    static public function ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope){
        
        $tabla = "productos";
        
        $respuesta = ModeloProductos::mdlBuscarProductos($tabla,$busqueda, $ordenar, $modo, $base, $tope);
        
        return $respuesta;
        
    }

    /* =============================================
      LISTAR PRODUCTOS BUSQUEDA
      ============================================= */
    static public function ctrListarProductosBusqueda($busqueda){
        
        $tabla = "productos";
        
        $respuesta = ModeloProductos::mdlListarProductosBusqueda($tabla,$busqueda);
        
        return $respuesta;
        
    }
    
    /* =============================================
      AUMENTAR VISTAS
      ============================================= */
    static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2){
        
        $tabla = "productos";
        
        $respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);
        
        return $respuesta;
        
    }
}
