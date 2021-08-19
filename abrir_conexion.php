<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "sql300.byethost31.com";    // sera el valor de nuestra BD 
	$basededatos = "b31_29135901_productos";    // sera el valor de nuestra BD 
	$usuariodb = "b31_29135901";    // sera el valor de nuestra BD 
	$clavedb = "melinoegabo2021";    // sera el valor de nuestra BD 

	//Lista de Tablas
	$tabla_db1 = "productos"; 	   // tabla de usuarios
	

	//error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>