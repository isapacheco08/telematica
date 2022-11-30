<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT id_jugador, Nombre_Jugador, Apellido_Jugador, Numero, Equipo FROM Jugadores, Equipos WHERE Equipo_pert=IDdequipo && id_jugador='$id'"
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Arbitros</title>
        <link rel="stylesheet" href="Jugadores.css">
    </head>
    <body>


        <form class="container-table-jd container--edit" action="procesarJd.php" method="post">
            <div class="table-title-jd">Datos de usuario </div>
            <div class="table-header-jd">Nombre</div>
            <div class="table-header-jd">Apellido</div>
            <div class="table-header-jd">Numero</div>
            <div class="table-header-jd">Equipo</div>
            <div class="table-header-jd">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <input type="hidden" class="table-item-jd" value="<?php echo $row["id_jugador"]?>" name="id">
               <input type="text" class="table-item-jd" value="<?php echo $row["Nombre_Jugador"]?>" name="nombre">
               <input type="text" class="table-item-jd" value="<?php echo $row["Apellido_Jugador"]?>" name="apellido">
               <input type="text" class="table-item-jd" value="<?php echo $row["Numero"]?>" name="numero">
               <div class="table-item-jd"><?php echo $row["Equipo"]?></div>

               <?php }?>
               <input type="submit" value="actualizar"  class="container_submit-jd container--actualizar">
            
        </form>
    </body>





</html>












