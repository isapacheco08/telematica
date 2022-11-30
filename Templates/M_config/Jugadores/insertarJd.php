<?php
    include("cnArb.php");
    $id=$_POST["idE"];
    $nombre = $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $numero = $_POST["numero"];
    $insertar = "INSERT INTO Jugadores(Nombre_Jugador, Apellido_Jugador, Numero, Equipo_pert) VALUES ('$nombre', '$apellido', '$numero', '$id')";
    $result =mysqli_query($conexion,$insertar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='Jugadores.php?idJ=$id'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>