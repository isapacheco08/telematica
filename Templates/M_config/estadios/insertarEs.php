<?php
    include("cnArb.php");
    $nombre = $_POST["nombre"];
    $capacidad= $_POST["capacidad"];
    $ubicacion = $_POST["ubicacion"];
    $imagen = $_POST["imagen"];

    $insertar = "INSERT INTO Estadios(Nombre_est, Capacidad, Ubicacion, Imagen) VALUES ('$nombre', '$capacidad', '$ubicacion', '$imagen')";
    $result =mysqli_query($conexion,$insertar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Estadios.php'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>