<?php
//Para editar las posiciones de los items en la lista, decidi almacenarlas en la base de datos, y que segun para donde se quiera mover, se edite su numero de posicion.


include("connect.php");

$category= $_GET['category'];
$position = $_GET['position'];
$action = $_GET['action'];

$sql = "SELECT position FROM  $category WHERE position = $position ";
$result = mysqli_query($datos_bd, $sql);

//Contamos cuantos elementos tiene la categoria por si se acciona el boton de bajar el ultimo elemento, no siga editando su numero de posicion y desacomode el codigo.
$i=0;
$count=0;
$order = mysqli_query($datos_bd, "SELECT * from $category");
while($table=mysqli_fetch_assoc($order)){    
    $count++;
}
 

//Usamos un switch para comparar la $action recibida por el GET y ejecutamos el cambio de posicionamiento.
switch($action){
    case "upside":
        if($position!=1){
            $sql="UPDATE $category SET position=99 WHERE position = $position-1";
            $result = mysqli_query($datos_bd,$sql);
            $sql="UPDATE $category SET position=$position-1 WHERE position = $position";        
            $result = mysqli_query($datos_bd,$sql);
            $sql="UPDATE $category SET position=$position WHERE position = 99";        
            $result = mysqli_query($datos_bd,$sql);
            break;
            
        }
        else{
            header("Location: index.php");
            break;
        }
    case "downside":
        if($position<$count){
            $sql="UPDATE $category SET position=99 WHERE position = $position+1";
            $result = mysqli_query($datos_bd,$sql);
            $sql="UPDATE $category SET position=$position+1 WHERE position = $position";        
            $result = mysqli_query($datos_bd,$sql);
            $sql="UPDATE $category SET position=$position WHERE position = 99";        
            $result = mysqli_query($datos_bd,$sql);
            break;
        }
        else{
            header("Location: index.php");
            break;
        }
    }
header("Location: index.php");

?>


