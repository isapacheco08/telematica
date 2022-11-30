<?php
    include("cnArb.php");
    $id=$_GET["idE"];
    $eliminar = "DELETE FROM Jugadores WHERE id_jugador='$id'";
    $query = "SELECT IDdequipo FROM Jugadores, Equipos WHERE Equipo_pert=IDdequipo && id_jugador='$id'";
    $resultado =mysqli_query($conexion,$query);
    $result =mysqli_query($conexion,$eliminar);
    while($row=mysqli_fetch_assoc($resultado)){
        $idE=$row["IDdequipo"];

    }

    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='Jugadores.php?idJ=$idE'</script>";
    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>