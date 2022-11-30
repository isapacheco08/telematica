<?php
    include("cnArb.php");
    $grupo=$_POST['grupos'];

    $cadena="<select class='container_input-pa' id='equipo1' name='equipo1'>";
    $query="SELECT IDdequipo, Equipo FROM Equipos e, Grupos WHERE idGrupos=e.Grupo && e.Grupo='$grupo'";


    $result=mysqli_query($conexion, $query);
    while($row=mysqli_fetch_assoc($result)){
        $idi= $row['IDdequipo'];
        $equipo=$row['Equipo'];
        $cadena=$cadena.'<option value='.$idi.'>'.$equipo.'</option>';
    }
    echo $cadena.'</select>';
    
?>
