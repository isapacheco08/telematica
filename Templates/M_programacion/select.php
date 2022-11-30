<?php

    function obtenerGrupo(){
    
        include("cnArb.php");
        $query = "SELECT * FROM Grupos";
        $result = mysqli_query($conection, $query);

        $json = array();

        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id_grupo' => $row['idGrupos'],
                'grupo' => $row['Grupo'],
            );
        }  

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

        obtenerGrupo();

    

?>