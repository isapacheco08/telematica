<?php
    include("cnArb.php");
    $query = "SELECT IDdequipo, Equipo, Entrenador, Logo, g.Grupo FROM Equipos e, Grupos g WHERE e.Grupo=idGrupos";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Equipos</title>
        <link rel="stylesheet" href="./equipos.css">
        <link rel="shortcut icon" href="../../images/img5.png"/>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Configuración</title>
        <link rel="stylesheet" href="styleConfig.css" />
        <link
        href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
        rel="stylesheet"
    />
    </head>
    <body>
    <nav>
            <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Configuration module </span>
            </div>
            <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Configuration</span>
            </div>
    
            <div class="sidebar-content">
                <ul class="lists">
                <li class="list">
                    <a href="./Equipos.php" class="nav-link">
                    <i class="bx bx-home-alt icon"></i>
                    <span class="link">Datos del equipo</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../arbitros/Arbitros.php" class="nav-link">
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="link">árbitros</span>              
                    </a>
                </li>
                <li class="list">
                    <a href="../estadios/Estadios.php" class="nav-link">
                    <i class="bx bx-bell icon"></i>
                    <span class="link">Estadios</span>
                    </a>
                </li>
                
                </ul>

                <div class="bottom-cotent">
                <li class="list">
                    <a href="../../../index.html" class="nav-link">
                    <i class="bx bx-log-out icon"></i>
                    <span class="link">Logout</span>
                    </a>
                </li>
                </div>
            </div>
            </div>
        </nav>
    
    
    
    
        </div>
        <div class="container-add">
            <h2 class="container-tilte"> Agregar Equipos</h2>
            <form action="./insertar.php" method="post" class="container__form">
                <label for="" class="container_label">Id</label>
                <input name="id" type="text" class="container_input">
                <label for="" class="container_label">Nombre</label>
                <input name="nombre" type="text" class="container_input">
                <label for="" class="container_label">Entrenador</label>
                <input name="entrenador" type="text" class="container_input">
                <label for="" class="container_label">Imagen</label>
                <input name="logo" type="text" class="container_input">
                <label for="" class="container_label">Grupo</label>
                <input name="grupo" type="text" class="container_input">

                <input class="container_submit" type="submit" value="agregar">
            </form>

        </div>

        <div class="container-table-eq">
            <div class="table-title-eq title--edit">Datos de Equipos</div>
            <div class="table-header">ID</div>
            <div class="table-header">Nombre</div>
            <div class="table-header">Entrenador</div>
            <div class="table-header">Logo</div>
            <div class="table-header">Grupo</div>
            <div class="table-header">Operación</div>
            <?php $result =mysqli_query($conexion, $query);
            
            while($row=mysqli_fetch_assoc($result)){ ?>
               <div class="table-item"><?php echo $row["IDdequipo"]?></div>
               <div class="table-item"><a href="../Jugadores/Jugadores.php?idJ=<?php echo $row["IDdequipo"]?>" class="table_item_link"><?php echo $row["Equipo"]?></a></div>
               <div class="table-item"><?php echo $row["Entrenador"]?></div>
               <div><img src="<?php echo $row["Logo"]?>" alt="logo" width="40"></div>
               <div class="table-item"><?php echo $row["Grupo"]?></div>
               <div class="table_item">
                    <a href="./edicionE.php?id=<?php echo $row["IDdequipo"]?>" class="table_item_link">Editar</a>
                    <a href="./eliminarEq.php?idE=<?php echo $row["IDdequipo"]?>" class=#table_item_link>Eliminar</a>
               </div>
               <?php }?>
            
        </div>
        <setion class="overlay">


      </section>


        <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
            navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
        </script>
    </body>

</html>












