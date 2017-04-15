<?php 

// Parametros a configurar para la conexion de la base de datos 

    $hostdb = "localhost";    // sera el valor de nuestra servidor
    $usuariodb = "root";    // sera el valor de nuestra BD 
    $clavedb = "";    // sera el valor de nuestra BD 
    $basededatos = "datos_peliculas";    // sera el valor de nuestra BD 
    
    $tabla1="peliculas";    // sera el valor de la tabla tipos de productos

    $cadenaConexion = mysqli_connect("$hostdb","$usuariodb","$clavedb","$basededatos");


    if (mysqli_connect_errno())
    {
        echo "Falló la conexion a MySQL: " . mysqli_connect_error();
    }
?>