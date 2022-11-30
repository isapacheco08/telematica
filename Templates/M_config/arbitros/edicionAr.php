<?php
    include("cnArb.php");
    $id=$_GET["id"];
    $query = "SELECT * FROM Arbitros WHERE IdArbitro = '$id'";
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Arbitros</title>
        <link rel="stylesheet" href="arbitros.css">
    </head>
    <body>
        


        <form class="container-table-ar container--edit" action="procesarAr.php" method="post">
            <div class="table-title-ar">Datos de usuario </div>
            <div class="table-header-ar">ID</div>
            <div class="table-header-ar">Nombre</div>
            <div class="table-header-ar">Nacionalidad</div>
            <div class="table-header-ar">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <input type="text" class="table-item-ar" value="<?php echo $row["IdArbitro"]?>" name="id">
               <input type="text" class="table-item-ar" value="<?php echo $row["NombreArb"]?>" name="nombre">
               <select name="nacionalidad" id="nacionalidad" class="container_input-a" value="<?php echo $row["Nacionalidad"]?>">
                <option class="container_input-ar" selected disabled>-- Seleccione --</option>
                    <?php 
                        $query1 = "SELECT * From  Paises";
                        $result1 =mysqli_query($conexion, $query1);
                         while($row=mysqli_fetch_assoc($result1)){
                             $idi= $row['Idpais'];
                             $pais=$row['Pais'];
                             echo "<option value=$idi>$pais</option>";
                             }
                    ?>
                </select>

               <?php }?>
               <input type="submit" value="actualizar"  class="container_submit-ar container--actualizar">
            
        </form>
    </body>





</html>






















