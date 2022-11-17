<?php
class conecta {
	public static function conecta(){
        $u54 = "root";
        $u55 = "root";
        $con = new PDO("mysql:host=localhost;dbname=clientes01", $u54, $u55, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $con;
	}
}
?>