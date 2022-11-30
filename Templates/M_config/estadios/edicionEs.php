<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT * FROM Estadios WHERE idEstadios= '$id'";
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Estadio</title>
        <link rel="stylesheet" href="Estadios.css">
    </head>
    <body>


        <form class="container-table-es container--edit" action="procesarEs.php" method="post">
            <div class="table-title-es">Datos de usuario </div>
            <div class="table-header-es">Nombre</div>
            <div class="table-header-es">Capacidad</div>
            <div class="table-header-es">Ubicación</div>
            <div class="table-header-es">Imagen</div>
            <div class="table-header-es">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <input type="text" class="table-item-es" value="<?php echo $row["Nombre_est"]?>" name="nombre">
               <input type="text" class="table-item-es" value="<?php echo $row["Capacidad"]?>" name="capacidad">
               <input type="text" class="table-item-es" value="<?php echo $row["Ubicacion"]?>" name="ubicacion">
               <input type="text" class="table-item-es" value="<?php echo $row["Imagen"]?>" name="imagen">
               <input type="hidden" class="table-item-es" value="<?php echo $row["idEstadios"]?>" name="id">

               <?php }?>
               <input type="submit" value="actualizar"  class="container_submit-es container--actualizar">
            
        </form>
    </body>





</html>












