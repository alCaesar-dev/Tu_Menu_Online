<?php
include("connect.php");  //Incluimos el archivo que contiene la conexion a la base de datos.

$category = str_replace(" ", "_", $_POST['category']);  //Busca espacios en blanco y los remplaza por "_" para no tener errores en la base de datos.

// Verificamos la conexión con el servidor MySQL.
if ($datos_bd->connect_error) {
    die("La coneccion ha fallado: " . $datos_bd->connect_error);
}

// Creamos la tabla usando Lenguaje PHP.
$sql = "CREATE TABLE $category (
id_product INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name_product VARCHAR(50) NOT NULL,
description_product VARCHAR(200) NOT NULL,
price_product INT(50) NOT NULL,
position INT(3) NOT NULL
)";

// Verificamos si la tabla fue creada.
if ($datos_bd->query($sql) === TRUE) {
    header("Location: index.php?ok#form_conteiner");
    
} else {
    echo "Hubo un error al crear la tabla", $category, ":" . $datos_bd->error;
        header("Location: index.php?ok#form_conteiner");
}

// Cerramos la conexión.
$datos_bd->close();

?>