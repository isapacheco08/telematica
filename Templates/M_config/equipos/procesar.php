<?php
    include("cnArb.php");
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $entrenador = $_POST["entrenador"];
    $logo = $_POST["logo"];
    $grupo = $_POST["grupo"];
    $actualizar = "UPDATE Equipos SET IDdequipo='$id', Equipo='$nombre', Entrenador='$entrenador', Logo='$logo', Grupo='$grupo' WHERE IDdequipo='$id'";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Equipos.php'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>