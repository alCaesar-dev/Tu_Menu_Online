<?php
    //En este archivo vamos a leer y contar la cantidad de tablas, no su contenido en si.
    include("connect.php");  //Incluimos el archivo de conexion.
    $sql = "SHOW TABLES";
    $count=0;       
    $i=0; //Inicializamos variables.
    $result = mysqli_query($datos_bd, $sql); // Ejecutamos la accion y la almacenamos en una variable.  
    while($table = mysqli_fetch_array($result)) { // Mientras haya tablas para contar se va a ejecutar el siguiente codigo.          
        $category[$count] = $table[0];             
        $count++;   //Asigna cada string a una posicion del array, y usamos el contador para determinar la cantidad de elementoss. 
    }  
?>