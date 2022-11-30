<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT * FROM Partidos WHERE idPartidos = '$id'";
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Arbitros</title>
        <link rel="stylesheet" href="Partidos.css">
    </head>
    <body>
    <header class="header">
            <div class="container1">
                <nav class="navigation">
                    <a href="index.html" class="logo">
                        <img src="../../images/logo.svg" alt="Logo" class="logo-img" />
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

        <form class="container-table-pa container--edit" action="procesarPa.php" method="post">
            <div class="table-title-pa">Datos de Partidos </div>
            <div class="table-header-pa">ID</div>
            <div class="table-header-pa">Equipo 1</div>
            <div class="table-header-pa">Equipo 2</div>
            <div class="table-header-pa">Grupo</div>
            <div class="table-header-pa">Arbitro</div>
            <div class="table-header-pa">Estadio</div>
            <div class="table-header-pa">Fecha</div>
            <div class="table-header-pa">Hora Inical</div>
            <div class="table-header-pa">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
                <input type="text" class="table_input-pa" value="<?php echo $row["idPartidos"]?>" name="id">
                <input type="text" class="table_input-pa" value="<?php echo $row["Equipo_1"]?>" name="equipo1">
                <input type="text" class="table_input-pa" value="<?php echo $row["Equipo_2"]?>" name="equipo2">
                <input type="text" class="table_input-pa" value="<?php echo $row["Grupo"]?>" name="grupo">
                <input type="text" class="table_input-pa" value="<?php echo $row["Arbitro"]?>" name="arbitro">
                <input type="text" class="table_input-pa" value="<?php echo $row["Estadio"]?>" name="estadio">
                <input type="date" class="table_input-pa" value="<?php echo $row["Fecha"]?>" name="fecha">
                <input type="time" class="table_input-pa" value="<?php echo $row["Hora_i"]?>" name="horai">

               <?php }?>
               <input type="submit" value="actualizar"  class="container_submit-pa container--actualizar">
            
        </form>
    </body>





</html>












