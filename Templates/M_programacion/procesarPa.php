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
    $actualizar = "UPDATE Partidos SET idPartidos='$id', Grupo='$grupo', Equipo_1='$equipo1', Equipo_2='$equipo2', Arbitro='$arbitro', Estadio='$estadio', Fecha='$fecha', Hora_i='$hora', Hora_f='$horaf' WHERE idPartidos=$id";
    $result =mysqli_query($conexion,$actualizar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Partidos.php'</script>";
    }else{
         echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>