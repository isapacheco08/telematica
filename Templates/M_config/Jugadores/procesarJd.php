<?php
    include("cnArb.php");
    $id = $_POST["id"];
    $idE= $_POST["idE"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $numero = $_POST["numero"];
    
    $actualizar = "UPDATE Jugadores SET Nombre_Jugador='$nombre', Apellido_Jugador='$apellido', Numero='$numero' WHERE id_jugador='$id'";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='Jugadores.php?idJ=$idE'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>