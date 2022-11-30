<?php
    include("cnArb.php");
    $id=$_GET["idE"];
    $eliminar = "DELETE FROM Arbitros WHERE IdArbitro='$id'";

    $result =mysqli_query($conexion,$eliminar);
    if($result){
        echo "<script>alert('Se ha registrado con exito');
        window.location='./Arbitros.php'</script>";
    }else{
        echo "<script>alert('No se pudo registar');window.history.go(-1);<script>";
    }  
    
?>