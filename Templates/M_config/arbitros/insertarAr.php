<?php
    include("cnArb.php");
    $query = "SELECT * FROM Arbitros";
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $nacionalidad = $_POST["nacionalidad"];

    $insertar = "INSERT INTO Arbitros(IdArbitro, NombreArb, Nacionalidad) VALUES ('$id', '$nombre', '$nacionalidad')";
    $result =mysqli_query($conexion,$insertar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Arbitros.php'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>