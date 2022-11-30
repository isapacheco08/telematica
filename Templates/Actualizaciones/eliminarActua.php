<?php
    include("cnArb.php");
    $id=$_GET["idE"];
    $eliminar = "DELETE FROM Actualizacion WHERE idActualizaciones='$id'";
    $query = "SELECT Partido FROM Actualizacion WHERE idActualizaciones='$id'";
    $resultado =mysqli_query($conexion,$query);
    $result =mysqli_query($conexion,$eliminar);
    while($row=mysqli_fetch_assoc($resultado)){
        $idE=$row["Partido"];
    }

    $result =mysqli_query($conexion,$eliminar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='ActualizacionesConfig.php?idp=$idE'</script>";
    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>