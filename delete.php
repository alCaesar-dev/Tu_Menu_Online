    <?php  
    //Para eliminar un registro a traves de un boton, se reciben los datos del elemento en cuestion a traves de GET, para luego usarlos como variables e incluirlos en el codigo SQL.
    include('connect.php');   


    //Contamos la cantidad de elementos dentro de la categoria, para luego editar las que estan por debajo, para que no quede un espacio entre registros.
    
 
  
    $count=0;
    $position=$_GET['position'];   
    $category=$_GET['category'];      
    $action= $_GET['action']; 
    
    switch($action){
        case "class":
            mysqli_query($datos_bd, "DROP TABLE $category");
            header("Location: index.php");
            break;
        
        case "item":
            $eliminar="DELETE FROM $category WHERE position = '$position'";
            $elimina = $datos_bd->query($eliminar);
            break;
    }   
 

//EALTA ARREGLAR LO DE MAPEAR LAS POSICIONES AL ELIMINAR

header("Location: index.php");
    $datos_bd->close();    
        ?>

