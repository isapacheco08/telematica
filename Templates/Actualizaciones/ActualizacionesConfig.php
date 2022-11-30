<?php
    include("cnArb.php");
    $id=$_GET["idp"];
    $query = "SELECT idActualizaciones, q.Equipo,e.Evento, Tiempo
    FROM Actualizacion a, Partidos p , Eventos e, Equipos q
    WHERE Partido='$id' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo
    ORDER BY Tiempo";
    date_default_timezone_set("America/Bogota");
    $time = time();
    $time= date("H:i:s", $time);
    
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
        <div class="container-add-pa">
            <h2 class="container-tilte-pa"> Agregar Actualizacion</h2>
            <form action="insertarActua.php" method="post" class="container__form-pa">
                <label for="" class="container_label-pa">Equipo</label>
                <select name="equipo" id="equipo" class="container_input-pa" >
                <option class="container_input-ar" selected disabled>-- Seleccione --</option>
                <?php 
                    $query1 = "SELECT IDdequipo, Equipo
                    FROM Equipos, Partidos
                    WHERE idPartidos=$id && (IDdequipo=Equipo_1 || IDdequipo=Equipo_2)";
                    $result1 =mysqli_query($conexion, $query1);
                     while($row=mysqli_fetch_assoc($result1)){
                         $idi= $row['IDdequipo'];
                         $grupo=$row['Equipo'];
                         echo "<option value=$idi>$grupo</option>";
                         }
                ?>
                </select>
                <label for="" class="container_label-pa">Evento</label>
                <select name="evento" id="evento" class="container_input-pa" >
                <option class="container_input-ar" selected disabled>-- Seleccione --</option>
                <?php
                
                    $query2 = "SELECT * FROM Eventos";
                    $result2 =mysqli_query($conexion, $query2);
                     while($row2=mysqli_fetch_assoc($result2)){
                         $idi= $row2['idEventos'];
                         $evento=$row2['Evento'];
                         echo "<option value=$idi>$evento</option>";
                         }
                ?>
                </select>
                <input type="hidden" class="table-item-jd" value="<?php echo $id ?>" name="idP">
                <label for="" class="container_label-pa">Minuto</label>
                <input name="minuto" type="text" class="container_input-jd">
                <input class="container_submit-pa" type="submit" value="agregar">
            </form>
            <form action="Finalizar.php" method="post" class="container__form-pa1">
                <input type="hidden" class="table-item-jd" value="<?php echo $id ?>" name="idP">
                <input type="hidden" class="table-item-jd" value="<?php echo $time ?>" name="time">
                <input class="container_submit-pa" type="submit" value="Finalizar">
            </form>
        </div>

        <div class="container-table-pa-config">
            <div class="table-title-pa-config">Minuto A minuto </div>
            <div class="table-header-pa">Equipo</div>
            <div class="table-header-pa">Evento</div>
            <div class="table-header-pa">Minuto</div>
            <div class="table-header-pa">Operaciones</div>
            <?php 
            $result =mysqli_query($conexion, $query);
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-pa"><?php echo $row["Equipo"]?></div>
               <div class="table-item-pa"><?php echo $row["Evento"]?></div>
               <div class="table-item-pa"><?php echo $row["Tiempo"]?></div>
               <div class="table_item-pa">
                   
                    <a href="./eliminarActua.php?idE=<?php echo $row["idActualizaciones"]?>" class="table_item_link-pa">Eliminar</a>
               </div>
               <?php }?>
            
        </div>
    
        

    
    </body>

</html>
