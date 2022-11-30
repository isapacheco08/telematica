<?php
    include("cnArb.php");
    $grupo=$_POST['grupos'];

    $query="SELECT IDdequipo, Equipo FROM Equipos e, Grupos WHERE idGrupos=e.Grupo && e.Grupo='$grupo'";
    $result=mysqli_query($conexion, $query);
    $cadena="<select class='container_input-pa' id='equipo2' name='equipo2'>";
    while($row=mysqli_fetch_assoc($result)){
        $cadena=$cadena.'<option value='.$row['IDdequipo'].'>'.$row['Equipo'].'</option>';
    }
    echo $cadena.'</select>';
    
?>