<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT idActualizaciones, q.Equipo,e.Evento, Tiempo 
    FROM Actualizacion a, Partidos p , Eventos e, Equipos q
    WHERE Partido='$id' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo
    ORDER BY Tiempo";
    
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Actualizacion</title>
        <link rel="stylesheet" href="Actualizar.css">
        <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
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
        

        <div class="container-table-pa">
            <div class="table-title-pa">Minuto A minuto </div>
            <div class="table-header-pa">Equipo</div>
            <div class="table-header-pa">Evento</div>
            <div class="table-header-pa">Minuto</div>
            <?php 
            $result =mysqli_query($conexion, $query);
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-pa"><?php echo $row["Equipo"]?></div>
               <div class="table-item-pa"><?php echo $row["Evento"]?></div>
               <div class="table-item-pa"><?php echo $row["Tiempo"]?></div>
               
               <?php }?>
            
        </div>
    
        

    
    </body>

</html>
