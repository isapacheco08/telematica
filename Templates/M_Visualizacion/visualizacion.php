<?php
    include("cnArb.php");
    $query = "SELECT  idPartidos,e1.IDdequipo as idequipo1, e1.Equipo as Equipo_1, e2.IDdequipo as idequipo2, e2.Equipo as Equipo_2, e1.Logo as Logo1, e2.Logo as Logo2, g.Grupo, NombreArb, Nombre_est, Fecha, Hora_i, Hora_f
    FROM Equipos e1, Equipos2 e2, Grupos g, Arbitros, Estadios, Partidos p
    WHERE e1.IDdequipo=Equipo_1 && e2.IDdequipo=Equipo_2 && idGrupos=p.Grupo && IdArbitro=Arbitro && idEstadios=Estadio";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>World cup 2022</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="stylevisualización.css" />
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
                            <a href="./visualizacion.php" class="btn-outline ">Partidos del dia</a>
                        </li>
                        <li class="nav_list">
                            <a href="../Actualizaciones/tabla.php" class="btn-outline">Tabla de posiciones</a>
                        </li>
                        <li class="nav_list">
                            <a href="../../index.html" class="btn-outline" target="_matches">Logout</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
    </header>
    <h2>Partidos</h2>
    <div class="container">
       <div class="matchs" id="match-date">

       <?php 
        $result =mysqli_query($conexion, $query);

        

        while($row=mysqli_fetch_assoc($result)){ 
            date_default_timezone_set("America/Bogota");
            $fechaActual = date('Y-m-d');
           
            $time = time();
            $time= date("H:i:s", $time);
            if($row["Fecha"]==$fechaActual){

            
            ?>
           <div class="match">
           <div class="match-info">
               <h4 class="group"><?php echo $row["Grupo"]?></h4>
               <h4><span class="badge"><?php echo $row["idPartidos"]?></span> </h4>
           </div>
           <div class="flags">
               <div class="home-flag">
                   <img src="<?php echo $row["Logo1"]?>" alt="<?php echo $row["Equipo_1"]?>" class="flag">
               <h3 class="home-team"><?php echo $row["Equipo_1"]?></h3>
               </div>



               <?php 
               if($row["Hora_i"]<$time){
                ?>
               <a class="vs" href="../Actualizaciones/Actualizaciones.php?id=<?php echo $row["idPartidos"]?>">VS</a>
                <?php
               }else{
                ?>
                <h3 class="vs">VS</h3>
                <?php
               }?>






               <div class="away-flag">
               <img src="<?php echo $row["Logo2"]?>" alt="<?php echo $row["Equipo_2"]?>" class="flag">
               <h3 class="home-team"><?php echo $row["Equipo_2"]?></h3>
               </div>
           </div>
           <div class="time-area">
               <div class="time">
                   <?php ?>
                   <h4 class="date"><?php echo $row["Fecha"]?></h4>
               </div>
        <?php 

            
                $eq1=$row["idequipo1"];
                $eq2=$row["idequipo2"];
                $idpar=$row["idPartidos"];
                $query2 = "SELECT q.Equipo, e.Evento, COUNT(*) as goles1
                FROM Actualizacion a, Partidos p , Eventos e, Equipos q
                WHERE a.Partido='$idpar' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo && a.Evento=4 && a.Equipo='$eq1'
                GROUP BY a.Evento	
                HAVING COUNT(*)";
                $query3 = "SELECT q.Equipo, e.Evento, COUNT(*) as goles2
                FROM Actualizacion a, Partidos p , Eventos e, Equipos q
                WHERE a.Partido='$idpar' && idPartidos=a.Partido && idEventos=a.Evento && IDdequipo=a.Equipo && a.Evento=4 && a.Equipo='$eq2'
                GROUP BY a.Evento	
                HAVING COUNT(*)";
                $result2 =mysqli_query($conexion, $query2);
                $result3 =mysqli_query($conexion, $query3);
                $goles1=0;
                $goles2=0;
              
                while($row2=mysqli_fetch_assoc($result2)){   
                    $goles1=$row2["goles1"];
                
                }
                while($row3=mysqli_fetch_assoc($result3)){   
                    $goles2=$row3["goles2"];
                
                }
            if($row["Hora_f"]<$time){ ?>
                <h1><?php echo $goles1 ?>-<?php echo $goles2 ?></h1>

                <?php 
            }else if($row["Hora_i"]>$time){
                ?>
                <h4>Proximamente</h4>

                <?php 

            }else if($row["Hora_i"]<$time && $row["Hora_f"]>$time ){
                ?>
                <h1><?php echo $goles1 ?>-<?php echo $goles2 ?></h1>
                
                <h4 class="group"> En linea</h4>
                
                
                <?php

            }
            
            
            
            
            
            ?>
               
               <h3 class="match-time"><?php echo $row["Hora_i"]?></h3>
           </div>
        </div>  
        <?php }}?>
    
    
     </div>
  </div>
    
    
    
    
</body>

</html>