<?php
    include("cnArb.php");
    $query = "SELECT * FROM Equipos";
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $entrenador= $_POST["entrenador"];
    $logo = $_POST["logo"];
    $Grupo = $_POST["grupo"];

    $insertar = "INSERT INTO Equipos(IDdequipo, Equipo, Entrenador, Logo, Grupo) VALUES ('$id', '$nombre', '$entrenador', '$logo', '$Grupo')";
    $result =mysqli_query($conexion,$insertar);
    $insertar2 = "INSERT INTO Equipos2(IDdequipo, Equipo, Entrenador, Logo, Grupo) VALUES ('$id', '$nombre', '$entrenador', '$logo', '$Grupo')";
    $result2 =mysqli_query($conexion,$insertar2);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Equipos.php'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>