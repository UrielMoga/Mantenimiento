<?php

require_once "BackEnd/funciones/conecta.php";

class ModeloSlide{
    
    static public function mdlMostrarBanner($tabla){
        
        $stmt = conecta::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0 ORDER BY rand() LIMIT 1");
        
        $stmt -> execute();
        
        return $stmt -> fetch();
        
        $stmt -> close();
        
        $stmt = null;
                
    }
    
}
