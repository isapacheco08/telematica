<?php

    date_default_timezone_set("America/Bogota");
    $time = time();
    $time= date("H:i:s", $time);
    $fechaActual = date('Y-m-d');
    include("cnArb.php");
    error_reporting(E_ERROR | E_PARSE);
    
    
    
    
    $borrardatos = "UPDATE Tabla_p SET Puntos=0";
    $result=mysqli_query($conexion,$borrardatos);
    $query2 = "SELECT  idPartidos,e1.IDdequipo as idequipo1, e2.IDdequipo as idequipo2, Fecha, Hora_i, Hora_f
    FROM Equipos e1, Equipos2 e2, Grupos g, Arbitros, Estadios, Partidos p
    WHERE e1.IDdequipo=Equipo_1 && e2.IDdequipo=Equipo_2 && idGrupos=p.Grupo && IdArbitro=Arbitro && idEstadios=Estadio";

    $result2 =mysqli_query($conexion, $query2);
    while($row2=mysqli_fetch_assoc($result2)){
            $eq1=$row2["idequipo1"];
            $eq2=$row2["idequipo2"];
            $idpar=$row2["idPartidos"];
            $query3 = "SELECT q.Equipo, e.Evento, COUNT(*) as goles1
            FROM Actualizacion a, Partidos p , Eventos e, Equipos q
            WHERE a.Partido='$idpar' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo && a.Evento=4 && a.Equipo='$eq1'
            GROUP BY a.Evento	
            HAVING COUNT(*)";
            $query4 = "SELECT q.Equipo, e.Evento, COUNT(*) as goles2
            FROM Actualizacion a, Partidos p , Eventos e, Equipos q
            WHERE a.Partido='$idpar' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo && a.Evento=4 && a.Equipo='$eq2'
            GROUP BY a.Evento	
            HAVING COUNT(*)";
            $result3 =mysqli_query($conexion, $query3);
            $result4 =mysqli_query($conexion, $query4);
            $goles1=0;
            $goles2=0;
        if($fechaActual>$row2["Fecha"] || ($fechaActual==$row2["Fecha"] && $time>$row2["Hora_i"])){
            while($row3=mysqli_fetch_assoc($result3)){   
                $goles1=$row3["goles1"];
            }
            while($row4=mysqli_fetch_assoc($result4)){   
                $goles2=$row4["goles2"];
            }
            if($goles1>$goles2){
                $actualizar = "UPDATE Tabla_p SET Puntos=Puntos+3 WHERE IDdequipo=$eq1";
                
            }
            if($goles1<$goles2){
                $actualizar = "UPDATE Tabla_p SET Puntos=Puntos+3 WHERE IDdequipo=$eq2";
                
            }
            if($goles1==$goles2){
                $actualizar = "UPDATE Tabla_p SET Puntos=Puntos+1 WHERE IDdequipo=$eq1 || IDdequipo=$eq2";
                
            }
            $result5 =mysqli_query($conexion,$actualizar);
        }
    }

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
    <form action="tabla.php" method="post" class="container__form">
        <select name="grupo" id="grupo" class="container_input-pa" >
            <?php 
             $query1 = "SELECT * From  Grupos";
             $result1 =mysqli_query($conexion, $query1);
              while($row=mysqli_fetch_assoc($result1)){
                  $idi= $row['idGrupos'];
                  $grupo=$row['Grupo'];
                  echo "<option value=$idi>$grupo</option>";
              }
            ?>
        </select>
        <input class="container_submit-pa" type="submit" value="Buscar">
   </form>
        <?php
        $idE=1;
        if($_POST['grupo']){
            $idE=$_POST['grupo'];   
        }
        $query = "SELECT e.Equipo, Puntos
        FROM Tabla_p t, Equipos e
        WHERE e.IDdequipo=t.IDdequipo && Grupo=$idE
        ORDER BY Puntos desc";
        ?>
        <div class="container-table-pa-position">
            <div class="table-title-pa-position">Tabla de posiciones </div>
            <div class="table-header-pa">Grupo <?php echo $idE?></div>
            <div class="table-header-pa">Puntos</div>
            <?php 
            $result =mysqli_query($conexion, $query);
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item-pa"><?php echo $row["Equipo"]?></div>
               <div class="table-item-pa"><?php echo $row["Puntos"]?></div>
            
               
               <?php }?>
            
        </div>
    
        

    
    </body>

</html>