<?php
    include("cnArb.php");
    $query = "SELECT  idPartidos,e1.IDdequipo, e1.Equipo as Equipo_1, e2.IDdequipo, e2.Equipo as Equipo_2, g.Grupo, NombreArb, Nombre_est, Fecha, Hora_i, Hora_f
    FROM Equipos e1, Equipos2 e2, Grupos g, Arbitros, Estadios, Partidos p
    WHERE e1.IDdequipo=Equipo_1 && e2.IDdequipo=Equipo_2 && idGrupos=p.Grupo && IdArbitro=Arbitro && idEstadios=Estadio";
    date_default_timezone_set("America/Bogota");
    $time = time();
    $time= date("H:i:s", $time);
    $fechaActual = date('Y-m-d');
    

    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Partidos</title>
        <link rel="stylesheet" href="./Partidos.css">
        <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    </head>
    <body>
    <header class="header">
            <div class="container1">
                <nav class="navigation">
                    <a href="index.html" class="logo">
                        <img src="../../images/logo.svg" alt="Logo" class="logo-img" />
                    </a>
                    <div class="mobile-menu-icon">
                        <ion-icon name="menu-outline" class="menu_icon"></ion-icon>
                    </div>
                    <ul class="nav_menu">
                        
                        <li class="nav_list">
                            <a href="../../index.html" class="btn-outline" target="_matches">Logout</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
    </header>
        <div class="container-add-pa">
            <h2 class="container-tilte-pa"> Agregar Partido</h2>
            <form action="./insertarPa.php" method="post" class="container__form-pa">
                <label for="" class="container_label-pa">Id</label>
                <input name="id" type="text" class="container_input-pa">
                <label for="" class="container_label-pa">Grupo</label>
                <select name="grupo" id="grupo" class="container_input-pa" >
                <?php 
                    $query1 = "SELECT * From  Grupos";
                    $result1 =mysqli_query($conexion, $query1);
                     while($row=mysqli_fetch_assoc($result1)){
                         $idi= $row['idGrupos'];
                         $grupo=$row['Grupo'];
                         echo "<option value=$idi>$grupo</option>";
                         }
                ?>
                </select>
                <label for="" class="container_label-pa">Equipo 1</label>
                <div id="equipo1select"></div>
                <label for="" class="container_label-pa">Equipo 2</label>
                <div id="equipo2select"></div>
                <label for="" class="container_label-pa">Arbitro</label>
                <select name="arbitro" id="arbitro" class="container_input-pa" >
                <?php
                    $eq1="equipo1";
                    $query2 = "SELECT * FROM Arbitros where Nacionalidad!='$eq1'";
                    $result2 =mysqli_query($conexion, $query2);
                     while($row2=mysqli_fetch_assoc($result2)){
                         $idi= $row2['IdArbitro'];
                         $arbitro=$row2['NombreArb'];
                         echo "<option value=$idi>$arbitro</option>";
                         }
                ?>
                </select>
                <label for="" class="container_label-pa">Estadio</label>
                <select name="estadio" id="estadio" class="container_input-pa" >
                <?php 
                    $query3 = "SELECT * FROM Estadios";
                    $result3 =mysqli_query($conexion, $query3);
                     while($row3=mysqli_fetch_assoc($result3)){
                         $idi= $row3['idEstadios'];
                         $estadio=$row3['Nombre_est'];
                         echo "<option value=$idi>$estadio</option>";
                         }
                ?>
                </select>                
                <label for="" class="container_label-pa">Fecha</label>
                <input name="fecha" type="date" class="container_input-pa">
                <label for="" class="container_label-pa">Hora Inical</label>
                <input name="horai" type="time" class="container_input-pa">
                <input class="container_submit-pa" type="submit" value="agregar">
            </form>

        </div>

        <div class="container-table-pa">
            <div class="table-title-pa">Datos de Partidos </div>
            <div class="table-header-pa">ID</div>
            <div class="table-header-pa">Equipo 1</div>
            <div class="table-header-pa">Equipo 2</div>
            <div class="table-header-pa">Grupo</div>
            <div class="table-header-pa">Arbitro</div>
            <div class="table-header-pa">Estadio</div>
            <div class="table-header-pa">Fecha</div>
            <div class="table-header-pa">Hora Inical</div>
            <div class="table-header-pa">Operación</div>
            <?php 
            $result =mysqli_query($conexion, $query);
            while($row=mysqli_fetch_assoc($result)){ 
                if($$fechaActual=$row["Fecha"] && $time>$row["Hora_i"]  && $time<$row["Hora_f"]){
                    ?>
                    <a href="../Actualizaciones/ActualizacionesConfig.php?idp=<?php echo $row["idPartidos"]?>" class="table-item-pa"><?php echo $row["idPartidos"]?></a>
                    <?php 
                }else{
                    ?>
                    <div class="table-item-pa"><?php echo $row["idPartidos"]?></div>
                    <?php 

                }
                
                ?>
            
               <div class="table-item-pa"><?php echo $row["Equipo_1"]?></div>
               <div class="table-item-pa"><?php echo $row["Equipo_2"]?></div>
               <div class="table-item-pa"><?php echo $row["Grupo"]?></div>
               <div class="table-item-pa"><?php echo $row["NombreArb"]?></div>
               <div class="table-item-pa"><?php echo $row["Nombre_est"]?></div>
               <div class="table-item-pa"><?php echo $row["Fecha"]?></div>
               <div class="table-item-pa"><?php echo $row["Hora_i"]?></div>
               <div class="table_item-pa">
                    <a href="./edicionPa.php?id=<?php echo $row["idPartidos"]?>" class="table_item_link-pa">Editar</a>
                    <a href="./eliminarPa.php?idE=<?php echo $row["idPartidos"]?>" class="table_item_link-pa">Eliminar</a>
               </div>
               <?php }?>
            
        </div>
    
        

    
    </body>





</html>


<script type="text/javascript">
    $(document).ready(function(){
        recargarlist1();
        recargarlist2();
        $('#grupo').change(function(){
            recargarlist2();
            recargarlist1();
        });
        
    })

</script>
<script type="text/javascript">
    function recargarlist1(){
        $.ajax({
            type: "POST",
            url:"equipo1.php",
            data: "grupos=" + $('#grupo').val(),
            success:function(r){

                $('#equipo1select').html(r);
            }
        });
    }
    function recargarlist2(){
        $.ajax({
            type: "POST",
            url:"equipo2.php",
            data: {grupos: $('#grupo').val()},
            success:function(r){
                $('#equipo2select').html(r);
            }
        });
    }

</script>







