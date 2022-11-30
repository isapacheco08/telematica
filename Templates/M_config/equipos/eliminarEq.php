<?php
    include("cnArb.php");
    $id=$_GET["idE"];
    $eliminar = "DELETE FROM Equipos WHERE IDdequipo='$id'";
    $result =mysqli_query($conexion,$eliminar);
    $eliminar2 = "DELETE FROM Equipos2 WHERE IDdequipo='$id'";
    $result2 =mysqli_query($conexion,$eliminar2);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='../equipos/Equipos.php'</script>";
    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>