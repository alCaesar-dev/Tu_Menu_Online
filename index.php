<!DOCTYPE html> 
<head>
    <meta charset="utf-8">
    <title>Carta Online</title>    
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>

<body>    
    <section id="principal_conteiner">        
        <article id="banner">
            <img src="images/pizzeria2.png" style="border-radius: 30px;">
        </article>
        <article id="photo">
            
            <div id="logo">
                <img src="images/pizzeria.png">
            </div>
            <ul id="conteiner_info">
                <li class="button_info">
                    <img src="images/map.svg">
                </li>
                <li class="button_info">
                    <img src="images/telephone.svg">
                </li>
                <li class="button_info" >
                    <img src="images/whatsapp.svg">
                </li>
            </ul>            
        </article>

        <!-- Mostramos las categorias en forma de lista, segun los nombres de las tablas en la base de datos, con sus respectivos elementos.-->
        <ul class="item_conteiner"> 
            <?php
                include("read_tables.php");
                for($i=0;$i<=$count-1;$i++){
            ?>
            <div class="item_class"><p>
                <?php                                              
                    $category2[$i] = str_replace("_", " ", $category[$i]); //Busca "_" y los remplaza por espacios en blanco para mejor estetica.
                    echo $category2[$i];
                ?></p></div>
            <?php 
                include("connect.php");
                $consulta = mysqli_query($datos_bd, "SELECT * FROM  $category[$i] ORDER BY position");                
                while($show_product = mysqli_fetch_assoc($consulta)){                      
            ?>
            
            <li class="box_item">
                <div class="conteiner_text_item">
                    <p class="name_item"><?php echo $show_product['name_product']?></p>
                    <p class="description_item"><?php echo $show_product['description_product']?></p>
                </div>       
                
                <a class = "delete" href="move.php?position=<?php echo $show_product['position']?>&category=<?php echo $category[$i]?>&action=upside">ARRIBA</a>
                <a class = "delete" href="move.php?position=<?php echo $show_product['position']?>&category=<?php echo $category[$i]?>&action=downside">ABAJO</a>
                <a class= "delete" href="delete.php?position=<?php echo $show_product['position'] ?>&category=<?php echo $category[$i]?>">x</a>
                


                <div class="image_item" ><img src="images/pizza3.png" style="width: 100%; height: 100%;"></div> 
                <div class="conteiner_order">
                    <p class="price_item">$<?php echo $show_product['price_product']?></p>
                        <button class="order"> Ordenar + </button></div>  
            </li>
        </ul>  
                <?php } ?> 
                <?php } ?>
        
    </section>      
    
    <section id="form_conteiner">        
        <form action="load_product.php" method="POST">
            <div class="form_tittle">Formulario de carga</div>
           
            <input type="text" class="form" placeholder="Name" name="name">
            <input type="text" class="form" placeholder="Description" name="description" style="height:200px;">
            <input type="number" class="form" placeholder="Price" name="price"> 
            <select name="category" class="form">

            <!--Mostramos las categorias DISPONIBLES SEGUN los nombres de las tablas en la base de datos.-->
            <?php                 
                
                for($i=0;$i<=$count-1;$i++){
                ?>
            <option value="<?php echo $category[$i]?>" class="option"><?php 

            $category2[$i] = str_replace("_"," ", $category[$i]);  //Busca "_" y los remplaza por espacios en blanco para mejor estetica.
            echo $category2[$i];?></option>                
            <?php
                }
            ?>            
             <!----------------->
            </select>                         
            <button type="submit" class="load">CARGAR</button>                                            
        </form>       
       
        <form action="category.php" method="POST">
            <div class="form_tittle">Agregar Categoria</div>
            <input type="text" class="form" placeholder="Category" name="category"> 
            <button type="submit" class="load">CARGAR</button>  
        </form>         

    </section>  
</body>
