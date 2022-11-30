<?php
    include("cnArb.php");
    $idJ=$_GET["idJ"];
    $query = "SELECT id_jugador, Nombre_Jugador, Apellido_Jugador, Numero, Logo FROM Jugadores, Equipos WHERE Equipo_pert=IDdequipo && Equipo_pert='$idJ'";

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Jugadores</title>
        <link rel="stylesheet" href="./Jugadores.css">
    </head>
    <body>
    <header class="header">
            <div class="container1">
                <nav class="navigation">
                    <a href="index.html" class="logo">
                        <img src="../../../images/logo.svg" alt="Logo" class="logo-img" />
                    </a>
                    <div class="mobile-menu-icon">
                        <ion-icon name="menu-outline" class="menu_icon"></ion-icon>
                    </div>
                    <ul class="nav_menu">

                        <li class="nav_list">
                            <a href="../../index.html" class="btn-outline" target="_matches">Logout</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
    </header>
        <div class="container-add-jd">
            <h2 class="container-tilte-jd"> Agregar Equipos</h2>
            <form action="./insertarJd.php" method="post" class="container__form-jd">
                <label for="" class="container_label-jd">Nombre</label>
                <input name="nombre" type="text" class="container_input-jd">
                <label for="" class="container_label-jd">Apellido</label>
                <input name="apellido" type="text" class="container_input-jd">
                <label for="" class="container_label-jd">Numero</label>
                <input name="numero" type="text" class="container_input-jd">
                <input type="hidden" class="table-item-jd" value="<?php echo $idJ ?>" name="idE">

                <input class="container_submit-jd" type="submit" value="agregar">
            </form>

        </div>

        <div class="container-table-jd">
            <div class="table-title-jd">Jugadores</div>
            <div class="table-header-jd">Nombre</div>
            <div class="table-header-jd">Apellido</div>
            <div class="table-header-jd">Numero</div>
            <div class="table-header-jd">Logo</div>
            <div class="table-header-jd">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-jd"><?php echo $row["Nombre_Jugador"]?></div>
               <div class="table-item-jd"><?php echo $row["Apellido_Jugador"]?></div>
               <div class="table-item-jd"><?php echo $row["Numero"]?></div>
               <div><img src="<?php echo $row["Logo"]?>" alt="logo" width="40"></div>
               <div class="table_item">
                    <a href="./edicionJd.php?id=<?php echo $row["id_jugador"]?> ?>" class="table_item_link-jd">Editar</a>
                    <a href="./eliminarJd.php?idE=<?php echo $row["id_jugador"]?> ?>" class=#table_item_link-jd>Eliminar</a>
               </div>
               <?php }?>
            
        </div>
    </body>





</html>












