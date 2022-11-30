<?php
    include("cnArb.php");
    $id=$_GET["idE"];
    $eliminar = "DELETE FROM Estadios WHERE idEstadios='$id'";

    $result =mysqli_query($conexion,$eliminar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Estadios.php'</script>";
    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>