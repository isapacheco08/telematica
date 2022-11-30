<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT * FROM Equipos WHERE IDdequipo= '$id'";
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Arbitros</title>
        <link rel="stylesheet" href="equipos.css">
    </head>
    <body>


        <form class="container-table-eq container--edit" action="procesar.php" method="post">
            <div class="table-title-eq">Datos de usuario </div>
            <div class="table-header">ID</div>
            <div class="table-header">Nombre</div>
            <div class="table-header">Entrenador</div>
            <div class="table-header">Logo</div>
            <div class="table-header">Grupo</div>
            <div class="table-header">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <input type="text" class="table-item" value="<?php echo $row["IDdequipo"]?>" name="id">
               <input type="text" class="table-item" value="<?php echo $row["Equipo"]?>" name="nombre">
               <input type="text" class="table-item" value="<?php echo $row["Entrenador"]?>" name="entrenador">
               <input type="text" class="table-item" value="<?php echo $row["Logo"]?>" name="logo">
               <input type="text" class="table-item" value="<?php echo $row["Grupo"]?>" name="grupo">

               <?php }?>
               <input type="submit" value="actualizar"  class="container_submit container--actualizar">
            
        </form>
    </body>





</html>












