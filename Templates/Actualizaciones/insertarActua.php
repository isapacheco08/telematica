<?php

    include("cnArb.php");
    $idP=$_POST["idP"];
    $equipo = $_POST["equipo"];
    $evento = $_POST["evento"];
    $minuto = $_POST["minuto"];

    echo $evento;
 
  

    $insertar = "INSERT INTO Actualizacion(Partido, Evento, Equipo, Tiempo) VALUES ('$idP', '$evento', '$equipo', '$minuto')";
    $result =mysqli_query($conexion,$insertar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='ActualizacionesConfig.php?idp=$idP'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>