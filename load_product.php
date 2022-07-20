<?php
   
    $name_product = $_POST['name'];
    $description_product = $_POST['description'];
    $price_product = $_POST['price'];    
    $category = $_POST['category'];  
      
    
    include("connect.php");    

   //Si se puede asignar un valor a $table (Y es porque existe al menos un registro), se ejecuta la consiga SQL, se le suma una posicion, y se pasa a otro array para poder//
   //ingresarlo a la base de datos.       
   
    if($table=mysqli_fetch_assoc(mysqli_query($datos_bd, "SELECT position FROM $category ORDER BY position DESC LIMIT 1"))){              
        $table['position']++;
        $position[0]=$table['position'];             
    }else{
        $position[0]=1;
    }
    mysqli_query($datos_bd, "INSERT INTO $category VALUES('$id_product','$name_product', '$description_product', '$price_product', '$position[0]')");
    header("Location: index.php");
    
    
?>