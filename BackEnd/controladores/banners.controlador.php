<?php

class ControladorSlide{
    
    public function ctrMostrarSlide(){
        
        $tabla = "banners";
        
        $respuesta= ModeloSlide::mdlMostrarBanner($tabla);
        
        return $respuesta;
        
    }
    
}