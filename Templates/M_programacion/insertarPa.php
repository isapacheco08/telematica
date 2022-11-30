<?php

    include("cnArb.php");
    $id = $_POST["id"];
    $grupo = $_POST["grupo"];
    $equipo1 = $_POST["equipo1"];
    $equipo2 = $_POST["equipo2"];
    $arbitro = $_POST["arbitro"];
    $estadio = $_POST["estadio"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["horai"];
    $horaf=strtotime('+ 2 hour', strtotime($hora));
    $horaf= date("H:i:s", $horaf);
    
 
  

    $insertar = "INSERT INTO Partidos(idPartidos, Grupo, Equipo_1, Equipo_2, Arbitro, Estadio, Fecha, Hora_i, Hora_f) VALUES ('$id', '$grupo', '$equipo1', '$equipo2', '$arbitro', '$estadio', '$fecha', '$hora', '$horaf')";
    $result =mysqli_query($conexion,$insertar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Partidos.php'</script>";


    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }
?>