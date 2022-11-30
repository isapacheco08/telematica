<?php
    include("cnArb.php");
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];
    $ubicacion = $_POST["ubicacion"];
    $imagen = $_POST["imagen"];
    $actualizar = "UPDATE Estadios SET Nombre_est='$nombre', Capacidad='$capacidad', Ubicacion='$ubicacion', Imagen='$imagen'  WHERE idEstadios='$id'";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Estadios.php'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>