<?php
    include("cnArb.php");
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $nacionalidad = $_POST["nacionalidad"];
    $actualizar = "UPDATE Arbitros SET IdArbitro='$id', NombreArb='$nombre', Nacionalidad='$nacionalidad' WHERE IdArbitro=$id";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Arbitros.php'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>