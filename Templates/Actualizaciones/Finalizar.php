<?php
    include("cnArb.php");
    $time = $_POST["time"];
    $id=$_POST["idP"];
    $actualizar = "UPDATE Partidos SET Hora_f='$time' WHERE idPartidos='$id'";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='../M_programacion/Partidos.php'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  